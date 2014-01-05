<?php

class Job extends Eloquent{
	protected $fillable = array('user_id', 'title', 'description', 'pickup_address', 'pickup_time', 'drop_address', 'drop_time', 'distance', 'job_value', 'status');

}