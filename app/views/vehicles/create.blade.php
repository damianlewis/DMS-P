@extends('layouts.default')

@section('breadcrumbs')
    <li><a href="/">Dashboard</a></li>
    <li><a href="{{ route('vehicles.index') }}">Vehicles</a></li>
    <li class="current">Add New</li>
@stop

@section('content')
    <h1>Add a new vehicle</h1>

    {{ Form::open(array('route'=>'vehicles.store', 'data-abide')) }}
        <div class="row">
            <div class="small-12 large-6 columns">
                {{ Form::label('supplier', 'Supplier:') }}
                {{ Form::select('supplier', $suppliers, null, array('name'=>'supplier_id')) }}
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
                {{ Form::label('make', 'Make:') }}
                {{ Form::select('make', $vehicleMakes, null, array('name'=>'vehicle_make_id')) }}
            </div>
        </div>

        <div class="row">
            <div class="small-12 large-6 columns">
                {{ Form::label('model', 'Model:') }}
                <select id="model" name="vehicle_model_id">
                    <option>Please choose vehicle make first</option>
                </select>
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
                    <li><a href="{{ route('vehicles.index') }}" class="button small">Cancel</a></li>
                </ul>
            </div>
        </div>
    {{ Form::close() }}

@stop

@section('scripts')
    <script src="/js/vehicleModels.js"></script>
@stop
