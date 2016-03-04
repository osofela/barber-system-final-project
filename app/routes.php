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

Route::group(['prefix' => 'api/v1'],function()
{

	Route::resource('users','UsersController');

	Route::resource('appointments', 'AppointmentsController',['only' => ['index', 'show']]);

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