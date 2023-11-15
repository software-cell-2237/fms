<?php

namespace App\Http\Controllers;

use App\Models\PreUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PreUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request){

        exit;

        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'cnic'=>'required',
            'user_type'=>'required',
            'password'=>'required|min:4|max:30',
            'cpassword'=>'required|min:4|max:30|same:password',
        ]);

        $PreUser = new PreUser();
        $PreUser->name = $request->name;
        $PreUser->email = $request->email;
        $PreUser->cnic = $request->cnic;
        $PreUser->user_type = $request->user_type;
        $PreUser->password = Hash::make($request->password) ;
        $PreUser->save();


        if($PreUser){
            return redirect()->back()->with('success', 'User registration successfully...');
        }else{
            return redirect()->back()->with('fail', 'Something wrong ');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PreUser  $preUser
     * @return \Illuminate\Http\Response
     */
    public function show(PreUser $preUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PreUser  $preUser
     * @return \Illuminate\Http\Response
     */
    public function edit(PreUser $preUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PreUser  $preUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PreUser $preUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PreUser  $preUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(PreUser $preUser)
    {
        //
    }
}
