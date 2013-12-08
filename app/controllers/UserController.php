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
	    		return Redirect::back()->withInput()->with('login_errors', true);
	    	}
	    }
	}

	public function getDashboard(){
		$this->layout->pageTitle = 'Chot Joldi - Dashboard';
		$this->layout->active = 'dashboard';
		$this->layout->content = View::make('user.dashboard');
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
			'email' => 'Required|Unique:users|Email|Between:3,64', 
			'password' => 'Required',
			'confirm_password' => 'Required|Same:password'
		);

	    $validator = Validator::make(Input::all(), $rules);

	    if ($validator->fails()){
	        return Redirect::back()->withInput()->withErrors($validator);
	    }else{
	    	$user = array(
	    		'email' => Input::get('email'),
	    		'password' => Hash::make(Input::get('password')),
	    		'type' => Input::get('type')
	    	);

	    	if($user = User::create($user)){
	    		$profileData = array(
	    			'user_id' => $user->id,
	    			'first_name' => Input::get('first_name'),
	    			'last_name' => Input::get('last_name'),
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

	    		Profile::create($profileData);
	    		Verification::create($verificationData);

	    		Session::flash('messages', 'Registration completed! You may login now.');
	    		return Redirect::route('login');
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
}