<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users',function (Blueprint $table){
			$table->increments('user_id');
			$table->string('first_name');
			$table->string('last_name');
			$table->text('address');
			$table->string('role')->default('Client');
			$table->string('telephone');
			$table->string('email')->unique();
			$table->string('password',60);
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
