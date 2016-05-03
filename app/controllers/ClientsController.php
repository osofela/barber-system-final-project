<?php

use Carbon\Carbon;

class ClientsController extends ApiController {


	public function __construct()
	{
		$this->beforeFilter('auth', ['on' => 'post']);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$client = User::find(Auth::user()->user_id);

		$appointments =  $client->appointments;

		foreach($appointments as $appointment)
		{
			$appointment->barber;
			$appointment->client;
		}

		return $appointments;
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if( ! Input::get('music_artist'))
		{
			$music_artist = "None";
		}
		else
			$music_artist = Input::get('music_artist');


		$appointment = new Appointment;

		$appointment->user_id = Auth::user()->user_id;
		$appointment->barber_id = Input::get('barber_id');
		$appointment->haircut_type = Input::get('haircut_type');
		$appointment->music_choice = Input::get('music_choice');
		$appointment->music_artist = $music_artist;
		$appointment->drink_choice = Input::get('drink_choice');
		$appointment->appointment_date = Carbon::parse(Input::get('date'));

        $times = json_decode(Input::get('time'),true);

        $appointment->start_time = $times['start_time'];

        $appointment->end_time = $times['end_time'];

		$appointment->save();
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Appointment::find($id);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if( ! Input::get('music_artist'))
		{
			$music_artist = "None";
		}
		else
			$music_artist = Input::get('music_artist');


		$appointment = Appointment::findOrfail($id);

		//Client that is logged in.
		$appointment->user_id = Auth::user()->user_id;

		$appointment->barber_id = Input::get('barber_id');
		$appointment->haircut_type = Input::get('haircut_type');
		$appointment->music_choice = Input::get('music_choice');
		$appointment->music_artist = $music_artist;
		$appointment->drink_choice = Input::get('drink_choice');
		$appointment->appointment_date = Carbon::parse(Input::get('date'));

//		$times = json_decode(Input::get('time'),true);
//
//		$appointment->start_time = $times['start_time'];
//
//		$appointment->end_time = $times['end_time'];

		$appointment->save();
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$appointment = Appointment::findOrFail($id);

		$appointment->delete();
	}


}
