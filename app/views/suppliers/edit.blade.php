@extends('layouts.default')

@section('breadcrumbs')
    <li><a href="/">Dashboard</a></li>
    <li><a href="{{ route('suppliers.index') }}">Suppliers</a></li>
    <li class="current">Edit</li>
@stop

@section('content')
    <h1>Edit supplier</h1>

    {{ Form::model($supplier, ['route'=>array('suppliers.update', $supplier->id), 'method'=>'PUT']) }}
        <div class="row">
            <div class="small-3 columns">
                {{ Form::label('name', 'Name:', array('class'=>'right inline')) }}
            </div>
            <div class="small-9 columns">
                {{ Form::text('name', null, array('class'=>'error', 'required')) }}            
                {{ $errors->first('name', '<small class=error>:message</small>') }}
            </div>
        </div>

        <div class="row">
            <div class="small-3 columns">
                {{ Form::label('address1', 'Address 1:', array('class'=>'right inline')) }}
            </div>
            <div class="small-9 columns">
                {{ Form::text('address1', null, array('class'=>'error', 'required')) }}                
                {{ $errors->first('address1', '<small class=error>:message</small>') }}
            </div>
        </div>

        <div class="row">
            <div class="small-3 columns">
                {{ Form::label('address2', 'Address 2:', array('class'=>'right inline')) }}
            </div>
            <div class="small-9 columns">
                {{ Form::text('address2') }}                
            </div>
        </div>

        <div class="row">
            <div class="small-3 columns">
                {{ Form::label('locality', 'City:', array('class'=>'right inline')) }}
            </div>
            <div class="small-9 columns">
                {{ Form::text('locality', null, array('class'=>'error', 'required')) }}                
                {{ $errors->first('locality', '<small class=error>:message</small>') }}
            </div>
        </div>

        <div class="row">
            <div class="small-3 columns">
                {{ Form::label('region', 'Region:', array('class'=>'right inline')) }}
            </div>
            <div class="small-9 columns">
                {{ Form::text('region', null, array('class'=>'error', 'required')) }}                
                {{ $errors->first('region', '<small class=error>:message</small>') }}
            </div>
        </div>

        <div class="row">
            <div class="small-3 columns">
                {{ Form::label('post_code', 'Post Code:', array('class'=>'right inline')) }}
            </div>
            <div class="small-9 columns">
                {{ Form::text('post_code', null, array('class'=>'error', 'required')) }}                
                {{ $errors->first('post_code', '<small class=error>:message</small>') }}
            </div>
        </div>

        <div class="row">
            <div class="small-3 columns">
                {{ Form::label('country', 'Country:', array('class'=>'right inline')) }}
            </div>
            <div class="small-9 columns">
                {{ Form::text('country', null, array('class'=>'error', 'required')) }}                
                {{ $errors->first('country', '<small class=error>:message</small>') }}
            </div>
        </div>

        <div class="row">
            <div class="small-9 small-offset-3 columns">
                <ul class="button-group radius">
                    <li>{{ Form::submit('Save', array('class'=>'button tiny')) }}</li>
                    <li><a href="{{ URL::previous() }}" class="button tiny">Cancel</a></li>
                </ul>
            </div>
        </div>
    {{ Form::close() }}
@stop