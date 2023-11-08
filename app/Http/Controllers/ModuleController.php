<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ModuleController extends Controller
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
        $GetModule=Module::all();

        return view('accounts.users.module.create_module', compact('GetModule'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Add a newly Module resource in add.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $request->validate([
            'module_title'=>'required',
            'module_url'=>'required',
        ]);

        //$ldate = date('m-d-Y');

        $DefModule = new Module();
        $DefModule->module_title = $request->module_title;
        $DefModule->module_url = $request->module_url;
        $DefModule->added_date = date('m-d-Y');
        $DefModule->added_by = Auth::user()->email;
        $DefModule->server_ip = $_SERVER['REMOTE_ADDR'];
        $DefModule->save();

        if($DefModule){
            return redirect()->back()->with('success', 'Module Add successfully...');
        }else{
            return redirect()->back()->with('fail', 'Something wrong ');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $module_id)
    {
       Module::where('module_id', $module_id)->delete();

       return redirect()->back()->with('success', 'Module Deleted Successfully...');
    }
}
