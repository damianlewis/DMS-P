@extends('layouts.default')

@section('breadcrumbs')
    <li><a href="/">Dashboard</a></li>
    <li><a href="{{ route('suppliers.index') }}">Suppliers</a></li>
    <li class="current">Edit</li>
@stop

@section('content')
    <h1>Edit supplier</h1>

    {{ Form::model($supplier, array('route'=>array('suppliers.update', $supplier->id), 'method'=>'PUT', 'data-abide')) }}
        <div class="row">
            <div class="small-12 large-6 columns">
                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', null, array('required')) }}
                <small class="error">Name is required.</small>
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
                {{ Form::label('address1', 'Address 1:') }}
                {{ Form::text('address1', null, array('required')) }}                
                <small class="error">Address 1 is required.</small>
            </div>
        </div>

        <div class="row">
            <div class="small-12 large-6 columns">
                {{ Form::label('address2', 'Address 2:') }}
                {{ Form::text('address2') }}                
            </div>
        </div>

        <div class="row">
            <div class="small-12 large-6 columns">
                {{ Form::label('city', 'City:') }}
                {{ Form::text('city', null, array('required')) }}                
                <small class="error">City is required.</small>
            </div>
        </div>

        <div class="row">
            <div class="small-12 large-6 columns">
                {{ Form::label('region', 'Region:') }}
                {{ Form::text('region', null, array('required')) }}                
                <small class="error">Region is required.</small>
            </div>
        </div>

        <div class="row">
            <div class="small-12 large-6 columns">
                {{ Form::label('Country', 'Country:') }}
                {{ Form::text('country', null, array('required')) }}                
                <small class="error">Country is required.</small>
            </div>
        </div>

        <div class="row">
            <div class="small-12 medium-4 large-2 columns">
                {{ Form::label('post_code', 'Post Code:') }}
                {{ Form::text('post_code', null, array('required')) }}                
                <small class="error">Post code is required.</small>
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