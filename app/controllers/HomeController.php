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
			'profile_picture' => 'Mimes:jpeg,bmp,png,gif|Image|max:200',
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
                
                // TODO: Remove old profile picture if uploaded

                // If there's avatars directory in uploads then save profile picture.
                if(File::isDirectory(public_path().'/uploads/avatars')){
                	Input::file('profile_picture')->move('uploads/avatars', $fileName);
                }else{
                	if(File::isWritable(public_path().'/uploads/')){
                		File::makeDirectory(public_path().'/uploads/avatars',  $mode = 0777, $recursive = false);
                		Input::file('profile_picture')->move('uploads/avatars/', $fileName);	
					}else{
		                return Redirect::back()->withInput()->with('messages', 'Please change permission to uploads directory!');
					}
                }
            }
			
			$profileData = array(
				'first_name' => Input::get('first_name'), 
				'last_name' => Input::get('last_name'), 
				'gender' => Input::get('gender'), 
				'mobile' => Input::get('mobile'), 
				'present_address' => Input::get('present_address'), 
				'permanent_address' => Input::get('permanent_address'), 
				'avatar_path' => ($fileName) ? 'uploads/avatars/'. $fileName : '', 
				'updated_at' => new DateTime()
			);

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