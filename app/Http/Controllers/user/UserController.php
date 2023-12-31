<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRegisterModule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

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

    public function list(){
        $getUsers=User::all();
        // print_r($getUsers);
        // exit;
        return view('accounts.users.show_user', compact('getUsers'));
    }


    public function create_registration(){
        $GetUser=User::where('user_type', '<>',  1)->get();
        $GetModule=Module::all();
        $GetRole=Role::all();

        $getUserRegistration = DB::table('user_register_modules')
                            ->join('users', 'user_register_modules.user_id', '=', 'users.user_id')
                            ->join('modules', 'user_register_modules.module_id', '=', 'modules.module_id')
                            ->join('roles', 'user_register_modules.role_id', '=', 'roles.role_id')
                            ->get();
                            // echo"<pre>";
                            // print_r($getUserRegistration);
                            // exit;

        return view('accounts.users.user_registration', compact('GetUser','GetModule','GetRole', 'getUserRegistration'));
    }

    public function registration(Request $request){
        $request->validate([
            'user'=>'required',
            'module'=>'required',
            'role'=>'required',
        ]);
        //exit;

        $UserRegister = new UserRegisterModule();
        $UserRegister->user_id = $request->user;
        $UserRegister->module_id = $request->module;
        $UserRegister->role_id = $request->role;
        $UserRegister->added_date = date('m-d-Y');
        $UserRegister->added_by = Auth::user()->email;
        $UserRegister->server_ip = $_SERVER['REMOTE_ADDR'];
        $UserRegister->save();

        if($UserRegister){
            return redirect()->back()->with('success', 'User registration successfully done...');
        }else{
            return redirect()->back()->with('fail', 'Something wrong ');
        }
    }
    public function logout(){

        Auth::guard('user')->logout();

        return redirect()->route('login');
    }

    public function user_delete($user_id){

        User::where('user_id', $user_id)->delete();

       return redirect()->back()->with('success', 'User Deleted Successfully...');

    }

    public function registration_delete($urm_id){

        UserRegisterModule::where('urm_id', $urm_id)->delete();

       return redirect()->back()->with('success', 'Registration Deleted Successfully...');

    }
}
