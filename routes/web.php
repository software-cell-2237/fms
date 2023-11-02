<?php

use App\Http\Controllers\Definations\DefController;
use App\Http\Controllers\NewAccountController;
use App\Http\Controllers\user\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['guest:user'])->group(function () {
        Route::view('/','authentication.login')->name('login');
        Route::view('/register','dashboard.user.register')->name('register');
        Route::post('signup',[UserController::class,'signup'])->name('signup');
        Route::post('check',[UserController::class,'check'])->name('check');
});

Route::middleware(['auth:user'])->group(function () {

    Route::view('/home','accounts.dashboard.home')->name('home');

    //-----------------------------User Module----------------------------
    Route::prefix('user')->name('user.')->group(function(){
        Route::get('/create',[UserController::class,'create'])->name('create');
        Route::post('/add',[UserController::class,'add'])->name('add');
    });
    //-----------------------------User Module----------------------------

    //-----------------------------Companies Module----------------------------
    Route::prefix('company')->name('company.')->group(function(){
        Route::get('/create',[DefController::class,'company_create'])->name('create');
        Route::post('/add',[DefController::class,'company_add'])->name('add');
        Route::get('list',[DefController::class,'company_list']);
        Route::get('/delete/{id}',[DefController::class,'company_delete']);
    });
    //-----------------------------Companies Module----------------------------

    //-----------------------------New Accounts Module----------------------------
    Route::prefix('levelOne')->name('levelOne.')->group(function(){
        Route::get('/create',[NewAccountController::class,'levelOne_create'])->name('create');
        Route::post('/add',[NewAccountController::class,'levelOne_add'])->name('add');
        Route::get('list',[NewAccountController::class,'levelOne_list']);
        Route::get('/delete/{id}',[NewAccountController::class,'levelOne_delete']);
    });
    Route::prefix('levelTwo')->name('levelTwo.')->group(function(){
        Route::get('/create',[NewAccountController::class,'levelTwo_create'])->name('create');
        Route::post('/add',[NewAccountController::class,'levelTwo_add'])->name('add');
        Route::get('list',[NewAccountController::class,'levelTwo_list']);
        Route::get('/delete/{id}',[NewAccountController::class,'levelTwo_delete']);
    });
    Route::prefix('levelThree')->name('levelThree.')->group(function(){
        Route::get('/create',[NewAccountController::class,'levelThree_create'])->name('create');
        Route::post('/add',[NewAccountController::class,'levelThree_add'])->name('add');
        Route::get('list',[NewAccountController::class,'levelThree_list']);
        Route::get('/delete/{id}',[NewAccountController::class,'levelThree_delete']);
        Route::get('/getControlCode',[NewAccountController::class,'getControlCode']);

    });
    Route::prefix('levelFour')->name('levelFour.')->group(function(){
        Route::get('/create',[NewAccountController::class,'levelFour_create'])->name('create');
        Route::post('/add',[NewAccountController::class,'levelFour_add'])->name('add');
        Route::get('list',[NewAccountController::class,'levelFour_list']);
        Route::get('/delete/{id}',[NewAccountController::class,'levelFour_delete']);
        Route::get('/getControlCode',[NewAccountController::class,'getControlCode']);
        Route::get('/getSubCode',[NewAccountController::class,'getSubCode']);
    });
    //-----------------------------New Accounts Module----------------------------

    Route::get('/logout',[UserController::class,'logout'])->name('logout');
});




