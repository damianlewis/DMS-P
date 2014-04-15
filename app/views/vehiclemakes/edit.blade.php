@extends('layouts.default')

@section('breadcrumbs')
    <li><a href="/">Dashboard</a></li>
    <li><a href="{{ route('vehiclemakes.index') }}">Vehicle Makes</a></li>
    <li class="current">Edit</li>
@stop

@section('content')
    <h1>Edit vehicle make</h1>

    {{ Form::model($vehiclemake, ['route'=>array('vehiclemakes.update', $vehiclemake->id), 'method'=>'PUT']) }}
        <div class="row">
            <div class="small-3 columns">
                {{ Form::label('make', 'Make:', array('class'=>'right inline')) }}
            </div>
            <div class="small-9 columns">
                {{ Form::text('make', null, array('class'=>'error', 'required')) }}            
                {{ $errors->first('make', '<small class=error>:message</small>') }}
            </div>
        </div>

        <div class="row">
            <div class="small-9 small-offset-3 columns">
                <ul class="button-group radius">
                    <li>{{ Form::submit('Save', array('class'=>'button tiny')) }}</li>
                    <li><a href="{{ route('vehiclemakes.index') }}" class="button tiny">Cancel</a></li>
                </ul>
            </div>
        </div>
    {{ Form::close() }}
@stop