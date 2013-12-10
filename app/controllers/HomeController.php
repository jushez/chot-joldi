<?php

class HomeController extends BaseController {

	/*
	|-----------------------------------------------------------
    | The master layout that should be used for responses.
    |-----------------------------------------------------------
    */

	protected $layout = 'layouts.master';

	public function getHome(){
		$this->layout->pageTitle = 'Chot Joldi - Bike Messenger';
		$this->layout->active = 'home';
		$this->layout->content = View::make('home.index');
	}

	public function getDashboard(){
		$this->layout->pageTitle = 'Chot Joldi - Dashboard';
		$this->layout->active = 'dashboard';

		$data = array(
			'profile' => User::find(Auth::user()->id)->getUserProfile,
			'verification' => User::find(Auth::user()->id)->getUserVerification
		);

		$this->layout->content = View::make('home.dashboard', $data);
	}

	public function verifyEmail(){
	    // dd(Auth::user()->email); exit;
	    $profile = User::find(Auth::user()->id)->getUserProfile;

	    Mail::send('email.verify', array('name' => $profile->first_name . ' ' . $profile->last_name), function($message){
			$message->to(Auth::user()->email, 'Mohammad Shoriful Islam Ronju')->subject('Verify your chot-joldi email!');
		});

	    return true;
	}

}