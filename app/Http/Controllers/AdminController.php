<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Admin;
use App\Blood;
use App\Gender;
use App\Religion;
use App\User;
use App\MaritalStatus;
use App\Job;
use App\RegistrationRequest;

class AdminController extends Controller
{
	public function index(Request $request)
	{
        $regReqs = RegistrationRequest::all();
        $users = User::all();
        $activeUsers = User::where('last_login', '>', date('Y-m-d', strtotime(' -5 day')))
                            ->get();
		return view('admin.index')
                ->with('regReqs', count($regReqs))
                ->with('users', count($users))
                ->with('activeUsers', count($activeUsers));
	}
    public function profile(Request $request)
    {
    	$admin = Admin::find($request->session()->get('loggedAdmin'));
    	$admin->age = date_diff(date_create($admin->dob), date_create('today'))->y;
    	$admin->bgroup = Blood::find($admin->blood)->bgroup;
    	$admin->gender_name = Gender::find($admin->gender)->gender;
    	return view('admin.account.profile')
    			->with('admin', $admin);
    }
    public function editProfile(Request $request)
    {
    	$admin = Admin::find($request->session()->get('loggedAdmin'));
    	$bloodList = Blood::all();
    	$genderList = Gender::all();
    	return view('admin.account.update-profile')
    			->with('admin', $admin)
    			->with('bloodList', $bloodList)
    			->with('genderList', $genderList);
    }
    public function updateProfile(Request $request)
    {
        $admin = Admin::find($request->session()->get('loggedAdmin'));
        $admin->fname = $request->fName;
        $admin->mname = $request->mName;
        $admin->lname = $request->lName;
        $admin->dob = $request->dob;
        $admin->blood = $request->blood;
        $admin->gender = $request->gender;
        $admin->email = $request->email;
        $admin->number1 = $request->number1;
        $admin->number2 = $request->number2;
        $admin->save();
        return redirect()->route('admin.updateProfile');
    }
    public function registrationRequest(Request $request)
    {
    	$regReqs = RegistrationRequest::all();
        $requests = [];
        if (count($regReqs) > 0) {
            foreach ($regReqs as $regReq) {
                $user = $regReq;
                $user->age = date_diff(date_create($user->dob), date_create('today'))->y;
                $user->bgroup = Blood::find($user->blood)->bgroup;
                $user->gender_name = Gender::find($user->gender)->gender;
                $user->religion_name = Religion::find($user->religion)->name;
                $requests[] = $user;
            }
        }
    	return view('admin.registration-request')
    			->with('requests',$requests);
    }
    public function storeRegistration(Request $request)
    {
        if (isset($request->approve)) {
            $reqUser = RegistrationRequest::find($request->reqId);
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
            if ($user->save() == 1) {
                RegistrationRequest::where('uid', $reqUser->uid)
                                    ->delete();
            }
        }else if (isset($request->reject)) {
            RegistrationRequest::where('uid', $request->reqId)
                                    ->delete();
        }
        return redirect()->route('admin.registrationRequest');
    }
    public function editPassword(Request $request)
    {
        return view('admin.account.change-password');
    }
    public function updatePassword(Request $request)
    {
        $admin = Admin::find($request->session()->get('loggedAdmin'));
        if ($request->newPassword != $request->cNewPassword) {
            $request->session()->flash('msg', 'Password does not match!');
        }else if ($admin->password != $request->password) {
            $request->session()->flash('msg', 'Incorrect password!');
        }else{
            $admin->password = $request->newPassword;
            $admin->save();
            $request->session()->flash('msg', 'Password successfully updated!');
        }
        return redirect()->route('admin.updatePassword');
    }
    public function proPic(Request $request)
    {
        $admin = Admin::find($request->session()->get('loggedAdmin'));
        return view('admin.account.profile-picture')
                ->with('admin', $admin);
    }
    public function updateProPic(Request $request)
    {
        $admin = Admin::find($request->session()->get('loggedAdmin'));
        $file = $request->file('proPic');
        $fileName = $admin->uname.".".$file->getClientOriginalExtension();
        $admin->propic = '/admin/propic/'.$fileName;
        if ($admin->save() == 1) {
            $file->move('images/admin/propic', $fileName);
        }
        return redirect()->route('admin.proPic');
    }
    public function userList(Request $request)
    {
        $userList = User::get();
        foreach ($userList as $user) {
            $user->bgroup = Blood::find($user->blood)->bgroup;
            $user->gender_name = Gender::find($user->gender)->gender;
            $user->religion_name = Religion::find($user->religion)->name;
            $user->age = date_diff(date_create($user->dob), date_create('today'))->y;
        }
        return view('admin.information.users')
                ->with('userList', $userList);
    }
    public function activeUsers(Request $request)
    {
        $userList = User::where('last_login', '>', date('Y-m-d', strtotime(' -5 day')))
                            ->get();
        foreach ($userList as $user) {
            $user->bgroup = Blood::find($user->blood)->bgroup;
            $user->gender_name = Gender::find($user->gender)->gender;
            $user->religion_name = Religion::find($user->religion)->name;
            $user->age = date_diff(date_create($user->dob), date_create('today'))->y;
        }
        return view('admin.information.users')
                ->with('userList', $userList);
    }
    public function userProfile($id,Request $request)
    {
        $user = User::find($id);
        $user->bgroup = Blood::find($user->blood)->bgroup;
        $user->gender_name = Gender::find($user->gender)->gender;
        $user->religion_name = Religion::find($user->religion)->name;
        $user->age = date_diff(date_create($user->dob), date_create('today'))->y;
        if (isset($user->marital_status)) {
            $user->status = MaritalStatus::find($user->marital_status)->status;
        }
        $job = Job::find($id);
        $education = DB::table('tbl_education')
                        ->join('tbl_degree', 'tbl_education.degree', '=', 'tbl_degree.id')
                        ->where('uid', $id)
                        ->first();
        return view('admin.information.user-profile')
                ->with('user', $user)
                ->with('job', $job)
                ->with('education', $education);
    }
}
