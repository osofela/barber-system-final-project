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
            $appointment->barber;
            $appointment->client;
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
        $appointment->appointment_date = Carbon::parse(Input::get('date'));

        $times = json_decode(Input::get('time'),true);

        $appointment->start_time = $times['start_time'];

        $appointment->end_time = $times['end_time'];

        $appointment->save();

        $mp = Mixpanel::getInstance("687a1651f84c817428a1d5b57480f371");

        // identify the current request as appointment.
        $mp->identify($appointment->appointment_id);

        $barber = $appointment->barber;
        $mp->people->set($barber->user_id, array(
            '$first_name'       =>  $barber->first_name,
            '$last_name'        =>  $barber->last_name,
            '$email'            =>  $barber->email,
            '$telephone'        => $barber->telephone,
            '$role'             => $barber->role
        ));

        $client= $appointment->client;
        $mp->people->set($client->user_id, array(
            '$first_name'       =>  $client->first_name,
            '$last_name'        =>  $client->last_name,
            '$email'            =>  $client->email,
            '$telephone'        => $client->telephone,
            '$role'             => $client->role
        ));



        // track an event associated to user.
        $mp->track("Appointment Added", array("Barber" => $appointment->barber->first_name . " " . $appointment->barber->last_name,
            "Client" => $appointment->client->first_name . " " . $appointment->client->last_name,
            "Created By ID" => Auth::user()->user_id,
            "Created By" => Auth::user()->first_name . " " . Auth::user()->last_name));

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function show($id)
    {
        return Appointment::findOrFail($id);

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
        $appointment->appointment_date = Carbon::parse(Input::get('date'));

//        $times = json_decode(Input::get('time'),true);
//
//        $appointment->start_time = $times['start_time'];
//
//        $appointment->end_time = $times['end_time'];

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

        $mp = Mixpanel::getInstance("687a1651f84c817428a1d5b57480f371");

        // identify the current request as user.
        $mp->identify($appointment->appointment_id);

        // track an event associated to appointment.
        $mp->track("Appointment Deleted", array("Barber" => $appointment->barber->first_name . " " . $appointment->barber->last_name,
            "Client" => $appointment->client->first_name . " " . $appointment->client->last_name,
            "Deleted By ID" => Auth::user()->user_id,
            "Deleted By" => Auth::user()->first_name . " " . Auth::user()->last_name));
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


    public function getTimes($timeSlot, $date)
    {

        $startTime = Carbon::create(null, null, null, 9);
        $endTime = Carbon::create(null, null, null, 9);
        $last = Carbon::create(null, null, null, 17);

        $date = Carbon::parse($date);

        $times = array();

        while($startTime->toTimeString() && $endTime->toTimeString() <= $last->toTimeString())
        {

            $endTime->addMinutes($timeSlot);

            $time = DB::select( DB::raw("SELECT * FROM appointments WHERE start_time = :startTime && appointment_date = :appointment_date"),array(
                'startTime' => $startTime->toTimeString(),
                'appointment_date' => $date->toDateString()
            ));


            if(!$time)
            {

                $between = DB::table('appointments')
                            ->where('appointment_date', $date->toDateString())
                            ->where('start_time','>=', $startTime->toTimeString())
                            ->where('end_time','<=', $endTime->toTimeString())
                            ->get();

                if(!$between)
                {
                    if($startTime->toTimeString() && $endTime->toTimeString() <= $last->toTimeString())
                    {
                        array_push($times, array("start_time" => $startTime->toTimeString(), "end_time" => $endTime->toTimeString()));
                        $startTime->addMinutes($timeSlot);
                    }
                }
                else
                {
                    $startTime = Carbon::parse($between[0]->end_time);
                    $endTime = Carbon::parse($between[0]->end_time);
                }
            }
            else
            {
                $startTime = Carbon::parse($time[0]->end_time);
                $endTime = Carbon::parse($time[0]->end_time);
            }
        }

        return $times;
    }


}
