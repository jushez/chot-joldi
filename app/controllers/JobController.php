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
    	$this->layout->content = View::make('job.new')->nest('sidebar', 'common.sidebar', array('active' => 'new-job'));
    }

    public function saveJob(){
        $rules = array(
            'title' => 'Required|Min:5|Max:50',
            'description' => 'Required|Min:5|Max:500',
            'pickup_address' => 'Required|Min:5|Max:100',
            'pickup_time' => 'Required|Date_format:Y-m-d h:i:s A|Min:5|Max:30',
            'drop_address' => 'Required|Min:5|Max:100',
            'drop_time' => 'Required|Date_format:Y-m-d h:i:s A|Min:5|Max:30',
            'distance' => 'Required|Integer|Min:1|Max:10',
            'job_value' => 'Required|Integer|Min:100|Max:1000'
        );

        $validator = Validator::make(Input::all(), $rules);

        if($validator->fails()){
            return Redirect::back()->withInput()->with('errors', $validator->messages());
        }else{
            $jobData = array(
                'user_id' => Auth::user()->id,
                'title' => Input::get('title'),
                'description' => Input::get('description'),
                'pickup_address' => Input::get('pickup_address'),
                'pickup_time' => Input::get('pickup_time'),
                'drop_address' => Input::get('drop_address'),
                'drop_time' => Input::get('drop_time'),
                'distance' => Input::get('distance'),
                'job_value' => Input::get('job_value'),
                'status' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            );

            if(Job::create($jobData)){
                return Redirect::route('dashboard')->with('messages', 'New job created successfully!');
            }else{
                App::error(function(InvalidUserException $exception){
                    Log::error($exception);
                    return 'Sorry! Something is wrong with this account!';
                });
            }
        }
    }

    public function allJobs(){
        // TODO: Implement pagination
        dd(DB::table('jobs')->skip(0)->take(10)->get());

    }


}