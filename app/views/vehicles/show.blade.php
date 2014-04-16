@extends('layouts.default')

@section('breadcrumbs')
    <li><a href="/">Dashboard</a></li>
    <li><a href="{{ route('vehicles.index') }}">Vehicles</a></li>
    <li class="current">Details</li>
@stop

@section('content')
    <div class="clearfix">
        <h1 class="left">Vehicle details</h1>
        <a href="#" data-reveal-id="alertModel" class="right button alert radius">Delete vehicle</a>
    </div>

    <div id="alertModel" class="reveal-modal" data-reveal>
        <h2>Alert</h2>
        <p>Deleting this vehicle will remove it from the database along with any deliveries assocaited with this vehicle.</p>
        {{ Form::open(array('route'=>array('vehicles.destroy', $vehicle->id), 'class'=>'actions')) }}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Contine', array('class'=>'right button small alert radius'))}}
        {{ Form::close() }}
        <a class="close-reveal-modal">&#215;</a>
    </div>

    <hr>

    <h5>Belongs to supplier</h5>
    <div class="vcard">
        <span class="street-address">{{ $vehicle->supplier->name }}</span>,
        <span class="street-address">{{ $vehicle->supplier->address1 }}</span>,
        @if(!empty($vehicle->supplier->address2))
            <span class="street-address">{{ $vehicle->supplier->address2 }}</span>,
        @endif
        <span class="locality">{{ $vehicle->supplier->city }}</span>,
        <span class="state">{{ $vehicle->supplier->region }}</span>,
        <span class="postcode">{{ $vehicle->supplier->post_code }}</span>,
        <span class="country">{{ $vehicle->supplier->country }}</span>
    </div>

    <h5>Details</h5>
    <div class="panel">
        <p>{{ $vehicle->description }}</p>
        <p>Make: {{ $vehicle->vehicleModel->vehicleMake->make }}</p>
        <p>Model: {{ $vehicle->vehicleModel->model }}</p>
        <p>Registration number: {{ $vehicle->registration_number }}</p>
    </div>

    <hr>

    <div class="row">
        <div class="small-12 columns">
            <ul class="button-group radius">
                <li><a href="{{ route('vehicles.edit', $vehicle->id) }}" class="button small">Edit</a></li>
                <li><a href="{{ route('vehicles.index') }}" class="button small">Cancel</a></li>
            </ul>
        </div>
    </div>
@stop