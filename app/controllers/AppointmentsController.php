<?php

use Acme\Transformers\AppointmentTransformer;
use Carbon\Carbon;

class AppointmentsController extends ApiController {


    protected $appointmentTransformer;

    /**
     *
     * @param AppointmentTransformer $appointmentTransformer
     *
     */

    public function __construct(AppointmentTransformer $appointmentTransformer)
    {
        $this->appointmentTransformer = $appointmentTransformer;

        $this->beforeFilter('auth', ['on' => 'post']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($user_id = null)
    {
       $appointments =  $this->getAppointments($user_id);

        foreach($appointments as $appointment)
        {
            $appointment->barber = $appointment->barber;
            $appointment->client= $appointment->client;
        }

        return $appointments;

//        return $this->respond([
//
//            'data' => $this->appointmentTransformer->transformCollection($appointments->all())
//        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make(strtolower(Auth::user()->role) . '.appointments');
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
        $appointment->user_id = Input::get('user_id');
        $appointment->barber_id = Input::get('barber_id');
        $appointment->haircut_type = Input::get('haircut_type');
        $appointment->music_choice = Input::get('music_choice');
        $appointment->music_artist = $music_artist;
        $appointment->drink_choice = Input::get('drink_choice');
        $appointment->appointment_date = Carbon::parse(Input::get('appointment_date'));

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

//        if (! $appointment)
//        {
//            return $this->respondNotFound('Appointment does not exist.');
//        }
//
//        return $this->respond([
//
//            'data' => $this->appointmentTransformer->transform($appointment)
//        ]);
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

        $appointment->user_id = Input::get('user_id');
        $appointment->barber_id = Input::get('barber_id');
        $appointment->haircut_type = Input::get('haircut_type');
        $appointment->music_choice = Input::get('music_choice');
        $appointment->music_artist = $music_artist;
        $appointment->drink_choice = Input::get('drink_choice');
        $appointment->appointment_date = Carbon::parse(Input::get('appointment_date'));
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

    /**
     * @param $lessonId
     * @return mixed
     */
    private function getAppointments($userId)
    {
        return $userId ? User::find($userId)->appointments : Appointment::all();
    }

    /**
     * @return Clients Appointments
     */

    private function getClientAppointments()
    {
        return $this->getAppointments(Auth::user()->user_id);
    }


    public function getTimes($timeSlot = 40)
    {
        $startTime = Carbon::create(null, null, null, 9);
        $endTime = Carbon::create(null, null, null, 9);
        $appointment_date = Carbon::parse(Input::get('appointment_date'));


        $times = array();

        while($startTime->toTimeString() != "17:00:00")
        {

            $endTime->addMinutes($timeSlot);

            $time = DB::select( DB::raw("SELECT * FROM appointments WHERE appointment_date = :appointment_date && start_time = :startTime"), array(
                'startTime' => $startTime->toTimeString(),
                'appointment_date' => $appointment_date->toDateString()
            ));

            if(!$time)
            {
                array_push($times, array("start_time" => $startTime->toTimeString(), "end_time" => $endTime->toTimeString()));
            }
            $startTime->addMinutes($timeSlot);

        }

        return $times;
    }


}
