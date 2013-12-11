<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// CSRF route group
Route::group(array('before' => 'csrf'), function(){
	// UserController routes
	Route::post('verify', array('as' => 'verify', 'before' => 'csrf', 'uses' => 'UserController@postLogin'));
	Route::post('save-user', array('as' => 'save-user', 'before' => 'csrf', 'uses' => 'UserController@saveUser'));

	// HomeController routes
	Route::post('save-profile', array('as' => 'save-profile', 'uses' => 'HomeController@saveProfile'));
});

// Authentication route group
Route::group(array('before' => 'auth'), function(){
	// UserController routes
	Route::get('logout', array('as' => 'logout', 'uses' => "UserController@logout"));

	// HomeController routes
	Route::get('dashboard', array('as' => 'dashboard', 'uses' => "HomeController@getDashboard"));
	Route::get('send-verification-email', array('as' => 'send-verification-email', 'uses' => "HomeController@sendVerificationEmail"));
	Route::get('edit-profile', array('as' => 'edit-profile', 'uses' => 'HomeController@editProfile'));

});

// Guest route group
Route::group(array('before' => 'guest'), function(){
	// UserController routes
	Route::get('login', array('as' => 'login', 'uses' => 'UserController@getLogin'));
	Route::get('register', array('as' => 'register', 'uses' => 'UserController@getRegister'));
});

// HomeController routes
Route::get('/', array('as' => '/', 'uses' => 'HomeController@getHome'));
Route::get('verify-email/{hash}', array('as' => 'verify-my-email', 'uses' => 'HomeController@verifyEmail'))->where('hash', '[a-f\d]{32,32}');

// UserController routes
Route::get('is-email-exist', array('as' => 'is-email-exist', 'uses' => 'UserController@isEmailExist'));


// Routes for testing
Route::get('test', function(){
	echo App::environment();
});