<?php

/**
 * Created by PhpStorm.
 * User: garyobrien
 * Date: 04/03/2016
 * Time: 19:49
 */

use Acme\Transformers\UserTransformer;


class UsersController extends ApiController
{

    protected $userTransformer;

    function __construct(UserTransformer $userTransformer)
    {
        $this->userTransformer = $userTransformer;

        $this->beforeFilter('auth', ['on' => 'post']);
    }

    public function index($id = null)
    {

//        $limit =Input::get('limit') ?: 6;
//
//        $users= User::paginate($limit);
//
//        return $this->respondWithPagination($users, [
//
//            'data' => $this->userTransformer->transformCollection($users->all()),
//        ]);

        if ($id == null)
        {
            return User::where('role' ,'!=', 'Client')->get();
        }

        else
        {
            return $this->show($id);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make(strtolower(Auth::user()->role) . '.users');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
//        if( ! Input::get('first_name') or ! Input::get('last_name'))
//        {
//            // return some kind of response
//            // 422
//            // provide a message
//
//            return $this->setStatusCode(422)
//                ->respondWithError('Parameters failed validation for a user.');
//        }
//
//        User::create(Input::all());
//
//        return $this->respondCreated('User successfully created.');

        $user = new User;

        $user->first_name = Input::get('first_name');
        $user->last_name = Input::get('last_name');
        $user->email = Input::get('email');
        $user->address = Input::get('address');
        $user->telephone = Input::get('telephone');
        $user->role = Input::get('role');
        $user->password = Hash::make(Input::get('password'));
        $user->save();




    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return User::find($id);

//        if (! $user)
//        {
//            return $this->respondNotFound('User does not exist.');
//        }
//
//        return $this->respond([
//
//            'data' => $this->userTransformer->transform($user)
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
        $user = User::findOrfail($id);

        $user->first_name = Input::get('first_name');
        $user->last_name = Input::get('last_name');
        $user->email = Input::get('email');
        $user->address = Input::get('address');
        $user->telephone = Input::get('telephone');
        $user->role = Input::get('role');
        $user->save();

        //return "Success updating user #" . $employee->id;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->appointments;

        $user->delete();
    }

    public function getClients()
    {
        return User::where('role' ,'=', 'Client')->get();
    }

}