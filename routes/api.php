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


Route::post('login', 'ApiUserController@login');
Route::post('register', 'ApiUserController@register');

Route::group(['middleware' => ['jwt.auth']], function () {
    Route::get('logout', 'ApiUserController@logout');
    Route::get('profile', 'ApiUserController@profile');
    Route::put('profile', 'ApiUserController@profileUpdate');

    Route::resource('news', 'ApiNewsController', ['except' => ['create', 'edit']]);
    Route::resource('topics', 'ApiTopicController', ['except' => ['create', 'edit']]);
});
