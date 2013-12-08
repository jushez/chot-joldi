<?php

class Profile extends Eloquent {
	protected $fillable = array('user_id', 'first_name', 'last_name', 'mobile', 'present_address', 'permanent_address', 'avatar', 'avatar_path');

	
}