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



Route::get('users', 'usersController@getAllUsers');
Route::post('addUser', 'usersController@addUser');
Route::post('login', 'JWTAuthController@login');



Route::middleware(['jwt.auth', 'jwt.user'])->group(function () {
    Route::get('user/{id}', 'usersController@getUser');
    Route::put('user/{id}', 'usersController@updateUser');
    Route::delete('user/{id}', 'usersController@deleteUser');
});
