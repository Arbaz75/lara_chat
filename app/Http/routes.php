<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function(){
	return view("index");
});

Route::get('fbauth', 'Auth\LoginAuth@loginWithFacebook');

Route::post('chat', 'Auth\LoginAuth@index' );
Route::get('home', function(){
	return view("chat");
});

Route::post('chatM/{id}', 'chatController@index');

Route::get('add', function(){
	return view("adduser");
});

Route::post('addme', 'addController@store');

Route::get('signup', function(){
	return view("signup");
});
Route::post('signupcontroller', 'Auth\LoginAuth@create');

Route::get('facebook', 'Auth\LoginAuth@facebook_redirect');
Route::get('account/facebook', 'Auth\LoginAuth@facebook');

Route::get('google', 'Auth\LoginAuth@google_redirect');
Route::get('account', 'Auth\LoginAuth@google');
