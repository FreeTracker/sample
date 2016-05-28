<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/', ['as' => 'index', 'uses' => 'TrackerController@index']);
    Route::get('/tracker', ['as' => 'index', 'uses' => 'TrackerController@index']);
    Route::get('/tracker/popular', ['as' => 'popular', 'uses' => 'TrackerController@popular']);
    Route::get('/tracker/create', ['middleware' => 'auth', 'as' => 'create', 'uses' => 'TrackerController@create']);
    Route::get('/tracker/show/{id}', ['as' => 'more', 'uses' =>'TrackerController@show']);
    Route::get('/home', 'HomeController@index');
    Route::get('auth/socialite/{id}', 'Auth\OauthController@redirectToProvider');
    Route::get('auth/callback/{id}', 'Auth\OauthController@handleProviderCallback');
});
