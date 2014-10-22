<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFollowingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('followings', function(Blueprint $table)
		{
			$table->integer('follower_id')->unsigned()->index();
			$table->foreign('follower_id')->references('id')->on('users')->onDelete('cascade');
			$table->integer('followed_id')->unsigned()->index();
			$table->foreign('followed_id')->references('id')->on('users')->onDelete('cascade');
			$table->primary(['follower_id', 'followed_id']);
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
		Schema::drop('followings');
	}

}
