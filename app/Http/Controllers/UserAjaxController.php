<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\RegistrationRequest;
use App\FriendRequest;
use App\Message;
use App\RegistrationToken;
use Mail;
use App\Mail\VerifyRegistration;

class UserAjaxController extends Controller
{
    public function verify(Request $request)
    {
    	$isValid = User::where('uname', $request->username)
    					->where('password', $request->password)
    					->get();
    	if (count($isValid)==1) {
    		foreach ($isValid as  $value) {
	    		$request->session()->put('loggedUser', $value->uid);
	    		break;
	    	}
	    	return 1;
    	}else{
            $isReqested = RegistrationRequest::where('uname', $request->username)
                                            ->where('password', $request->password)
                                            ->first();
            if ($isReqested != null) {
                return 2;
            }
    		return 0;
    	}
    }
    public function checkUsername(Request $request)
    {
        $isExist = User::where('uname', $request->username)->first();
        if ($isExist != null) {
            return 1;
        }else{
            $isExist = RegistrationRequest::where('uname', $request->username)->first();
            if ($isExist != null) {
                return 1;
            }
            return 0;
        }
    }
    public function checkEmail(Request $request)
    {
        $isExist = User::where('email', $request->email)->first();
        if ($isExist != null) {
            return 1;
        }else{
            $isExist = RegistrationRequest::where('email', $request->email)->first();
            if ($isExist != null) {
                return 1;
            }
            return 0;
        }
    }
    public function store(Request $request)
    {
        $regReq = new RegistrationRequest();
        $regReq->fname = $request->fname;
        if ($request->mname != null) {
            $regReq->mname = $request->mname;
        }
        $regReq->lname = $request->lname;
        $regReq->uname = $request->uname;
        $regReq->dob = $request->dob;
        $regReq->blood = $request->blood;
        $regReq->gender = $request->gender;
        $regReq->email = $request->email;
        $regReq->religion = $request->religion;
        $regReq->number1 = $request->number;
        $regReq->password = $request->password;
        $regReq->save();
        if ($regReq->uid) {
            $token = new RegistrationToken();
            $token->email = $regReq->email;
            $token->token = sha1(time());
            $token->verified = 0;
            $token->save();
            Mail::send(new VerifyRegistration($token));
            return 1;
        }
        return 0;
    }
    public function friendReqNumber(Request $request){
        $friendReqs = FriendRequest::where('send_to', $request->session()->get('loggedUser'))
                                    ->get()
                                    ->count();
        return $friendReqs;
        die();
    }
    public function sendMessage(Request $request){
        $request->session()->get('loggedUser');
        $newMessage = new Message();
        $newMessage->sender = $request->session()->get('loggedUser');
        $newMessage->send_to = $request->friendId;
        $newMessage->message = $request->message;
        date_default_timezone_set('Asia/Dhaka');
        $newMessage->time = date('Y-m-d H:i:s');
        $newMessage->is_seen = 0;
        $newMessage->save();
        die();
    }
    public function messageContents(Request $request){
        $msgList = Message::where([
            ['sender',$request->session()->get('loggedUser')],
            ['send_to', $request->friendId]
        ])
            ->orWhere([
                ['sender',$request->friendId],
                ['send_to', $request->session()->get('loggedUser')]
            ])
            ->get();
        $user = User::find($request->session()->get('loggedUser'));
        $friend = User::find($request->friendId);
        if ($msgList->count() == 0){
            die();
        }else{
            foreach ($msgList as $msg){
                echo "<div class='message-area'>";
                if($msg->sender == $request->session()->get('loggedUser')){
                    echo "<img src=/images/$user->propic class='texted-user-img'>";
                    echo "<div class='user-text-area'>";
                    echo "<div class='user-text' title='$msg->time'>$msg->message</div>";
                    echo "</div>";
                }
                elseif($msg->sender == $request->friendId){
                    echo "<img src=/images/$friend->propic class='texted-friend-img'>";
                    echo "<div class='friend-text-area'>";
                    echo "<div class='friend-text'  title='$msg->time'>$msg->message</div>";
                    echo "</div>";
                }
                echo "</div>";
            }
        }
        die();
    }
    public function unseenMessage(Request $request){
        $unseenMsg = Message::where('send_to', $request->session()->get('loggedUser'))
                            ->where('is_seen', 0)
                            ->count();
        return $unseenMsg;
    }
    public function readMessage(Request $request){
        $msg = Message::where('send_to', $request->session()->get('loggedUser'))
                        ->where('sender', $request->friendId)
                        ->where('is_seen', 0)
                        ->update(['is_seen' => 1]);
        return;
    }
}
