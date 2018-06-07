<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RegistrationRequest;
use App\Http\Requests\RegistrationReqRequest;
use App\RegistrationToken;
use App\User;

class RegistrationController extends Controller
{
    public function store(RegistrationReqRequest $request)
    {
    	$regReq = new RegistrationRequest();
        $regReq->fname = $request->fName;
        if ($request->mName != null) {
            $regReq->mname = $request->mName;
        }
        $regReq->lname = $request->lName;
        $regReq->uname = $request->userName;
        $regReq->dob = $request->dob;
        $regReq->blood = $request->blood;
        $regReq->gender = $request->gender;
        $regReq->email = $request->email;
        $regReq->religion = $request->religion;
        $regReq->number1 = $request->contact;
        $regReq->password = $request->pass;
        $regReq->save();
        if ($regReq->uid) {
        	$request->session()->flash('regMsg', "Registration Successfull");
            return redirect()->route('public.index');
        }else{
        	$request->session()->flash('regMsg', "Error occured");
        	return redirect()->route('public.index');
        }
    }
    public function regToken($token, $id, Request $request)
    {
        $token = RegistrationToken::where('id', $id)
                ->where('token', $token)
                ->first();
        if ($token != null && $token->verified == 0){
            $reqUser = RegistrationRequest::where('email', $token->email)
                                        ->first();
            $user = new User();
            $user->fname = $reqUser->fname;
            $user->mname = $reqUser->mname;
            $user->lname = $reqUser->lname;
            $user->uname = $reqUser->uname;
            $user->dob   = $reqUser->dob;
            $user->blood = $reqUser->blood;
            $user->gender = $reqUser->gender;
            $user->email = $reqUser->email;
            $user->religion = $reqUser->religion;
            $user->number1 = $reqUser->number1;
            $user->password = $reqUser->password;
            $user->propic = 'defaultpic/user.png';
            $request->session()->flash('msg', 'Email verified, please login');
            if ($user->save() == 1) {
                RegistrationRequest::where('uid', $reqUser->uid)
                    ->delete();
                $token->verified = 1;
                $token->save();
            }
        }
        else{
            $request->session()->flash('msg', 'Varification link expired, please try again.');
        }
        return redirect()->route('public.index');
    }
}
