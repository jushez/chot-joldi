<?php

class UserController extends BaseController {

	protected $layout = 'layouts.master';

	public function getLogin(){
		$this->layout->pageTitle = 'Chot Joldi - Login';
		$this->layout->active = 'login';
		$this->layout->content = View::make('user.login');
	}

	public function postLogin(){
		$rules = array(
			'email'=>'Required|Email|Between:3,64', 
			'password'=>'Required'
		);

	    $validator = Validator::make(Input::all(), $rules);

	    if ($validator->fails()){
	        return Redirect::back()->withInput()->withErrors($validator);

	    }else{
	    	$user = array(
	    		'email' => Input::get('email'),
	    		'password' => Input::get('password')
	    	);

	    	(Input::get('remember-me') == 1) ? $remember = true : $remember =false;

	    	if(Auth::attempt($user, $remember)){
	    		return Redirect::route('dashboard');
	    	}else{
	    		return Redirect::back()->withInput()->with('login_errors', true);
	    	}
	    }
	}

	public function getDashboard(){
		$this->layout->pageTitle = 'Chot Joldi - Dashboard';
		$this->layout->active = 'dashboard';
		$this->layout->content = View::make('user.dashboard');
	}

	public function logout(){
		Auth::logout();
		return Redirect::route('login');
	}
}