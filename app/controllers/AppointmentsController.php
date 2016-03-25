<?php

use Acme\Transformers\AppointmentTransformer;
use Carbon\Carbon;

class AppointmentsController extends ApiController {


    protected $appointmentTransformer;

    /**
     * TagsController constructor.
     * @param AppointmentTransformer $appointmentTransformer
     * @internal param $tagTransformer
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
        return $this->getAppointments($user_id);

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
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {

        $appointment = new Appointment;

        $appointment->user_id = Input::get('user_id');
        $appointment->barber_id = Input::get('barber_id');
        $appointment->haircut_type = Input::get('haircut_type');
        $appointment->music_choice = Input::get('music_choice');

        if (Input::has('music_artist'))
        {
            $appointment->music_artist = Input::get('music_artist');
        }

        $appointment->drink_choice = Input::get('drink_choice');
        $appointment->date = Carbon::parse(Input::get('date'));
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
        $appointment = Appointment::findOrfail($id);
        $appointment->user_id = Input::get('user_id');
        $appointment->barber_id = Input::get('barber_id');
        $appointment->haircut_type = Input::get('haircut_type');
        $appointment->music_choice = Input::get('music_choice');

        if (Input::has('music_artist'))
        {
            $appointment->music_artist = Input::get('music_artist');
        }


        $appointment->drink_choice = Input::get('drink_choice');
        $appointment->date = Carbon::parse(Input::get('date'));
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

//    private function getUserAppointments()
//    {
//        return $this->getAppointments(Auth::user()->user_id);
//    }


    public function getTimes($timeSlot = 40)
    {
        $startTime = Carbon::create(null, null, null, 9);
        $endTime = Carbon::create(null, null, null, 9);


        $times = array();

        while($startTime->toTimeString() != "17:00:00")
        {

            $endTime->addMinutes($timeSlot);
            array_push($times, array("start_time" => $startTime->toTimeString() ,"end_time" => $endTime->toTimeString()));
            $startTime->addMinutes($timeSlot);

        }

        return $times;
    }


}
