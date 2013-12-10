<?php

class VerificationsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run(){
		$verifications = array(
			array('user_id' => '1', 'hash' => md5('smronju@gmail.com' . 'chot-joldi' . time()), 'email' => 0, 'address' => 0, 'document' => '', 'created_at' => new DateTime(), 'updated_at' => new DateTime())
		);

		DB::table('verifications')->insert($verifications);
	}

}