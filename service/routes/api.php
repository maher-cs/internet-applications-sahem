<?php

use Illuminate\Http\Request;
use App\Skill;

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

// login & register
Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');
Route::group(['middleware' => ['auth:api']], function(){
    Route::get('logout', 'UserController@logout');
});

// projects routes
Route::get('projects', 'ProjectController@index');
Route::get('projects/{id}', 'ProjectController@show');
Route::group(['middleware' => ['auth:api', 'isAuthority']], function(){
    Route::post('projects/create', 'ProjectController@store');
    Route::post('offers/accept', 'OfferController@accept');
});

// offers routes
Route::group(['middleware' => ['auth:api', 'IsStudent']], function(){
    Route::post('offers/create', 'OfferController@store');
});

// categories routes
Route::get('categories', 'CategoryController@index');
