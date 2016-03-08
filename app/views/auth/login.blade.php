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

                    <form method="POST" action="/auth/login">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" class="form-control" value="{{ Input::old('email') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <input type="checkbox" name="remember"> Remember Me
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-default">Login</button>
                        </div>
                    </form>

                    <a href="/auth/register">Register</a>
                </div>
        </div>
@stop