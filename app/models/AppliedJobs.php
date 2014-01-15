<?php

class AppliedJobs extends Eloquent{
	protected $fillable = array('user_id', 'job_id', 'rating', 'rated_by', 'status');
	
	public static function getAppliedJobsArray($userId){
		$records = DB::table('applied_jobs')->where('user_id', '=', $userId)->select('job_id')->get();

		$result = array();

		foreach ($records as $record) {
			$result[] .= $record->job_id;
		}

		return $result;
	}

}