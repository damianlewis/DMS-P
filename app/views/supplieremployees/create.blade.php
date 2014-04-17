@extends('layouts.default')

@section('breadcrumbs')
    <li><a href="/">Dashboard</a></li>
    <li><a href="{{ route('supplieremployees.index') }}">Supplier Employees</a></li>
    <li class="current">Add New</li>
@stop

@section('content')
    <h1>Add a new supplier employee</h1>

    {{ Form::open(array('route'=>'supplieremployees.store', 'data-abide')) }}
        <div class="row">
            <div class="small-12 large-6 columns">
                {{ Form::label('supplier', 'Supplier:') }}
                {{ Form::select('supplier', $suppliers, null, array('name'=>'supplier_id')) }}
            </div>
        </div>

        <div class="row">
            <div class="small-6 large-2 columns">
                {{ Form::label('honorific', 'Title:') }}
                {{ Form::select('honorific', $honorifics, null, array('name'=>'honorific_id')) }}
            </div>
        </div>

        <div class="row">
            <div class="small-12 large-6 columns">
                {{ Form::label('first_name', 'First name:') }}
                {{ Form::text('first_name', null, array('required')) }}
                <small class="error">First name is required.</small>
            </div>
        </div>

        <div class="row">
            <div class="small-12 large-6 columns">
                {{ Form::label('last_name', 'Last name:') }}
                {{ Form::text('last_name', null, array('required')) }}                
                <small class="error">Last name is required.</small>
            </div>
        </div>

        <div class="row">
            <div class="small-12 large-6 columns">
                {{ Form::label('phone_number', 'Phone number:') }}
                {{ Form::text('phone_number', null, array('required')) }}                
                <small class="error">Phone number is required.</small>
            </div>
        </div>

        <div class="row">
            <div class="small-12 large-6 columns">
                {{ Form::label('role', 'Role:') }}
                {{ Form::select('role', $roles, null, array('name'=>'employee_role_id')) }}
            </div>
        </div>

        <div class="row">
            <div class="small-12 columns">
                <ul class="button-group radius">
                    <li>{{ Form::submit('Save', array('class'=>'button small')) }}</li>
                    <li><a href="{{ route('supplieremployees.index') }}" class="button small">Cancel</a></li>
                </ul>
            </div>
        </div>
    {{ Form::close() }}

@stop