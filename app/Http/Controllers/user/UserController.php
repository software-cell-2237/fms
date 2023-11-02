<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function check(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required|min:4|max:30'
        ],[
            'email.exists'=>'This email not exist on user table'
        ]);

        $cred = $request->only('email','password');

        if(Auth::guard('user')->attempt($cred)){
            return redirect()->route('home');
        }else{
            return redirect('/')->with('fail','Incorrect credentials');
        }
    }

    public function create(){
        return view('accounts.users.create_user');
    }

    public function add(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'cnic'=>'required',
            'user_type'=>'required',
            'password'=>'required|min:4|max:30',
            'cpassword'=>'required|min:4|max:30|same:password',
        ]);

        $UserRegister = new User();
        $UserRegister->name = $request->name;
        $UserRegister->email = $request->email;
        $UserRegister->cnic = $request->cnic;
        $UserRegister->user_type = $request->user_type;
        $UserRegister->password = Hash::make($request->password) ;
        $UserRegister->save();


        if($UserRegister){
            return redirect()->back()->with('success', 'User registration successfully...');
        }else{
            return redirect()->back()->with('fail', 'Something wrong ');
        }

    }

    public function signup(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'cnic'=>'required',
            'user_type'=>'required',
            'password'=>'required|min:4|max:30',
            'cpassword'=>'required|min:4|max:30|same:password',
        ]);
        //exit;
        $UserRegister = new User();
        $UserRegister->name = $request->name;
        $UserRegister->email = $request->email;
        $UserRegister->cnic = $request->cnic;
        $UserRegister->user_type = $request->user_type;
        $UserRegister->password = Hash::make($request->password) ;
        $UserRegister->save();






        if($UserRegister){
            return redirect('/')->with('success', 'User registration successfully done...');
        }else{
            return redirect('/')->with('fail', 'Something wrong ');
        }

    }


    public function logout(){

        Auth::guard('user')->logout();

        return redirect()->route('login');
    }
}
