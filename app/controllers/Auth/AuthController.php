<?php


use Illuminate\Support\Facades\Request;


/**
 * Created by PhpStorm.
 * User: garyobrien
 * Date: 07/03/2016
 * Time: 09:47
 */
class AuthController extends BaseController
{



    public function showLogin()
    {
        return View::make('auth.login');
    }

    public function doLogin()
    {
        // validate the info, create rules for the inputs
        $rules = array(
            'email'    => 'required|email', // make sure the email is an actual email
            'password' => 'required|alphaNum' // password can only be alphanumeric and has to be greater than 3 characters
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails())
        {
            return Redirect::to('auth/login')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        }
        else
        {

            // create our user data for the authentication
            $userdata = array(
                'email'     => Input::get('email'),
                'password'  => Input::get('password')
            );

            // attempt to do the login
            if (Auth::attempt($userdata)) {

                // validation successful!
                // redirect them to the secure section or whatever
                // return Redirect::to('secure');
                // for now we'll just echo success (even though echoing in a controller is bad)


                $userRole = Auth::user()->role;

                $mp = Mixpanel::getInstance("687a1651f84c817428a1d5b57480f371");

                // identify the current request as user.
                $mp->identify(Auth::user()->user_id);

                // track an event associated to user.
                $mp->track("Logged In", array("User" => Auth::user()->first_name . " " .Auth::user()->last_name,
                                              "Role" => Auth::user()->role));

                if($userRole == "Admin")
                {
                    return Redirect::to('api/v1/admin/dashboard');
                }
                else if($userRole == "Barber")
                {
                    return Redirect::to('api/v1/barber');
                }
                else if($userRole == "Intern")
                {
                    return Redirect::to('api/v1/intern');
                }

                else if($userRole == "Client")
                {
                    return Redirect::to('api/v1/client/dashboard');
                }

            }

            else
            {
                // validation not successful, send back to form

                return Redirect::to('auth/login')
                    ->withErrors("Invalid username or password.");

            }

        }
    }

    public function doLogout()
    {
        Auth::logout(); // log the user out of our application
        return Redirect::to('auth/login'); // redirect the user to the login screen
    }

    public function showRegister()
    {
        return View::make('auth.register');
    }

    /**
     * @param Request $request
     * @return string
     */
    public function doRegister()
    {
        // validate the info, create rules for the inputs
        $rules = array(

            'first_name'    => 'required',
            'last_name'    => 'required',
            'email'    => 'required|email|unique:users', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:4|confirmed', // password can only be alphanumeric and has to be greater than 3 characters
            'password_confirmation' => 'required|alphaNum|min:4'
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails())
        {
            return Redirect::to('auth/register')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        }
        else
        {

            $user = new User;

            $user->first_name = Input::get('first_name');
            $user->last_name = Input::get('last_name');
            $user->email = Input::get('email');
            $user->address = Input::get('address');
            $user->telephone = Input::get('telephone');
            $user->password = Hash::make(Input::get('password'));
            $user->save();


            $mp = Mixpanel::getInstance("687a1651f84c817428a1d5b57480f371");

            // identify the current request as user.
            $mp->identify($user->user_id);

            // track an event associated to user.
            $mp->track("Registered", array("Client" => $user->first_name . " " . $user->last_name));

            return Redirect::to('auth/thanks');
        }


    }

    public function showThanks()
    {
        return View::make('auth.thanks');
    }

    /**
     * @return mixed
     */

    public function getLoggedInUser()
    {
        return Auth::user();
    }
}