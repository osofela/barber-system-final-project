<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('appointments',function (Blueprint $table){
			$table->increments('appointment_id');
			$table->integer('user_id')->unsigned();
			$table->integer('barber_id')->unsigned();

			$table->foreign('barber_id')->references('user_id')
				->on('users')->onDelete('cascade');
			$table->foreign('user_id')->references('user_id')
				->on('users')->onDelete('cascade');

			$table->string('haircut_type');
			$table->string('music_choice');
			$table->string('music_artist');
			$table->string('drink_choice');
			$table->date('appointment_date');
			$table->time('start_time');
			$table->time('end_time');
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
		Schema::drop('appointments');
	}

}
