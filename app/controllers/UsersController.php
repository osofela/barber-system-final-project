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
    }

    public function index()
    {
        // 1. All is bad
        // 2. No way to attach meta data
        // 3. Linking db structure to the API output
        // 4. No way to signal headers/response codes

        $limit =Input::get('limit') ?: 3;

        $users= User::paginate($limit);

        return $this->respondWithPagination($users, [

            'data' => $this->userTransformer->transformCollection($users->all()),
        ]);

        //return Lesson::all(); // Really Bad practice
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        if( ! Input::get('first_name') or ! Input::get('last_name'))
        {
            // return some kind of response
            // 422
            // provide a message

            return $this->setStatusCode(422)
                ->respondWithError('Parameters failed validation for a user.');
        }

        User::create(Input::all());

        return $this->respondCreated('User successfully created.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::find($id);

        if (! $user)
        {
            return $this->respondNotFound('User does not exist.');
        }

        return $this->respond([

            'data' => $this->userTransformer->transform($user)
        ]);

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
}