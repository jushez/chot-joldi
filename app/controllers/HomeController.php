<?php

/*
|--------------------------------------------------------------------------
| HomeController
|--------------------------------------------------------------------------
| Author: Mohammad Shoriful Islam Ronju
| Email: smronju@gmail.com
| Description: Dashboard codes goes here.
|
*/

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

        $data = array(
            'jobs' => Job::where('status', '=', 1)->get(),
            'applied_jobs' =>  (Auth::check()) ? AppliedJobs::getAppliedJobsArray(Auth::user()->id) : ''
        );
        
    	$this->layout->content = View::make('home.index', $data);
    }

    public function getDashboard(){
    	$this->layout->pageTitle = 'Chot Joldi - Dashboard';
    	$this->layout->active = 'dashboard';
    	$this->layout->sidebar = 'new-job';

    	$data = array(
    		'profile' => User::find(Auth::user()->id)->getUserProfile,
    		'verification' => User::find(Auth::user()->id)->getUserVerification,
            'jobs' => Job::whereRaw('user_id = ' .Auth::user()->id)->orderBy('id', 'desc')->take(10)->get()
    	);

    	$this->layout->content = View::make('home.dashboard', $data)->nest('sidebar', 'common.sidebar', array('active' => 'dashboard'));
    }

    public function editProfile(){
    	$this->layout->pageTitle = 'Chot-Joldi - Edit Profile';
    	$this->layout->active = 'dashboard';
    	$this->layout->content = View::make('home.edit', array('profile' => User::find(Auth::user()->id)->getUserProfile));
    }

    public function saveProfile(){
    	$rules = array(
    		'first_name' => 'Required|Min:3|Max:50',
    		'last_name' => 'Required|Min:3|Max:50',
    		'password' => 'Between:6,50',
    		'profile_picture' => 'Mimes:jpeg,bmp,png,gif|Image|max:10240',
    		'gender' => 'Required',
    		'mobile' => 'Required|Numeric',
    		'confirm_password' => 'Same:password',
    		'present_address' => 'Required|Between:5,100',
    		'permanent_address' => 'Between:5,100',
    	);

    	$validator = Validator::make(Input::all(), $rules);

    	if($validator->fails()){
    		return Redirect::back()->withInput()->with('errors', $validator->messages());
    	}else{

    		$fileName = '';
    		if(Input::hasFile('profile_picture')){
    			$fileName = mt_rand() . '-' . Auth::user()->id . '.' . Input::file('profile_picture')->getClientOriginalExtension();

                // Revome old picture if exist
    			$userInfo = User::find(Auth::user()->id)->getUserProfile;

    			if(File::exists(public_path() . $userInfo->avatar_path)){
    				$fileInfo = pathinfo($userInfo->avatar_path);
    				
    				$paths = array(
    					public_path() . $userInfo->avatar_path, 
    					public_path() . '/uploads/avatars/64x64_crop/' . $fileInfo['basename'], 
    					public_path() . '/uploads/avatars/600x400/' . $fileInfo['basename']
    				);

    				foreach($paths as $path){
    					File::delete($path);
    				}
    			}

    			// Save new profile picture
                Image::upload(Input::file('profile_picture'), $fileName, 'avatars', true);
                Profile::where('user_id', '=', Auth::user()->id)->update(array('avatar_path' => '/uploads/avatars/'. $fileName));
    		}

    		$profileData = array(
    			'gender' => Input::get('gender'), 
    			'mobile' => Input::get('mobile'), 
    			'present_address' => Input::get('present_address'), 
    			'permanent_address' => Input::get('permanent_address'),
    			'updated_at' => new DateTime()
    		);

    		User::where('id', '=', Auth::user()->id)->update(array('first_name' => Input::get('first_name'), 'last_name' => Input::get('last_name')));
    		Profile::where('user_id', '=', Auth::user()->id)->update($profileData);

    		if(Input::has('password')){
    			User::where('id', Auth::user()->id)->update(array('password' => Hash::make(Input::get('password'))));

				// Leting user know that their password has been changed!
    			Mail::send('email.password', array('name' => Input::get('first_name'). ' ' .Input::get('last_name')), function($message){
    				$message->to(Auth::user()->email, Input::get('first_name'). ' ' .Input::get('last_name'))->subject('Your password has been changed!');
    			});
    		}

    		return Redirect::route('dashboard')->with('messages', 'Profile updated successfully!');
    	}
    }

    public function sendVerificationEmail(){
    	$profile = User::find(Auth::user()->id)->getUserProfile;
    	$verification = User::find(Auth::user()->id)->getUserVerification;

    	$data = array('name' => $profile->first_name . ' ' . $profile->last_name, 'hash' => $verification->hash);

    	Mail::send('email.verify', $data, function($message) Use ($data){
    		$message->to(Auth::user()->email, $data['name'])->subject('Verify your chot-joldi email!');
    	});

    	if(Request::ajax()){
    		return '1';	
    	}

    	return Redirect::back()->with('messages', 'Verification email sent!');

    }

    public function verifyEmail($hash){
    	$affectedRows = Verification::where('hash', $hash)->update(array('hash' => '1', 'email' => 1));

    	if($affectedRows > 0){
    		return Redirect::route('dashboard');
    	}else{
    		$this->layout->pageTitle = 'Chot Joldi - Dashboard';
    		$this->layout->active = 'home';
    		$this->layout->content = View::make('errors.other');
    	}
    }

}