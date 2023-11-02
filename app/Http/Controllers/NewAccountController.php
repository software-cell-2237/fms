<?php

namespace App\Http\Controllers;

use App\Models\Level1;
use App\Models\Level2;
use App\Models\Level3;
use App\Models\Level4;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewAccountController extends Controller
{
    public function levelOne_create(){
        $getLevelOne=Level1::all();

        return view('accounts/account_opening/level_one/create_level_one',compact('getLevelOne'));
    }

    public function levelTwo_create(Request $request){

        $getMainCode=Level1::all();

        return view('accounts/account_opening/level_two/create_level_two', compact('getMainCode'));
    }

    public function levelTwo_list(Request $request){
        $getLevelTwoData = Level2::where('main_code', $request->selectedValue)->get();
        return response()->json($getLevelTwoData);
    }


    public function levelThree_create(){
        $getMainCode=Level1::all();
        return view('accounts/account_opening/level_three/create_level_three', compact('getMainCode'));
    }



    public function getControlCode(Request $request){

        $getLevelTwoData = Level2::where('main_code', $request->selectedValue)->get();
        return response()->json($getLevelTwoData);
    }
    public function levelThree_list(Request $request){

        $getLevelTwoData = Level3::where('main_code', $request->selectedValue)->where('control_code',  $request->selectedValue1)->get();
        return response()->json($getLevelTwoData);
    }

    public function levelFour_create(){
        $getMainCode=Level1::all();
        return view('accounts/account_opening/level_four/create_level_four' , compact('getMainCode'));
    }

    public function getSubCode(Request $request){

        $getLevelTwoData = Level3::where('main_code', $request->selectedValue)->where('control_code',  $request->selectedValue1)->get();
        return response()->json($getLevelTwoData);
    }

    public function levelFour_list(Request $request){

        $getLevelTwoData = Level4::where('main_code', $request->main_code)
                                ->where('control_code',  $request->control_code)
                                ->where('sub_code',  $request->sub_code)
                                ->get();
        return response()->json($getLevelTwoData);
    }


}
