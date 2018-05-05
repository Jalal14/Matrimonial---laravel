<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Blood;
use App\Gender;
use App\Religion;


class PublicController extends Controller
{
    public function index($value='')
    {
    	$bloodList = Blood::all();
    	$genderList = Gender::all();
    	$religionList = Religion::all();
        $userList = User::inRandomOrder()
                        ->limit(6)
                        ->get();
        foreach ($userList as $user) {
            $user->bgroup = Blood::find($user->blood)->bgroup;
            $user->gender_name = Gender::find($user->gender)->gender;
            $user->religion_name = Religion::find($user->religion)->name;
            $user->age = date_diff(date_create($user->dob), date_create('today'))->y;
        }
    	return view('public.index')
                ->with('userList', $userList)
    			->with('bloodList', $bloodList)
    			->with('genderList', $genderList)
    			->with('religionList', $religionList)
                ->with('selectedMinAge', 18)
                ->with('selectedMaxAge', 26)
                ->with('selectedGen', 2)
                ->with('selectedRel', 1);
    }
    public function search(Request $request)
    {
        $bloodList = Blood::all();
        $genderList = Gender::all();
        $religionList = Religion::all();
        $minDob = date("Y-m-d", strtotime("-$request->minAge year"));
        $maxDob = date("Y-m-d", strtotime("-$request->maxAge year"));
        $userList = User::whereBetween('dob', [$maxDob, $minDob])
                        ->where('religion', $request->religion)
                        ->where('gender', $request->gender)
                        ->get();
        if (count($userList)>2) {
            $userList = $userList->random(2);
        }else{
            $userList = $userList->shuffle();
        }
        foreach ($userList as $user) {
            $user->bgroup = Blood::find($user->blood)->bgroup;
            $user->gender_name = Gender::find($user->gender)->gender;
            $user->religion_name = Religion::find($user->religion)->name;
            $user->age = date_diff(date_create($user->dob), date_create('today'))->y;
        }
        return view('public.index')
                ->with('userList', $userList)
                ->with('bloodList', $bloodList)
                ->with('genderList', $genderList)
                ->with('religionList', $religionList)
                ->with('selectedMinAge', $request->minAge)
                ->with('selectedMaxAge', $request->maxAge)
                ->with('selectedGen', $request->gender)
                ->with('selectedRel', $request->religion);
    }
}
