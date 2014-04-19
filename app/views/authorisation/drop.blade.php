@extends('layouts.default')

@section('breadcrumbs')
    <li><a href="/">Dashboard</a></li>
    <li><a href="{{ route('authorisation.index') }}">Facilities</a></li>
    <li><a href="{{ route('authorisation.show', $drop->facility->id) }}">Deliveries</a></li>
    <li class="current">Drop</li>
@stop

@section('content')
    <div class="clearfix">
        <h1 class="left">{{ $drop->facility->name }}</h1>
        @if($drop->drop_status_id == 1)
            <a href="{{ route('authorisation.entry', $drop->id) }}" class="right button alert radius">Authorise Entry</a>
        @elseif($drop->drop_status_id == 2)
            <a href="{{ route('authorisation.exit', $drop->id) }}" class="right button alert radius">Authorise Exit</a>
        @endif
    </div>

    <hr>
    
    <div class="panel callout clearfix">
        <h3 class="left">Scheduled: {{ date("jS F Y", strtotime($drop->delivery->date)) }} at {{ date("H:i", strtotime($drop->time_slot)) }}</h3>
        <h3 class="right">{{ $drop->dropStatus->status }}</h3>
    </div>

    <hr>

    <h4>Supplier</h4>
    <div class="vcard fullWidth">
        <h1 class="fn">{{ $drop->delivery->supplierEmployees->first()->supplier->name }}</h1>
        <span class="street-address">{{ $drop->delivery->supplierEmployees->first()->supplier->address1 }}</span>,
        @if(!empty($drop->delivery->supplierEmployees->first()->supplier->address2))
            <span class="street-address">{{ $drop->delivery->supplierEmployees->first()->supplier->address2 }}</span>,
        @endif
        <span class="locality">{{ $drop->delivery->supplierEmployees->first()->supplier->city }}</span>,
        <span class="state">{{ $drop->delivery->supplierEmployees->first()->supplier->region }}</span>,
        <span class="postcode">{{ $drop->delivery->supplierEmployees->first()->supplier->post_code }}</span>,
        <span class="country">{{ $drop->delivery->supplierEmployees->first()->supplier->country }}</span>
    </div>

    <h4>Details</h4>
    <div class="row" data-equalizer>
        <div class="small-6 columns">
            <div class="panel" data-equalizer-watch>
                <h5>Vehicles:</h5>
                <ul class="no-bullet">
                    @foreach($drop->delivery->vehicles as $vehicle)
                        <li>{{ $vehicle->registration_number }} / {{ $vehicle->vehicleModel->vehicleMake->make }} / {{ $vehicle->vehicleModel->model }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="small-6 columns">
            <div class="panel" data-equalizer-watch>
                <h5>Delivery team:</h5>
                <ul class="no-bullet">
                    @foreach($drop->delivery->supplierEmployees as $supplierEmployee)
                        <li>{{ $supplierEmployee->honorific->honorific }}. {{ $supplierEmployee->first_name }} {{ $supplierEmployee->last_name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    @if(!empty($drop->delivery->note))
        <h4>Note</h4>
        <div class="panel callout">
            <p>{{ $drop->delivery->note }}</p>
        </div>
    @endif

    <hr>

    <div class="row">
        <div class="small-12 columns">
            <ul class="button-group radius">
                <a href="{{ route('authorisation.show', $drop->facility->id) }}" class="button small">Cancel</a>
            </ul>
        </div>
    </div>
@stop