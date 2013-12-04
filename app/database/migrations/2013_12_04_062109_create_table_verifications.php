<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableVerifications extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('verifications', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->boolean('email')->default(0);
			$table->boolean('address')->default(0);
			$table->enum('document', array('National ID', 'Driving License', 'Passport'))->nullable();
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
		Schema::drop('verifications');
	}

}
