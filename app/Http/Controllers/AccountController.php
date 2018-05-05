<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\FamilyRequest;
use App\Http\Requests\EducationRequest;
use App\Http\Requests\ProfilePicRequest;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Gender;
use App\Religion;
use App\Blood;
use App\Complexion;
use App\MaritalStatus;
use App\Family;
use App\FamilyType;
use App\PerAddress;
use App\PrAddress;
use App\Division;
use App\District;
use App\PoliceStation;
use App\Education;
use App\Degree;
use App\Job;
use App\Interest;
use App\Hobby;
use App\Sport;
use App\Music;

class AccountController extends Controller
{
    public function editProfile(Request $request)
    {
    	$user = User::find($request->session()->get('loggedUser'));
    	$genderList = Gender::all();
    	$religionList = Religion::all();
    	$bloodList = Blood::all();
    	$complexionList = Complexion::all();
    	$statusList = MaritalStatus::all();
    	return view('user.account.update-profile')
    			->with('user', $user)
    			->with('genderList', $genderList)
    			->with('religionList', $religionList)
    			->with('bloodList', $bloodList)
    			->with('complexionList', $complexionList)
    			->with('statusList', $statusList);
    }
    public function updateProfile(UpdateProfileRequest $request)
    {
        $user = User::find($request->session()->get('loggedUser'));
        $user->fname    = $request->fName;
        $user->mname    = $request->mName;
        $user->lname    = $request->lName;
        $user->dob      = $request->dob;
        $user->gender   = $request->gender;
        $user->religion = $request->religion;
        $user->height   = $request->height;
        $user->weight   = $request->weight;
        $user->blood    = $request->blood;
        $user->email    = $request->email;
        $user->number1  = $request->contact;
        $user->number2  = $request->contact2;
        $user->complexion = $request->complexion;
        $user->marital_status = $request->marital;
        $user->children = $request->children;
        $user->save();
    	return redirect()->route('account.updateProfile');
    }
    public function proPic(Request $request)
    {
        $user = User::find($request->session()->get('loggedUser'));
        return view('user.account.profile-picture')
                ->with('user', $user);
    }
    public function updateProPic(ProfilePicRequest $request)
    {
        $user = User::find($request->session()->get('loggedUser'));
        $file = $request->file('proPic');
        $fileName = $user->uname.".".$file->getClientOriginalExtension();
        $user->propic = 'propic/'.$fileName;
        if ($user->save() == 1) {
            $file->move('images/propic', $fileName);
        }
        return redirect()->route('account.proPic');
    }
    public function family(Request $request)
    {
    	$user = Family::find($request->session()->get('loggedUser'));
    	$typeList = FamilyType::all();
    	return view('user.account.family')
    			->with('user', $user)
    			->with('typeList', $typeList);
    }
    public function updateFamily(FamilyRequest $request)
    {
        $user = Family::find($request->session()->get('loggedUser'));
        if ($user == null){
            $user = new Family();
            $user->uid = $request->session()->get('loggedUser');
        }
        $user->type     = $request->family_type;
        $user->father_name = $request->faName;
        $user->father_occupation = $request->faOccupation;
        $user->father_income = $request->faIncome;
        $user->mother_name = $request->moName;
        $user->mother_occupation = $request->moOccupation;
        $user->mother_income = $request->moIncome;
        $user->contact = $request->fContact;
        $user->siblings = $request->siblings;
        $user->save();
        return redirect()->route('account.family');
    }
    public function perAddress(Request $request)
    {
        $user = DB::table('tbl_per_address')
    				->join('tbl_police_station', 'tbl_per_address.per_police_station', '=', 'tbl_police_station.id')
    				->join('tbl_district', 'tbl_police_station.district', '=', 'tbl_district.id')
    				->join('tbl_division', 'tbl_district.division', '=', 'tbl_division.id')
    				->select('tbl_per_address.*','tbl_district.id as district','tbl_division.id as division')
    				->where('per_uid',$request->session()->get('loggedUser'))
    				->first();
        if ($user == null) {
            $addresses = DB::table('tbl_division')
                        ->join('tbl_district', 'tbl_division.id', '=', 'tbl_district.division')
                        ->join('tbl_police_station', 'tbl_district.id', '=', 'tbl_police_station.district')
                        ->select('tbl_police_station.id as psId', 'tbl_district.id as districtId', 'tbl_division.id as divisionId')
                        ->orderBy('tbl_division.id')
                        ->first();
            $divisionList = Division::orderBy('id')->get();
            $districtList = District::where('division', $addresses->divisionId)->get();
            $psList = PoliceStation::where('district', $addresses->districtId)->get();
        }else{
            $psList = PoliceStation::where('district', $user->district)
                                ->get();
            $districtList = District::where('division', $user->division)
                                    ->get();
            $divisionList = Division::all();
        }
    	return view('user.account.per-address')
    			->with('user', $user)
    			->with('psList', $psList)
    			->with('districtList', $districtList)
    			->with('divisionList', $divisionList);
    }
    public function updatePerAddress(Request $request)
    {
        $user = PerAddress::find($request->session()->get('loggedUser'));
        if ($user == null){
            $user = new PerAddress();
            $user->per_uid = $request->session()->get('loggedUser');
        }
        $user->per_house = $request->house;
        $user->per_road = $request->road;
        $user->per_area = $request->area;
        $user->per_police_station = $request->police_station;
        $user->save();
        return redirect()->route('account.perAddress');
    }
    public function prAddress(Request $request)
    {
    	$user = DB::table('tbl_pr_address')
    				->join('tbl_police_station', 'tbl_pr_address.pr_police_station', '=', 'tbl_police_station.id')
    				->join('tbl_district', 'tbl_police_station.district', '=', 'tbl_district.id')
    				->join('tbl_division', 'tbl_district.division', '=', 'tbl_division.id')
    				->select('tbl_pr_address.*','tbl_district.id as district','tbl_division.id as division')
    				->where('pr_uid',$request->session()->get('loggedUser'))
    				->first();
        if ($user == null) {
            $addresses = DB::table('tbl_division')
                        ->join('tbl_district', 'tbl_division.id', '=', 'tbl_district.division')
                        ->join('tbl_police_station', 'tbl_district.id', '=', 'tbl_police_station.district')
                        ->select('tbl_police_station.id as psId', 'tbl_district.id as districtId', 'tbl_division.id as divisionId')
                        ->orderBy('tbl_division.id')
                        ->first();
            $divisionList = Division::orderBy('id')->get();
            $districtList = District::where('division', $addresses->divisionId)->get();
            $psList = PoliceStation::where('district', $addresses->districtId)->get();
        }else{
            $psList = PoliceStation::where('district', $user->district)
                                ->get();
            $districtList = District::where('division', $user->division)
                                    ->get();
            $divisionList = Division::all();
        }
    	return view('user.account.pr-address')
    			->with('user', $user)
    			->with('psList', $psList)
    			->with('districtList', $districtList)
    			->with('divisionList', $divisionList);
    }
    public function updatePrAddress(Request $request)
    {
        $user = PrAddress::find($request->session()->get('loggedUser'));
        if ($user == null){
            $user = new PrAddress();
            $user->pr_uid = $request->session()->get('loggedUser');
        }
        $user->pr_house = $request->house;
        $user->pr_road = $request->road;
        $user->pr_area = $request->area;
        $user->pr_police_station = $request->police_station;
        $user->save();
        return redirect()->route('account.prAddress');
    }
    public function education(Request $request)
    {
    	$user = Education::find($request->session()->get('loggedUser'));
    	$degreeList = Degree::all();
    	return view('user.account.education')
    			->with('user', $user)
    			->with('degreeList', $degreeList);
    }
    public function updateEducation(EducationRequest $request)
    {
        $user = Education::find($request->session()->get('loggedUser'));
        if ($user == null){
            $user = new Education();
            $user->uid = $request->session()->get('loggedUser');
        }
        $user->degree = $request->degree;
        $user->institution = $request->institution;
        $user->field = $request->field;
        $user->passing_year = $request->passing_year;
        $user->save();
        return redirect()->route('account.education');
    }
    public function occupation(Request $request)
    {
    	$user = Job::find($request->session()->get('loggedUser'));
    	return view('user.account.occupation')
    				->with('user', $user);
    }
    public function updateOccupation(Request $request)
    {
        $user = Job::find($request->session()->get('loggedUser'));
        if ($user == null){
            $user = new Job();
            $user->uid = $request->session()->get('loggedUser');
        }
        $user->designation = $request->designation;
        $user->company = $request->company;
        $user->joinning_date = $request->joinning_date;
        $user->annual_income = $request->income;
        $user->save();
        return redirect()->route('account.occupation');
    }
    public function lifeStyle(Request $request)
    {
    	$userInterestList = DB::table('tbl_user_interest')
    							->where('uid', $request->session()->get('loggedUser'))
    							->get();
    	$userHobbyList = DB::table('tbl_user_hobby')
    						->where('uid', $request->session()->get('loggedUser'))
    						->get();
    	$userMusicList = DB::table('tbl_user_music')
    						->where('uid', $request->session()->get('loggedUser'))
    						->get();
    	$userSportList = DB::table('tbl_user_sports')
    						->where('uid', $request->session()->get('loggedUser'))
    						->get();
    	$interestList = Interest::all();
    	$hobbyList = Hobby::all();
    	$sportList = Sport::all();
    	$musicList = Music::all();
    	return view('user.account.life-style')
    			->with('userInterestList', $userInterestList)
    			->with('userHobbyList', $userHobbyList)
    			->with('userMusicList', $userMusicList)
    			->with('userSportList', $userSportList)
    			->with('interestList', $interestList)
    			->with('hobbyList', $hobbyList)
    			->with('sportList', $sportList)
    			->with('musicList', $musicList);
    }
    public function updateLifeStyle(Request $request)
    {
        DB::table('tbl_user_interest')
                ->where('uid', $request->session()
                ->get('loggedUser'))
                ->delete();
        $interests = $request->interest;
        if ($interests != null) {
            foreach ($interests as $interest) {
                $info = ['uid'=>$request->session()->get('loggedUser'), 'interest'=>$interest];
                $interestList[] = $info;
            }
            DB::table('tbl_user_interest')
                ->insert($interestList);
        }
        DB::table('tbl_user_hobby')
                ->where('uid', $request->session()
                ->get('loggedUser'))
                ->delete();
        $hobbies = $request->hobby;
        if ($hobbies != null) {
            foreach ($hobbies as $hobby) {
                $info = ['uid'=>$request->session()->get('loggedUser'), 'hobby'=>$hobby];
                $hobbyList[] = $info;
            }
            DB::table('tbl_user_hobby')
                ->insert($hobbyList);
        }
        DB::table('tbl_user_music')
                ->where('uid', $request->session()
                ->get('loggedUser'))
                ->delete();
        $musics = $request->music;
        if ($musics != null) {
            foreach ($musics as $music) {
                $info = ['uid'=>$request->session()->get('loggedUser'), 'music'=>$music];
                $musicList[] = $info;
            }
            DB::table('tbl_user_music')
                ->insert($musicList);
        }
        DB::table('tbl_user_sports')
                ->where('uid', $request->session()
                ->get('loggedUser'))
                ->delete();
        $sports = $request->sport;
        if ($sports != null) {
            foreach ($sports as $sport) {
                $info = ['uid'=>$request->session()->get('loggedUser'), 'sport'=>$sport];
                $sportList[] = $info;
            }
            DB::table('tbl_user_sports')
                ->insert($sportList);
        }
        return redirect()->route('account.lifeStyle');
    }
    public function editPassword(Request $request)
    {
        return view('user.account.change-password');
    }
    public function updatePassword(ChangePasswordRequest $request)
    {
        $user = User::find($request->session()->get('loggedUser'));
        if ($user->password != $request->password) {
            $request->session()->flash('msg', "Incorrect password.");
            return redirect()->route('account.changePassword');
        }else{
            $user->password = $request->newPassword;
            $user->save();
            $request->session()->flash('msg', "Password has been changed.");
            return redirect()->route('account.changePassword');
        }
    }
}