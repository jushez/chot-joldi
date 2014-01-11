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
	Route::post('verify', array('as' => 'verify', 'uses' => 'UserController@postLogin'));
	Route::post('save-user', array('as' => 'save-user', 'uses' => 'UserController@saveUser'));
	Route::post('send-password-recovery-email', array('as' => 'send-password-recovery-email', 'uses' => 'UserController@sendPasswordRecoveryEmail'));

	// HomeController routes
	Route::post('save-profile', array('as' => 'save-profile', 'uses' => 'HomeController@saveProfile'));

	// JobController routes
	Route::post('save-job', array('as' => 'save-job', 'uses' => 'JobController@saveJob'));
});

// Authentication route group
Route::group(array('before' => 'auth'), function(){
	// UserController routes
	Route::get('logout', array('as' => 'logout', 'uses' => "UserController@logout"));

	// HomeController routes
	Route::get('dashboard', array('as' => 'dashboard', 'uses' => "HomeController@getDashboard"));
	Route::get('send-verification-email', array('as' => 'send-verification-email', 'uses' => "HomeController@sendVerificationEmail"));
	Route::get('edit-profile', array('as' => 'edit-profile', 'uses' => 'HomeController@editProfile'));

	// JobController
	Route::get('job/new', array('as' => 'new-job', 'uses' => 'JobController@newJob'));
	Route::get('all-jobs', array('as' => 'all-jobs', 'uses' => 'JobController@allJobs'));
	Route::get('job/view/{id}', array('as' => 'view-job', 'uses' => 'JobController@viewJob'));
	Route::get('job/edit/{id}', array('as' => 'edit-job', 'uses' => 'JobController@editJob'));
	Route::get('job/delete/{id}', array('as' => 'delete-job', 'uses' => 'JobController@deleteJob'));

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
Route::get('password-recovery', array('as' => 'password-recovery', 'uses' => 'UserController@passwordRecovery'));

// Routes for testing
Route::get('test', function(){
	echo App::environment();
	// print_r(Config::get('image.upload_path'));
});