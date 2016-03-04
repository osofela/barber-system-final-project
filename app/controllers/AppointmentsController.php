<?php

use Acme\Transformers\AppointmentTransformer;

class AppointmentsController extends ApiController {


    protected $appointmentTransformer;

    /**
     * TagsController constructor.
     * @param $tagTransformer
     */

    public function __construct(AppointmentTransformer $appointmentTransformer)
    {
        $this->appointmentTransformer = $appointmentTransformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($appointmentId = null)
    {
        $appointments = $this->getAppointments($appointmentId);

        return $this->respond([

            'data' => $this->appointmentTransformer->transformCollection($appointments->all())
        ]);
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
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
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
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param $lessonId
     * @return mixed
     */
    private function getAppointments($userId)
    {
        return $userId ? User::findOrFail($userId)->appointments : Appointment::all();
    }


}
