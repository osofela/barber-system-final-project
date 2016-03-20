<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});


// route to show the login form
Route::get('auth/login', array('uses' => 'AuthController@showLogin'));

// route to process the form
Route::post('auth/login', array('before' => 'csrf','uses' => 'AuthController@doLogin'));

Route::get('auth/logout', array('uses' => 'AuthController@doLogout'));

Route::get('auth/register', array('uses' => 'AuthController@showRegister'));

Route::post('auth/register', array('before' => 'csrf','uses' => 'AuthController@doRegister'));

Route::get('auth/thanks', array('uses' => 'AuthController@showThanks'));


Route::group(['prefix' => 'api/v1', 'before'=>'auth'],function()
{

	Route::get('admin',array('before' => 'admin', function ()
	{
		return View::make('admin/index');
	}));

	Route::get('barber',array('before' => 'barber', function ()
	{
		return View::make('barber/barber');
	}));

	Route::get('intern',array('before' => 'intern', function ()
	{
		return View::make('intern/intern');
	}));

	Route::get('client',array('before' => 'client', function ()
	{
		return View::make('client/client');
	}));

	Route::post('users/{id}', 'UsersController@update');

	Route::resource('users','UsersController');



	Route::resource('appointments', 'AppointmentsController');

	Route::get('times/{timeslot?}','AppointmentsController@getTimes');

	Route::get('users/{id}/appointments','AppointmentsController@index');

});

///**
// * Admin Routes
// */
//
//
//Route::get('auth/login');
//Route::get('auth/logout');
//Route::get('admin/dashboard');
//
///**
// * Admin Barbers
// */
//
//Route::get('admin/barbers/create');
//Route::get('admin/barbers');
//Route::post('admin/barbers');
//Route::get('admin/barbers/{barber}');
//Route::get('admin/barbers/{barber}/edit');
//Route::put('admin/barbers/{barber}');
//Route::delete('admin/barbers/{barber}');
//
///**
// * Admin Appointments
// */
//
//Route::get('admin/appointments/create');
//Route::get('admin/appointments');
//Route::post('admin/appointments');
//Route::get('admin/appointments/{appointment}');
//Route::get('admin/appointments/{appointment}/edit');
//Route::put('admin/appointments/{appointment}');
//Route::delete('admin/appointments/{appointment}');
//
//
///**
// * Barber Routes
// */
//
//Route::get('auth/login');
//Route::get('auth/logout');
//Route::get('barber/dashboard');
//Route::get('barber/appointments/create');
//Route::get('barber/appointments');
//Route::post('barber/appointments');
//Route::get('barber/appointments/{appointment}');
//Route::get('barber/appointments/{appointment}/edit');
//Route::put('barber/appointments/{appointment}');
//Route::delete('barber/appointments/{appointment}');
//
///**
// * Intern Routes
// */
//
//Route::get('auth/login');
//Route::get('auth/logout');
//Route::get('intern/dashboard');
//Route::get('intern/appointments');
//
//
///**
// * User (Client) Routes
// */
//
//Route::get('auth/login');
//Route::get('auth/register');
//Route::get('auth/logout');
//Route::get('user/dashboard');
//Route::get('user/appointments/create');
//Route::get('user/appointments');
//Route::post('user/appointments');