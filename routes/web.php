<?php

use Illuminate\Support\Facades\Route;

Auth::routes(['verify'=>true]);

Route::group(['middleware' => ['auth','verified']], function() {
    Route::get('/', function () {
        return view('index');
    });
    Route::resource('roles','App\Http\Controllers\RoleController');
    Route::resource('settings','App\Http\Controllers\SettingsController');
    Route::resource('users','App\Http\Controllers\UserController');
    Route::resource('sales','App\Http\Controllers\SalesController');
    Route::get('/{page}', 'App\Http\Controllers\AdminController@index');


});

