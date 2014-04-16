@extends('layouts.default')

@section('breadcrumbs')
    <li><a href="/">Dashboard</a></li>
    <li><a href="{{ route('vehicles.index') }}">vehicles</a></li>
    <li class="current">Edit</li>
@stop

@section('content')
    <h1>Edit vehicle</h1>

    {{ Form::model($vehicle, array('route'=>array('vehicles.update', $vehicle->id), 'method'=>'PUT', 'data-abide')) }}
        <div class="row">
            <div class="small-12 large-6 columns">
                {{ Form::label('supplier', 'Supplier:') }}
                {{ Form::select('supplier', $suppliers, $vehicle->supplier_id, array('name'=>'supplier_id')) }}
            </div>
        </div>

        <div class="row">
            <div class="small-12 columns">
                {{ Form::label('description', 'Description:') }}
                {{ Form::textarea('description', null, array('required')) }}
                <small class="error">Description is required.</small>
            </div>
        </div>

        <div class="row">
            <div class="small-12 large-6 columns">
                {{ Form::label('model', 'Model:') }}
                {{ Form::select('model', $vehicleModels, $vehicle->vehicle_model_id, array('name'=>'vehicle_model_id')) }}
            </div>
        </div>

        <div class="row">
            <div class="small-12 medium-4 large-2 columns">
                {{ Form::label('registration_number', 'Registartion number:') }}
                {{ Form::text('registration_number', null, array('required')) }}                
                <small class="error">Registartion is required.</small>
            </div>
        </div>

        <div class="row">
            <div class="small-12 columns">
                <ul class="button-group radius">
                    <li>{{ Form::submit('Save', array('class'=>'button small')) }}</li>
                    <li><a href="{{ URL::previous() }}" class="button small">Cancel</a></li>
                </ul>
            </div>
        </div>
    {{ Form::close() }}
@stop