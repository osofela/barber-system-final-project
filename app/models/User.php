<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * @var $primaryKey overiding primary key to be user_id.
	 */

	protected $primaryKey = 'user_id';

	protected $fillable = [
		'first_name',
		'last_name',
		'address',
		'role',
		'telephone',
		'email',
		'password',
	];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	protected $hidden = array('password', 'remember_token');


	/**
	 * Users Appointments
	 */

	public function appointments()
	{
		return $this->hasMany('Appointment','appointment_id');
	}

}
