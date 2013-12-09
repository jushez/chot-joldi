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
			'profile' => Profile::find(Auth::user()->id),
			'verification' => Verification::find(Auth::user()->id)
		);

		$this->layout->content = View::make('home.dashboard', $data);
	}

}