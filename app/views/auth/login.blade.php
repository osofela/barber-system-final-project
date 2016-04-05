@extends('layouts.app')

@section('title', 'Login')

@section('content')

        <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h1>Login</h1>
                    <hr>

                    {{ HTML::image('Suzi-K-Logo.png', 'Barber Logo', array( 'width' => 120, 'height' => 120 )) }}
                    <br>
                    <br>
                    @include('errors')
                    <form method="POST" action="/auth/login">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                                <input type="email" name="email" placeholder="example@gmail.com" class="form-control" value="{{ Input::old('email') }}" required>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                                    <input type="password" name="password" placeholder="Password" id="password" class="form-control" required>
                            </div>
                        </div>

                            <div class="form-group">
                                <input type="checkbox" name="remember"> Remember Me
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-default">Sign in</button>
                            </div>

                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                        <a href="/auth/register">Sign up</a>
                    </form>




                </div>
        </div>
@stop