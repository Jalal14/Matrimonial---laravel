<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Blood;
use App\Gender;
use App\Complexion;
use App\Religion;
use App\MaritalStatus;
use App\PerAddress;
use App\PrAddress;
use App\PoliceStation;
use App\District;
use App\Division;
use App\Job;
use App\Favorite;
use App\Friend;
use App\FriendRequest;
use App\Search;
use App\Message;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $religionList = Religion::all();
        $genderList = Gender::all();
        $loggedUser = User::find($request->session()->get('loggedUser'));
        $userList = $this->suggestUsers($loggedUser);
    	return view('user.index')
                ->with('userList', $userList)
                ->with('religionList', $religionList)
                ->with('genderList', $genderList)
                ->with('minAge', 18)
                ->with('maxAge', 24)
                ->with('selectedRel', 1)
                ->with('selectedGen', 1);
    }
    public function profile(Request $request)
    {
    	$user = User::find($request->session()->get('loggedUser'));
    	$user->bgroup = Blood::find($user->blood)->bgroup;
    	$user->gender_name = Gender::find($user->gender)->gender;
    	$user->religion_name = Religion::find($user->religion)->name;
    	if (isset($user->complexion)) {
    		$user->complexion_name = Complexion::find($user->complexion)->type;
    	}
    	if (isset($user->marital_status)) {
    		$user->status = MaritalStatus::find($user->marital_status)->status;
    	}
    	$user->age = date_diff(date_create($user->dob), date_create('today'))->y;
    	$perAddress = DB::table('tbl_per_address')
    				->join('tbl_police_station', 'tbl_per_address.per_police_station', '=', 'tbl_police_station.id')
    				->join('tbl_district', 'tbl_police_station.district', '=', 'tbl_district.id')
    				->join('tbl_division', 'tbl_district.division', '=', 'tbl_division.id')
    				->select('tbl_per_address.*','tbl_police_station.name as policeStation','tbl_district.name as district','tbl_division.name as division')
    				->where('per_uid',$request->session()->get('loggedUser'))
    				->first();
    	$prAddress = DB::table('tbl_pr_address')
    				->join('tbl_police_station', 'tbl_pr_address.pr_police_station', '=', 'tbl_police_station.id')
    				->join('tbl_district', 'tbl_police_station.district', '=', 'tbl_district.id')
    				->join('tbl_division', 'tbl_district.division', '=', 'tbl_division.id')
    				->select('tbl_pr_address.*','tbl_police_station.name as policeStation','tbl_district.name as district','tbl_division.name as division')
    				->where('pr_uid',$request->session()->get('loggedUser'))
    				->first();
    	$job = Job::find($request->session()->get('loggedUser'));
    	$education = DB::table('tbl_education')
    					->join('tbl_degree', 'tbl_education.degree', '=', 'tbl_degree.id')
    					->where('uid', $request->session()->get('loggedUser'))
    					->first();
    	return view('user.profile')
    			->with('user',$user)
    			->with('perAddress', $perAddress)
    			->with('prAddress', $prAddress)
    			->with('job', $job)
    			->with('education', $education);
    }
    public function publicProfile(Request $request)
    {
        $user = User::find($request->session()->get('loggedUser'));
        $friend = User::where('uname', $request->user)
                ->first();
        $friend->age = date_diff(date_create($friend->dob), date_create('today'))->y;
        $friend->bgroup = Blood::find($friend->blood)->bgroup;
        $friend->gender_name = Gender::find($friend->gender)->gender;
        $friend->religion_name = Religion::find($friend->religion)->name;
        $per_address = DB::table('tbl_per_address')
                                ->join('tbl_police_station', 'tbl_per_address.per_police_station', '=', 'tbl_police_station.id')
                                ->join('tbl_district', 'tbl_police_station.district', '=', 'tbl_district.id')
                                ->join('tbl_division', 'tbl_district.division', '=', 'tbl_division.id')
                                ->select('tbl_per_address.*','tbl_district.name as district','tbl_division.name as division')
                                ->where('per_uid',$friend->uid)
                                ->first();
        $pr_address = DB::table('tbl_pr_address')
                                ->join('tbl_police_station', 'tbl_pr_address.pr_police_station', '=', 'tbl_police_station.id')
                                ->join('tbl_district', 'tbl_police_station.district', '=', 'tbl_district.id')
                                ->join('tbl_division', 'tbl_district.division', '=', 'tbl_division.id')
                                ->select('tbl_pr_address.*','tbl_district.name as district','tbl_division.name as division')
                                ->where('pr_uid',$friend->uid)
                                ->first();
        $education = DB::table('tbl_education')
                        ->join('tbl_degree', 'tbl_education.degree', '=', 'tbl_degree.id')
                        ->where('tbl_education.uid', $friend->uid)
                        ->first();
        $job = Job::find($friend->uid);
        $interestList = DB::table('tbl_user_interest')
                                ->join('tbl_interest', 'tbl_user_interest.interest', '=', 'tbl_interest.id')
                                ->where('tbl_user_interest.uid', $friend->uid)
                                ->get();
        $hobbyList = DB::table('tbl_user_hobby')
                                ->join('tbl_hobby', 'tbl_user_hobby.hobby', '=', 'tbl_hobby.id')
                                ->where('tbl_user_hobby.uid', $friend->uid)
                                ->get();
        $musicList = DB::table('tbl_user_music')
                                ->join('tbl_music', 'tbl_user_music.music', '=', 'tbl_music.id')
                                ->where('tbl_user_music.uid', $friend->uid)
                                ->get();
        $sportList = DB::table('tbl_user_sports')
                                ->join('tbl_sports', 'tbl_user_sports.sport', '=', 'tbl_sports.id')
                                ->where('tbl_user_sports.uid', $friend->uid)
                                ->get();
        $friend->friend = Friend::where([
                                    ['sender',$friend->uid],
                                    ['send_to', $request->session()->get('loggedUser')]
                                ])
                            ->orWhere([
                                    ['send_to',$friend->uid],
                                    ['sender', $request->session()->get('loggedUser')]
                                ])
                            ->first();
        $friend->favorite = Favorite::where('uid', $request->session()->get('loggedUser'))
                            ->where('favorite_user', $friend->uid)
                            ->first();
        $friend->requested = FriendRequest::where('send_to', $request->session()->get('loggedUser'))
                            ->where('sender', $friend->uid)
                            ->first();
        $friend->sentReq = FriendRequest::where('sender', $request->session()->get('loggedUser'))
                            ->where('send_to', $friend->uid)
                            ->first();
        $msgList = Message::where([
                                    ['sender',$friend->uid],
                                    ['send_to', $user->uid]
                                ])
                                ->orWhere([
                                    ['send_to',$friend->uid],
                                    ['sender', $user->uid]
                                ])
                                ->get();
        return view('user.public-profile')
                ->with('per_address', $per_address)
                ->with('pr_address', $pr_address)
                ->with('education', $education)
                ->with('job', $job)
                ->with('interestList', $interestList)
                ->with('hobbyList', $hobbyList)
                ->with('sportList', $sportList)
                ->with('musicList', $musicList)
                ->with('friend', $friend)
                ->with('user', $user)
                ->with('msgList', $msgList);
    }
    public function favoriteList(Request $request)
    {
    	$favoriteUsers = Favorite::where('uid', $request->session()->get('loggedUser'))
                            ->pluck('favorite_user');
        $favoriteList = User::whereIn('uid', $favoriteUsers)
                        ->get();
    	return view('user.favorite-list')
    			->with('favoriteList',$favoriteList);
    }
    public function followerList(Request $request)
    {
    	$followers = Favorite::where('favorite_user', $request->session()->get('loggedUser'))
    						->pluck('uid');
    	$followerList = User::whereIn('uid', $followers)
                        ->get();
    	foreach ($followerList as $follower) {
    		$follower->age = date_diff(date_create($follower->dob), date_create('today'))->y;
    		$follower->gender_name = Gender::find($follower->gender)->gender;
    		$follower->religion_name = Religion::find($follower->religion)->name;
    	}
    	return view('user.follower-list')
    			->with('followerList',$followerList);
    }
    public function sentRequests(Request $request)
    {
    	$sentRequests = FriendRequest::where('sender', $request->session()->get('loggedUser'))
    						->get()
                            ->pluck('send_to');
        $sentReqList = User::whereIn('uid', $sentRequests)
                            ->get();
    	return view('user.sent-request-list')
    			->with('sentReqList',$sentReqList);
    }
    public function requestList(Request $request)
    {
    	$requests = FriendRequest::where('send_to', $request->session()->get('loggedUser'))
    						->get()
                            ->pluck('sender');
    	$requestList = User::whereIn('uid', $requests)
                            ->get();
        foreach ($requestList as $user) {
            $user->bgroup = Blood::find($user->blood)->bgroup;
            $user->gender_name = Gender::find($user->gender)->gender;
            $user->religion_name = Religion::find($user->religion)->name;
            $user->age = date_diff(date_create($user->dob), date_create('today'))->y;
        }
    	return view('user.request-list')
    			->with('requestList',$requestList);
    }
    public function friendList(Request $request)
    {
    	$sent = Friend::where('sender', $request->session()->get('loggedUser'))
                            ->select('send_to as idList')
                            ->pluck('idList');
        $recieve = Friend::where('send_to', $request->session()->get('loggedUser'))
    						->select('sender as idList')
                            ->pluck('idList');
        $friends = $sent->concat($recieve);
        $friendList = User::whereIn('uid', $friends)
                            ->get();
    	return view('user.friend-list')
    			->with('friendList',$friendList);
    }
    public function showInterest(Request $request)
    {
        if (isset($request->addFriend)) {
            $friendReq = new FriendRequest();
            $friendReq->sender = $request->session()->get('loggedUser');
            $friendReq->send_to = $request->userId;
            $friendReq->date = date('Y-m-d');
            $friendReq->save();
            return redirect()->route('user.sentRequests');
        }else if (isset($request->cancelFriend)) {
            $friend = DB::table('tbl_friend')
                            ->where([
                                    ['sender',$request->session()->get('loggedUser')],
                                    ['send_to', $request->userId]
                                ])
                            ->orWhere([
                                    ['sender', $request->userId],
                                    ['send_to', $request->session()->get('loggedUser')]
                                ])
                            ->delete();

            return redirect()->route('user.friendList');
        }else if (isset($request->accept)) {
            $req = new Friend();
            $req->send_to = $request->session()->get('loggedUser');
            $req->sender = $request->userId;
            $req->date = date("Y-m-d");
            if ($req->save() == 1) {
                $req = FriendRequest::where('send_to', $request->session()->get('loggedUser'))
                        ->where('sender', $request->userId)
                        ->delete();
                $friend = User::find($request->userId);
                return redirect()->route('user.publicProfile', [$friend->uname]);
            }
            return redirect()->route('user.user.requestList');
        }
        else if (isset($request->reject)) {
            $req = FriendRequest::where('send_to', $request->session()->get('loggedUser'))
                    ->where('sender', $request->userId);
            $req->delete();
            $friend = User::find($request->userId);
            return redirect()->route('user.requestList');
        }
        else if (isset($request->addFav)) {
            $favorite = new Favorite();
            $favorite->uid = $request->session()->get('loggedUser');
            $favorite->favorite_user = $request->userId;
            $favorite->date = date('Y-m-d');
            $favorite->save();
            return redirect()->route('user.favoriteList');
        }else if (isset($request->cancelReq)){
            $req = FriendRequest::where('sender', $request->session()->get('loggedUser'))
                                ->where('send_to', $request->userId);
            $req->delete();
            return redirect()->route('user.sentRequests');
        }
        else if (isset($request->removeFav)) {
            $favorite = Favorite::where('uid', $request->session()->get('loggedUser'))
                                ->where('favorite_user', $request->userId)
                                ->delete();
            return redirect()->route('user.favoriteList');

        }
        else if (isset($request->sendMessage)){
            $newMessage = new Message();
            $newMessage->sender = $request->session()->get('loggedUser');
            $newMessage->send_to = $request->friendId;
            $newMessage->message = $request->messageContent;
            date_default_timezone_set('Asia/Dhaka');
            $newMessage->time = date('Y-m-d H:i:s');
            $newMessage->is_seen = 0;
            $newMessage->save();
            return redirect()->route('user.publicProfile', [$request->friendUname]);
        }
    }
    public function searchUser(Request $request)
    {
        $religionList = Religion::all();
        $genderList = Gender::all();
        $minDob = date("Y-m-d", strtotime("-$request->minAge year"));
        $maxDob = date("Y-m-d", strtotime("-$request->maxAge year"));
        $userList = User::whereBetween('dob', [$maxDob, $minDob])
                        ->where('religion', $request->religion)
                        ->where('gender', $request->gender)
                        ->get();
        foreach ($userList as $user) {
            $user->bgroup = Blood::find($user->blood)->bgroup;
            $user->gender_name = Gender::find($user->gender)->gender;
            $user->religion_name = Religion::find($user->religion)->name;
            $user->age = date_diff(date_create($user->dob), date_create('today'))->y;
        }
        $search = new Search();
        $search->uid = $request->session()->get('loggedUser');
        $search->min_age = $request->minAge;
        $search->max_age = $request->maxAge;
        $search->religion = $request->religion;
        $search->gender = $request->gender;
        $search->save();
        return view('user.index')
                ->with('userList', $userList)
                ->with('religionList', $religionList)
                ->with('genderList', $genderList)
                ->with('minAge', $request->minAge)
                ->with('maxAge', $request->maxAge)
                ->with('selectedRel', $request->religion)
                ->with('selectedGen', $request->gender);
    }
    public function newMessages(Request $request){
        $senderList = Message::where('send_to', $request->session()->get('loggedUser'))
                                ->select('sender', DB::raw('count(*) as total'))
                                ->where('is_seen', 0)
                                ->groupBy('sender')
                                ->get();
        if ($senderList->count()>0){
            foreach ($senderList as $newMsg){
                $sender = User::find($newMsg->sender);
                $newMsg->uid= $sender->uid;
                $newMsg->fname = $sender->fname;
                $newMsg->mname = $sender->mname;
                $newMsg->lname = $sender->lname;
                $newMsg->uname = $sender->uname;
                $newMsg->propic= $sender->propic;
            }
        }
        return view('user.new-message')
                ->with('senderList', $senderList);
    }
    public function suggestUsers($loggedUser)
    {
        $age = date_diff(date_create($loggedUser->dob), date_create('today'))->y;
        $sent = Friend::where('sender', $loggedUser->uid)
                            ->select('send_to as idList')
                            ->pluck('idList');
        $recieve = Friend::where('send_to', $loggedUser->uid)
                            ->select('sender as idList')
                            ->pluck('idList');
        $friends = $sent->concat($recieve);

        $followers = Favorite::where('favorite_user', $loggedUser->uid)
                            ->pluck('uid');

        $favorites = Favorite::where('uid', $loggedUser->uid)
                            ->pluck('favorite_user');

        $requests = FriendRequest::where('send_to', $loggedUser->uid)
                            ->pluck('sender');

        $sentReqs = FriendRequest::where('sender', $loggedUser->uid)
                            ->pluck('send_to');
        
        $lists = $friends->concat($followers)->concat($favorites)->concat($requests)->concat($sentReqs)->push($loggedUser->uid);

        $searchedMinAge = DB::table('tbl_search')
                            ->where('uid', $loggedUser->uid)
                            ->groupBy('min_age')
                            ->selectRaw('min_age, count(*) as counter')
                            ->orderBy('counter', 'desc')
                            ->first();
        $searchedMaxAge = DB::table('tbl_search')
                            ->where('uid', $loggedUser->uid)
                            ->groupBy('max_age')
                            ->selectRaw('max_age, count(*) as counter')
                            ->orderBy('counter', 'desc')
                            ->first();
        $searchedGens = DB::table('tbl_search')
                            ->where('uid', $loggedUser->uid)
                            ->groupBy('gender')
                            ->selectRaw('gender, count(*) as counter')
                            ->orderBy('counter', 'desc')
                            ->first();
        $searchedRels = DB::table('tbl_search')
                            ->where('uid', $loggedUser->uid)
                            ->groupBy('religion')
                            ->selectRaw('religion, count(*) as counter')
                            ->orderBy('counter', 'desc')
                            ->first();
        if ($searchedMinAge != null) {
            $minDob = date("Y-m-d", strtotime("-$searchedMinAge->min_age year"));
            $maxDob = date("Y-m-d", strtotime("-$searchedMaxAge->max_age year"));
            $searchedGen = $searchedGens->gender;
            $searchedRel = $searchedRels->religion;
        }else{
            if ($loggedUser->gender == 1) {
                $searchedGen = 2;
                $minDob = date("Y-m-d", strtotime("-$age-6 year"));
                $maxDob = date("Y-m-d", strtotime("-$age-2 year"));
            }else if ($loggedUser->gender == 2) {
                $searchedGen = 1;
                $minDob = date("Y-m-d", strtotime("-$age+2 year"));
                $maxDob = date("Y-m-d", strtotime("-$age+6 year"));
            }else{
                $searchedGen = 3;
                $minDob = date("Y-m-d", strtotime("-$age+4 year"));
                $maxDob = date("Y-m-d", strtotime("-$age-4 year"));
            }
            $searchedRel = $loggedUser->religion;
            
        }
        $userList = User::where('dob', '>=', $maxDob)
                    ->where('dob', '<=', $minDob)
                    ->where('gender', $searchedGen)
                    ->where('religion', $searchedRel)
                    ->whereNotIn('uid', $lists)
                    ->get();
        if($userList->count() < 6){
            $number = 6 - $userList->count();
            $uuid = $userList->pluck('uid');
            $lists = $lists->concat($uuid);
            $rests = User::where('gender', $searchedGen)
                        ->whereNotIn('uid',$lists)
                        ->limit($number)
                        ->get();
            $userList = $userList->concat($rests);
        }
        if ($userList->count() < 6) {
            $number = 6 - $userList->count();
            $uuid = $userList->pluck('uid');
            $lists = $lists->concat($uuid);
            $rests = User::where('gender', '!=',$loggedUser->gender)
                        ->whereNotIn('uid',$lists)
                        ->limit($number)
                        ->get();
            $userList = $userList->concat($rests);
        }
        if ($userList->count() < 6) {
            $number = 6 - $userList->count();
            $uuid = $userList->pluck('uid');
            $lists = $lists->concat($uuid);
            $rests = User::whereNotIn('uid',$lists)
                        ->limit($number)
                        ->get();
            $userList = $userList->concat($rests);
        }
        foreach ($userList as $user) {
            $user->bgroup = Blood::find($user->blood)->bgroup;
            $user->gender_name = Gender::find($user->gender)->gender;
            $user->religion_name = Religion::find($user->religion)->name;
            $user->age = date_diff(date_create($user->dob), date_create('today'))->y;
        }

        return $userList->shuffle();
    }
}
