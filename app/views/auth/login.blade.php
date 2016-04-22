@extends('layouts.app')

@section('title', 'Login')

@section('content')

        <div class="row">
                    <div class="form-title">
                        <span class="form-title">Welcome.</span>
                        <span class="form-subtitle">Please login.</span>
                    </div>

                    <hr>

                    @include('errors')
                    <form method="POST"  class="login-form" action="/auth/login">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                                <input type="email" name="email" placeholder="example@gmail.com" class="form-control form-control-solid placeholder-no-fix" value="{{ Input::old('email') }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                                    <input type="password" name="password" placeholder="Password" id="password" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary btn-block uppercase">Login</button>
                        </div>

                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                        <a href="/auth/register">Sign up</a>
                    </form>
                </div>
@stop