<?php

/*
|--------------------------------------------------------------------------
| JobController
|--------------------------------------------------------------------------
| Author: Mohammad Shoriful Islam Ronju
| Email: smronju@gmail.com
| Description: User related codes goes here.
|
*/

class UserController extends BaseController {

	/*
	|-----------------------------------------------------------
    | The master layout that should be used for responses.
    |-----------------------------------------------------------
    */
    
	protected $layout = 'layouts.master';

	public function getLogin(){
		$this->layout->pageTitle = 'Chot Joldi - Login';
		$this->layout->active = 'login';
		$this->layout->content = View::make('user.login');
	}

	public function postLogin(){
		$rules = array(
			'email' => 'Required|Email|Between:3,64', 
			'password' => 'Required'
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
	    		$userInfo = Profile::find(Auth::user()->id);
	    		Session::put('userInfo', array('first_name' => $userInfo->first_name, 'last_name' => $userInfo->last_name, 'mobile' => $userInfo->mobile, 'present_address' => $userInfo->present_address, 'permanent_address' => $userInfo->permanent_address, 'avatar_path' => $userInfo->avatar_path));
	    		return Redirect::intended('dashboard');
	    	}else{
	    		return Redirect::back()->withInput()->with('messages', 'Username or password incorrect!');
	    	}
	    }
	}

	public function getRegister(){
		$this->layout->pageTitle = 'Chot Joldi - Registration';
		$this->layout->active = 'login';
		$this->layout->content = View::make('user.register');
	}

	public function saveUser(){
		$rules = array(
			'first_name' => 'Required',
			'last_name' => 'Required',
			'email' => 'Required|Unique:users|Email|Between:3,50', 
			'password' => 'Required|Between:6,50',
			'confirm_password' => 'Required|Same:password'
		);

	    $validator = Validator::make(Input::all(), $rules);

	    if ($validator->fails()){
	        return Redirect::back()->withInput()->withErrors($validator);
	    }else{
	    	$userData = array(
	    		'first_name' => Input::get('first_name'),
	    		'last_name' => Input::get('last_name'),
	    		'email' => Input::get('email'),
	    		'password' => Hash::make(Input::get('password')),
	    		'type' => Input::get('type')
	    	);

	    	if($user = User::create($userData)){
	    		$profileData = array(
	    			'user_id' => $user->id,
	    			'gender' => Input::get('gender'),
	    			'mobile' => '',
	    			'present_address' => '',
	    			'permanent_address' => '',
	    			'avatar_path' => '',
	    			'create_at' => new DateTime(),
	    			'updated_at' => new DateTime()
	    		);

	    		$verificationData = array(
	    			'user_id' => $user->id,
	    			'hash' => md5(Input::get('email') . 'chot-joldi' . time()),
	    			'email' => 0,
	    			'address' => 0,
	    			'document' => '',
	    			'created_at' => new DateTime(),
	    			'updated_at' => new DateTime()
	    		);

	    		// Creating user profile & verifications
	    		Profile::create($profileData);
	    		Verification::create($verificationData);

	    		Mail::send('email.welcome', array('name' => Input::get('first_name') . ' ' . Input::get('last_name')), function($message){
	    			$message->to(Input::get('email'), Input::get('first_name') . ' ' . Input::get('last_name'))->subject('Welcome to chot-joldi!');
	    		});

	    		return Redirect::route('login')->with('messages', 'Registration completed! You may login now.');
	    	}
	    }
	}

	public function isEmailExist(){
		$email = Input::get('fieldValue');
		$fieldId = Input::get('fieldId');

		$arrayToJs = array();
		$arrayToJs[0] = $fieldId;

		if(User::isEmailExists($email)){
			$arrayToJs[1] = false;
			return Response::json($arrayToJs);
		}else{
			$arrayToJs[1] = true;
			return Response::json($arrayToJs);
		}
	}

	public function logout(){
		Session::forget('userInfo');
		Session::flush();
		Auth::logout();
		return Redirect::route('login');
	}

	public function passwordRecovery(){
		$this->layout->pageTitle = 'Chot Joldi - Password Recovery';
		$this->layout->active = 'login';
		$this->layout->content = View::make('user.password-recovery');
	}

	public function sendPasswordRecoveryEmail(){
		echo '<pre>';
		dd(Input::all());
		exit;
	}
}