<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jobs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->bigInteger('user_id');
			$table->string('title', 50);
			$table->text('description');
            $table->text('pickup_address');
            $table->timestamp('pickup_time');
            $table->text('drop_address');
            $table->timestamp('drop_time');
            $table->integer('distance')->nullable();
            $table->float('job_value');
            $table->integer('status');
            $table->softDeletes();
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
		Schema::drop('jobs');
	}

}
