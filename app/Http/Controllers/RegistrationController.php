<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RegistrationRequest;
use App\Http\Requests\RegistrationReqRequest;

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
}
