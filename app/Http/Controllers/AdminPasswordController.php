<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\PasswordToken;
use Mail;
use App\Mail\AdminPasswordMail;

class AdminPasswordController extends Controller
{
    public function index()
    {
        return view('admin.forgot-password');
    }
    public function resetRequest(Request $request)
    {
        $admin = Admin::where('uname', $request->username)
                        ->where('email', $request->email)
                        ->first();
        if ($admin != null){
            $token = new PasswordToken();
            $token->email = $admin->email;
            $token->token = sha1(time());
            $token->verified = 0;
            $token->save();
            Mail::send(new AdminPasswordMail($token));
            $request->session()->flash('msg', 'Mail has been sent');
            return redirect()->route('adminPassword.index');
        }else{
            $request->session()->flash('msg', 'Invalid username or email.');
            return redirect()->route('adminPassword.index');
        }
    }
    public function passToken($token, $id, Request $request)
    {
        $token = PasswordToken::where('id', $id)
            ->where('token', $token)
            ->first();
        if ($token != null && $token->verified == 0)
        {
            $admin = Admin::where('email', $token->email)->first();
            if ($admin!= null){
                $request->session()->put('emailToken', $admin->email);
                $request->session()->put('tokenToken', $token->token);
                return redirect()->route('adminPassword.edit');
            }
            else{
                $request->session()->flash('msg', 'User not found for this email.');
                return redirect()->route('adminPassword.index');
            }
        }
        else{
            $request->session()->flash('msg', 'Link has been expired.');
            return redirect()->route('adminPassword.index');
        }
    }
    public function edit(Request $request)
    {
        return view('admin.reset-password');
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'newPassword'       =>  'required',
            'confirmPassword'   =>  'same:newPassword'
        ]);
        $admin = Admin::where('email', $request->session()->get('emailToken'))
            ->first();
        if ($admin != null){
            $admin->password = $request->newPassword;
            $admin->save();
            $request->session()->forget('emailToken');
            $token = PasswordToken::where('token', $request->session()->pull('tokenToken'))
                ->first();
            $token->verified = 1;
            $token->save();
            $request->session()->flash('msg', 'Password updated, please login to continue.');
            return redirect()->route('login.admin');
        }
        $request->session()->flash('msg', 'Link has been expired.');
        return redirect()->route('adminPassword.edit');
    }
}
