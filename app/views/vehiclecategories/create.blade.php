@extends('layouts.default')

@section('breadcrumbs')
    <li><a href="/">Dashboard</a></li>
    <li><a href="{{ route('vehiclecategories.index') }}">Vehicle Categories</a></li>
    <li class="current">Add New</li>
@stop

@section('content')
    <h1>Add new vehicle category</h1>

    {{ Form::open(['route'=>'vehiclecategories.store']) }}
        <div class="row">
            <div class="small-3 columns">
                {{ Form::label('category', 'Category:', array('class'=>'right inline')) }}
            </div>
            <div class="small-9 columns">
                {{ Form::text('category', null, array('class'=>'error', 'required')) }}            
                {{ $errors->first('category', '<small class=error>:message</small>') }}
            </div>
        </div>

        <div class="row">
            <div class="small-9 small-offset-3 columns">
                <ul class="button-group radius">
                    <li>{{ Form::submit('Save', array('class'=>'button tiny')) }}</li>
                    <li><a href="{{ route('vehiclecategories.index') }}" class="button tiny">Cancel</a></li>
                </ul>
            </div>
        </div>
    {{ Form::close() }}
@stop