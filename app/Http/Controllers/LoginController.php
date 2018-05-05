<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Admin;

class LoginController extends Controller
{
    public function adminLogin(Request $request)
    {
    	return view('admin.login');
    }
    public function adminVerify(Request $request)
    {
    	$request->validate([
	  		'username' => 'required',
	  		'password' => 'required'
	  	]);
        $admins = Admin::where('uname',$request->username)
                    ->where('password', $request->password)
                    ->get();
        if (count($admins)==1) {
            foreach ($admins as $admin) {
                $request->session()->put('loggedAdmin', $admin->aid);
                break;
            }
            return redirect()->route('admin.index');
        }else{
            $request->session()->flash('msg', "Invalid username or password");
            return redirect()->route('login.admin');
        }
    }
    public function userVerify(Request $request)
    {
    	$request->validate([
	  		'username' => 'required',
	  		'password' => 'required'
	  	]);
        $users = User::where('uname', $request->username)
                    ->where('password', $request->password)
                    ->get();
        if (count($users)==1) {
            foreach ($users as $user) {
                $request->session()->put('loggedUser', $user->uid);
                break;
            }
            return redirect()->route('user.index');
        }else{
            $request->session()->flash('msg', "Invalid username or password");
            return redirect()->route('public.index');
        }
    }
}
