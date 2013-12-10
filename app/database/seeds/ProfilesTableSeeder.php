<?php

class ProfilesTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run(){
		$profiles = array(
			array('user_id' => '1', 'first_name' => 'Mohammad Shoriful Islam', 'last_name' => 'Ronju', 'gender' => 'Male', 'mobile' => '01914433307', 'present_address' => '', 'permanent_address' => '', 'created_at' => new DateTime(), 'updated_at' => new DateTime())
		);

		DB::table('profiles')->insert($profiles);
	}

}