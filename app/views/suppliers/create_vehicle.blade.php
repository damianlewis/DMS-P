@extends('layouts.default')

@section('breadcrumbs')
    <li><a href="/">Dashboard</a></li>
    <li><a href="{{ route('suppliers.index') }}">Suppliers</a></li>
    <li><a href="{{ route('suppliers.show', $supplier->id) }}">Details</a></li>
    <li><a href="{{ route('suppliers.vehicles', $supplier->id) }}">Manage vehicles</a></li>
    <li class="current">Add New</li>
@stop

@section('content')
    <h1>Add new vehicle</h1>

    {{ Form::open(['route'=>'suppliers.vehicles.store']) }}
        {{ Form::hidden('supplier_id', $supplier->id)}}
        <div class="row">
            <div class="small-3 columns">
                {{ Form::label('model', 'Model:', array('class'=>'right inline')) }}
            </div>
            <div class="small-9 columns">
                {{ Form::select('model', $vehicleModels, null, array('class'=>'error', 'required', 'name'=>'vehicle_model_id')) }}            
                {{ $errors->first('model', '<small class=error>:message</small>') }}
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
                {{ Form::select('category', $vehicleCategories, null, array('class'=>'error', 'required', 'name'=>'vehicle_category_id')) }}            
                {{ $errors->first('category', '<small class=error>:message</small>') }}
            </div>
        </div>

        <div class="row">
            <div class="small-9 small-offset-3 columns">
                <ul class="button-group radius">
                    <li>{{ Form::submit('Save', array('class'=>'button tiny')) }}</li>
                    <li><a href="{{ route('suppliers.vehicles', $supplier->id) }}" class="button tiny">Cancel</a></li>
                </ul>
            </div>
        </div>
    {{ Form::close() }}
@stop