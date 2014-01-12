<?php

class JobsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run(){
		$jobs = array(
			array('title' => 'Sample job one', 'description' => 'Sample job description.', 'pickup_address' => 'Mirpur 11, Dhaka.', 'pickup_time' => '2014-01-13 04:00:00', 'drop_address' => 'Bashundhara, Dhaka.', 'drop_time' => '2014-01-14 23:00:00', 'distance' => 10, 'job_value' => 300.00, 'status' => 1, 'created_at' => new DateTime(), 'updated_at' => new DateTime()),
			array('title' => 'Sample job two', 'description' => 'Sample job description.', 'pickup_address' => 'Bashundhara, Dhaka.', 'pickup_time' => '2014-01-13 02:00:00', 'drop_address' => 'Mirpur 11, Dhaka.', 'drop_time' => '2014-01-14 18:00:00', 'distance' => 15, 'job_value' => 350.00, 'status' => 1, 'created_at' => new DateTime(), 'updated_at' => new DateTime())
		);

		DB::table('jobs')->insert($jobs);
	}

}