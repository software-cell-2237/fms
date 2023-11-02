<?php

namespace App\Http\Controllers\Definations;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DefController extends Controller
{
    public function company_create(){

        return view('accounts/companies/create_company');
    }

    public function company_add(Request $request){

        $request->validate([
            'company_code'=>'required',
            'party_name'=>'required',
            'phone_no'=>'required',
            'mobile_no'=>'required',
            'fax'=>'required',
        ]);

        $UserRegister = new Company();
        $UserRegister->company_code = $request->company_code;
        $UserRegister->party_name = $request->party_name;
        $UserRegister->phone_no = $request->phone_no;
        $UserRegister->mobile_no = $request->mobile_no;
        $UserRegister->fax = $request->fax;
        $UserRegister->added_by = '';
        $UserRegister->added_date = '';
        $UserRegister->server_ip = '';
        $UserRegister->save();

        if($UserRegister){
            return redirect()->back()->with('success', 'New Company Add Successfully...');
        }else{
            return redirect()->back()->with('fail', 'Something wrong ');
        }
    }

    public function company_list(){
        $get_company = Company::all();
        return view('accounts/companies/list_company', compact('get_company'));
    }

    public function company_delete(Request $request ,$id){

        $res = Company::where('id',$id)->delete();

        if($res){
            return redirect()->back()->with('success', 'Company Deleted Successfully...');
        }else{
            return redirect()->back()->with('fail', 'Something wrong ');
        }
    }
}
