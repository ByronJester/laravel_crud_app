<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); 

# Retrieve Data
Route::post('getUsers', 'AccountsManagement\UsersManagement@getUsers');

# Routes for all /profile
Route::resource('profile', 'AccountsManagement\UsersManagement');

#Login User
Route::post('login', 'AccountsManagement\AdminAccounts@login');
