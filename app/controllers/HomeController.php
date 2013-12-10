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

	public function sendVerificationEmail(){
	    $profile = User::find(Auth::user()->id)->getUserProfile;
	    $verification = User::find(Auth::user()->id)->getUserVerification;

	    $data = array('name' => $profile->first_name . ' ' . $profile->last_name, 'hash' => $verification->hash);

	    Mail::send('email.verify', $data, function($message){
			$message->to(Auth::user()->email, 'Mohammad Shoriful Islam Ronju')->subject('Verify your chot-joldi email!');
		});

	    return '1';
	}

	public function verifyEmail($hash){
		$affectedRows = Verification::where('hash', $hash)->update(array('hash' => 'Hash used!', 'email' => 1));
		
		if($affectedRows > 0){
			return Redirect::route('dashboard');
		}else{
			$this->layout->pageTitle = 'Chot Joldi - Dashboard';
			$this->layout->active = 'home';
			$this->layout->content = View::make('errors.other');
		}

	}

}