@extends('layouts.default')

@section('breadcrumbs')
    <li><a href="/">Dashboard</a></li>
    <li><a href="{{ route('vehicles.index') }}">Vehicles</a></li>
    <li class="current">Add New</li>
@stop

@section('content')
    <h1>Add new vehiclel</h1>

    {{ Form::open(['route'=>'vehicles.store']) }}
        <div class="row">
            <div class="small-3 columns">
                {{ Form::label('supplier', 'Supplier:', array('class'=>'right inline')) }}
            </div>
            <div class="small-9 columns">
                {{ Form::select('supplier', $suppliers, null, array('name'=>'supplier_id')) }}            
            </div>
        </div>

        <div class="row">
            <div class="small-3 columns">
                {{ Form::label('model', 'Model:', array('class'=>'right inline')) }}
            </div>
            <div class="small-9 columns">
                {{ Form::select('model', $vehicleModels, null, array('name'=>'vehicle_model_id')) }}            
            </div>
        </div>

        <div class="row">
            <div class="small-3 columns">
                {{ Form::label('registration_number', 'Registartion:', array('class'=>'right inline')) }}
            </div>
            <div class="small-9 columns">
                {{ Form::text('registration_number', null, array('class'=>'error', 'required')) }}            
                {{ $errors->first('registration_number', '<small class=error>:message</small>') }}
            </div>
        </div>

        <div class="row">
            <div class="small-3 columns">
                {{ Form::label('category', 'Category:', array('class'=>'right inline')) }}
            </div>
            <div class="small-9 columns">
                {{ Form::select('category', $vehicleCategories, null, array('name'=>'vehicle_category_id')) }}            
            </div>
        </div>

        <div class="row">
            <div class="small-9 small-offset-3 columns">
                <ul class="button-group radius">
                    <li>{{ Form::submit('Save', array('class'=>'button tiny')) }}</li>
                    <li><a href="{{ route('vehicles.index') }}" class="button tiny">Cancel</a></li>
                </ul>
            </div>
        </div>
    {{ Form::close() }}
@stop