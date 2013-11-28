<?php

class UsersTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run(){
		$users = array(
			array('firstname' => 'Mohammad Shoriful Islam', 'lastname' => 'Ronju', 'email' => 'smronju@gmail.com', 'mobile' => '01914433307', 'password' => Hash::make('c0mm0n'), 'created_at' => new DateTime(), 'updated_at' => new DateTime())
		);

		DB::table('users')->insert($users);
	}

}