<?php

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



Route::get('/', function () {
    return view('welcome');
});

#Login Page
Route::get('login', 'AccountsManagement\AdminAccounts@index');

#Logout Page
Route::get('logout', 'AccountsManagement\AdminAccounts@logout');

#Account Management Page
Route::get('profile', 'AccountsManagement\UsersManagement@index');


