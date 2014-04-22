@extends('layouts.login')

@section('breadcrumbs')
    <li><a href="/">Dashboard</a></li>
    <li class="current"><a href="/">Login</a></li>
@stop

@section('content')
    <h1>Login</h1>

    {{ Form::open(array('route'=>'sessions.store', 'data-abide')) }}
        <div class="row">
            <div class="small-12 large-6 columns">
                {{ Form::label('username', 'Username:') }}
                {{ Form::text('username', null, array('required')) }}
                <small class="error">Username is required.</small>
            </div>
        </div>

        <div class="row">
            <div class="small-12 large-6 columns">
                {{ Form::label('password', 'Password:') }}
                {{ Form::password('password', array('required')) }}
                <small class="error">Password is required.</small>
            </div>
        </div>

        <div class="row">
            <div class="small-12 columns">
                <ul class="button-group radius">
                    <li>{{ Form::submit('Login', array('class'=>'button small')) }}</li>
                </ul>
            </div>
        </div>
    {{ Form::close() }}

@stop