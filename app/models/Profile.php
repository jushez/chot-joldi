<?php

class Profile extends Eloquent {
	protected $fillable = array('user_id', 'mobile', 'present_address', 'permanent_address', 'avatar', 'avatar_path');

	
}