<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blood;
use App\Gender;
use App\Religion;
use App\PasswordToken;
use App\User;
use Mail;
use App\Mail\PasswordMail;

class PasswordController extends Controller
{
    public function index()
    {
        $bloodList = Blood::all();
        $genderList = Gender::all();
        $religionList = Religion::all();
        return view('public.forgot-password')
            ->with('bloodList', $bloodList)
            ->with('genderList', $genderList)
            ->with('religionList', $religionList);
    }
    public function resetRequest(Request $request)
    {
        $this->validate($request, [
            'email' => 'bail | required | email'
        ]);
        $user = User::where('email', $request->email)
                    ->first();
        if ($user != null){
            $token = new PasswordToken();
            $token->email = $request->email;
            $token->token = sha1(time());
            $token->verified = 0;
            $token->save();
            Mail::send(new PasswordMail($token));
            $request->session()->flash('msg', 'An email has been sent');
            return redirect()->route('password.index');
        }
        else{
            $request->session()->flash('msg', 'Email not registered');
            return redirect()->route('password.index');
        }
    }
    public function passToken($token, $id, Request $request)
    {
        $token = PasswordToken::where('id', $id)
                            ->where('token', $token)
                            ->first();
        if ($token != null && $token->verified == 0)
        {
            $user = User::where('email', $token->email)->first();
            if ($user != null){
                $request->session()->put('emailToken', $user->email);
                $request->session()->put('tokenToken', $token->token);
                return redirect()->route('password.edit');
            }
            else{
                $request->session()->flash('msg', 'User not found for this email.');
                return redirect()->route('password.index');
            }
        }
        else{
            $request->session()->flash('msg', 'Link has been expired.');
            return redirect()->route('password.index');
        }
    }
    public function edit(Request $request)
    {
        $bloodList = Blood::all();
        $genderList = Gender::all();
        $religionList = Religion::all();
        return view('public.reset-password')
            ->with('bloodList', $bloodList)
            ->with('genderList', $genderList)
            ->with('religionList', $religionList);
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'newPassword'       =>  'required',
            'confirmPassword'   =>  'same:newPassword'
        ]);
        $user = User::where('email', $request->session()->get('emailToken'))
                    ->first();
        if ($user != null){
            $user->password = $request->newPassword;
            $user->save();
            $request->session()->forget('emailToken');
            $token = PasswordToken::where('token', $request->session()->pull('tokenToken'))
                                ->first();
            $token->verified = 1;
            $token->save();
            $request->session()->flash('msg', 'Password updated, please login to continue.');
            return redirect()->route('password.edit');
        }
        $request->session()->flash('msg', 'Link has been expired.');
        return redirect()->route('password.edit');
    }
}
