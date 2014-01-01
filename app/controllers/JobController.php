<?php

/*
|--------------------------------------------------------------------------
| JobController
|--------------------------------------------------------------------------
| Author: Mohammad Shoriful Islam Ronju
| Email: smronju@gmail.com
| Description: Job related codes goes here.
|
*/

class JobController extends BaseController{

	/*
	|-----------------------------------------------------------
    | The master layout that should be used for responses.
    |-----------------------------------------------------------
    */

    protected $layout = 'layouts.master';

    public function newJob(){
    	$this->layout->pageTitle = 'Chot Joldi - New Job';
    	$this->layout->active = 'dashboard';
    	// $this->layout->sidebar = 'new-job';
    	$this->layout->content = View::make('job.new')->nest('sidebar', 'common.sidebar', array('active' => 'new-job'));
    }

    public function saveJob(){
    	dd(Input::all());
    	exit;
    }


}