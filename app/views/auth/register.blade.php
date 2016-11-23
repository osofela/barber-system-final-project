x@extends('layouts.app')

@section('title', 'Register')

@section('content')
        <div class="row">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

            <div class="form-title">
                <span class="form-title">Register</span>
            </div>
                <hr>

                @include('errors')

                <form method="POST" action="/auth/register">
                    <p class="hint">
                        Enter your personal details below:
                    </p>

                    <div class="form-group">
                        <input type="text" name="first_name" class="form-control" placeholder="First Name" value="{{ Input::old('first_name') }}" required>
                    </div>

                    <div class="form-group">
                        <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{ Input::old('last_name') }}" required>
                    </div>

                    <div class="form-group">
                        <input type="text" name="address" class="form-control" placeholder="Address" value="{{ Input::old('address') }}" required>
                    </div>

                    <div class="form-group">
                        <input type="telephone" name="telephone" class="form-control" placeholder="Telephone" value="{{ Input::old('telephone') }}" required>
                    </div>

                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ Input::old('email') }}" required>
                    </div>

                    <div class="form-group">
                        <input type="password" name="password" placeholder="Password" id="password" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <input type="password" name="password_confirmation" placeholder="Confirm Password" id="password_confirmation" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-default">Sign up</button>
                    </div>

                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                </form>
            </div>
@stop
