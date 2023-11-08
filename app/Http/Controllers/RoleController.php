<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function create(Request $request){

        $GetRole=Role::all();
        return view('accounts.users.roles.create_role', compact('GetRole'));
    }

    public function add(Request $request){

        $request->validate([
            'role_name'=>'required',
            'c'=>'required',
            'r'=>'required'
        ]);

        $DefRole = new Role();
        $DefRole->role_name = $request->role_name;
        $DefRole->c = $request->c;
        $DefRole->r = $request->r;
        $DefRole->u = $request->u;
        $DefRole->d = $request->d;
        $DefRole->added_date = date('m-d-Y');
        $DefRole->added_by = Auth::user()->email;
        $DefRole->server_ip = $_SERVER['REMOTE_ADDR'];
        $DefRole->save();

        if($DefRole){
            return redirect()->back()->with('success', 'Role Add successfully...');
        }else{
            return redirect()->back()->with('fail', 'Something wrong ');
        }
    }

    public function delete(Request $request, $role_id)
    {
       Role::where('role_id', $role_id)->delete();

       return redirect()->back()->with('success', 'Role Deleted Successfully...');
    }
}
