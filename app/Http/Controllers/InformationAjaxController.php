<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PoliceStation;
use App\District;
use App\Division;

class InformationAjaxController extends Controller
{
    public function allDistricts(Request $request)
    {
    	$districtList = District::all();
    	return json_encode($districtList);
    }
    public function psListInDistrict(Request $request)
    {
    	$psList = PoliceStation::where('district', $request->district)->get();
    	return response()->json($psList);
    }
    public function districtListInDivision(Request $request)
    {
    	$districtList = District::where('division', $request->division)->get();
    	return response()->json($districtList);
    }
}
