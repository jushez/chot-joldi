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
            'distance' => 'Required|Integer|Min:1|Max:100',
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
        $this->layout->pageTitle = 'Chot Joldi - All Jobs';
        $this->layout->active = 'dashboard';
        $jobs = Job::where('user_id', '=', Auth::user()->id)->paginate(15);
        $this->layout->content = View::make('job.all', array('jobs' => $jobs))->nest('sidebar', 'common.sidebar', array('active' => 'my-jobs'));
    }

    public function viewJob($id){
        $job = Job::find($id);
        $this->layout->pageTitle = 'Chot Joldi - '. $job->title;
        $this->layout->active = 'dashboard';
        $this->layout->content = View::make('job.single', array('job' => $job))->nest('sidebar', 'common.sidebar', array('active' => 'my-jobs'));
    }

    public function editJob($id){
        $job = Job::find($id);
        $this->layout->pageTitle = 'Chot Joldi - '. $job->title;
        $this->layout->active = 'dashboard';
        $this->layout->content = View::make('job.edit', array('job' => $job))->nest('sidebar', 'common.sidebar', array('active' => 'my-jobs'));
    }

    public function updateJob(){
        $rules = array(
            'title' => 'Required|Min:5|Max:50',
            'description' => 'Required|Min:5|Max:500',
            'pickup_address' => 'Required|Min:5|Max:100',
            'pickup_time' => 'Required|Date_format:Y-m-d h:i:s A|Min:5|Max:30',
            'drop_address' => 'Required|Min:5|Max:100',
            'drop_time' => 'Required|Date_format:Y-m-d h:i:s A|Min:5|Max:30',
            'distance' => 'Required|Integer|Min:1|Max:100',
            'job_value' => 'Required|Integer|Min:100|Max:1000'
        );

        $validator = Validator::make(Input::all(), $rules);

        if($validator->fails()){
            return Redirect::back()->withInput()->with('errors', $validator->messages());
        }else{
            $jobData = array(
                'title' => Input::get('title'),
                'description' => Input::get('description'),
                'pickup_address' => Input::get('pickup_address'),
                'pickup_time' => Input::get('pickup_time'),
                'drop_address' => Input::get('drop_address'),
                'drop_time' => Input::get('drop_time'),
                'distance' => Input::get('distance'),
                'job_value' => Input::get('job_value'),
                'updated_at' => new DateTime()
            );

            $affectedRows = Job::where('id', '=', Input::get('job_id'))->update($jobData);

            if($affectedRows > 0){
                return Redirect::route('dashboard')->with('messages', 'Job updated successfully!');
            }else{
                App::error(function(InvalidUserException $exception){
                    Log::error($exception);
                    return 'Sorry! Something went wrong saving this job!';
                });
            }
        }
    }

    public function deleteJob($id){
        $affectedRows = Job::where('id', '=', $id)->delete();

        if($affectedRows > 0){
            return Redirect::back()->with('messages', 'Job deleted successfully! ' .HTML::linkRoute('restore-job', 'Undo', array('id' => $id)). ' delete!');
        }else{
            App::error(function(InvalidUserException $exception){
                Log::error($exception);
                return 'Sorry! Something went wrong deleting this job!';
            });
        }
    }

    
    public function restoreJob($id){
        if(Job::onlyTrashed()->where('id', $id)->restore()){
            return Redirect::back()->with('messages', 'Job restored successfully!');
        }else{
            App::error(function(InvalidUserException $exception){
                Log::error($exception);
                return 'Sorry! Something went wrong retoring this job!';
            });
        }
    }




}