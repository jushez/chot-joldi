<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAppliedJobs extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('applied_jobs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('job_id');
			$table->string('rating', 5)->default(0);
			$table->enum('rated_by', array('Job Seeker', 'Job Poster'));
			$table->enum('status', array('Pending', 'Processing', 'Completed'));
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('applied_jobs');
	}

}
