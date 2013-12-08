<?php

class Verification extends Eloquent{
	protected $fillable = array('user_id', 'hash', 'email', 'address', 'document');

	
}