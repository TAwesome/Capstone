<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('email', 200)->unique();
		    $table->string('password', 255);
		    $table->string('first_name', 255);
		    $table->string('last_name', 255);
		    $table->enum('gender', array('M', 'F'));
		    $table->date('date_of_birth');
		    $table->enum('native_language', array('English', 'Spanish', 'French'));
		    $table->rememberToken();
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
		Schema::drop('users');
	}

}
