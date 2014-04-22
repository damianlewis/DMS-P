@extends('layouts.default')

@section('breadcrumbs')
    <li><a href="/">Dashboard</a></li>
    <li><a href="{{ route('deliveries.index') }}">Deliveries</a></li>
    <li class="current">Details</li>
@stop

@section('content')
    <div class="clearfix">
        <h1 class="left">Delivery ID: {{ $delivery->id }} </h1>
        @if($delivery->delivery_status_id == 1)
            <a href="#" data-reveal-id="cancelDeliveryAlert" class="right button alert radius">Cancel delivery</a>
        @endif
    </div>

    <hr>
    
    <div class="panel callout clearfix">
        <h3 class="left">Scheduled: {{ date("jS F Y", strtotime($delivery->date)) }}</h3>
        <h3 class="right">{{ $delivery->deliveryStatus->status }}</h3>
    </div>

    <hr>

    <div class="clearfix">
        <h4 class="left">Drops</h4>
        @if($delivery->delivery_status_id == 1)
            <a href="{{ route('drops.add', $delivery->id) }}" class="right button small radius">Add new drop</a>
        @endif
    </div>

    <div class="row">
        <div class="small-12 columns">
            <table class="fullWidth" id="dmsp-table">
                <thead>
                    <tr>
                        <th width="10%">ID</th>
                        <th width="15%">Time</th>
                        <th width="50%">Facility</th>
                        <th width="15%">Status</th>
                        <th width="10%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($delivery->drops as $drop)
                        <tr>
                            <td>{{ $drop->id }}</td>
                            <td>{{ date("H:i", strtotime($drop->time_slot)) }}</td>
                            <td>{{ $drop->facility->name }}</td>
                            <td>{{ $drop->dropStatus->status }}</td>
                            <td class="actions">
                                <a href="{{ route('drops.show', $drop->id) }}" class="button tiny radius">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <hr>

    <h4>Supplier</h4>
    <div class="vcard fullWidth">
        <h1 class="fn">{{ $delivery->supplierEmployees->first()->supplier->name }}</h1>
        <span class="street-address">{{ $delivery->supplierEmployees->first()->supplier->address1 }}</span>,
        @if(!empty($delivery->supplierEmployees->first()->supplier->address2))
            <span class="street-address">{{ $delivery->supplierEmployees->first()->supplier->address2 }}</span>,
        @endif
        <span class="locality">{{ $delivery->supplierEmployees->first()->supplier->city }}</span>,
        <span class="state">{{ $delivery->supplierEmployees->first()->supplier->region }}</span>,
        <span class="postcode">{{ $delivery->supplierEmployees->first()->supplier->post_code }}</span>,
        <span class="country">{{ $delivery->supplierEmployees->first()->supplier->country }}</span>
    </div>

    <h4>Details</h4>
    <div class="row" data-equalizer>
        <div class="small-6 columns">
            <div class="panel" data-equalizer-watch>
                <h5>Vehicles:</h5>
                <ul class="no-bullet">
                    @foreach($delivery->vehicles as $vehicle)
                        <li>{{ $vehicle->registration_number }} / {{ $vehicle->vehicleModel->vehicleMake->make }} / {{ $vehicle->vehicleModel->model }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="small-6 columns">
            <div class="panel" data-equalizer-watch>
                <h5>Delivery team:</h5>
                <ul class="no-bullet">
                    @foreach($delivery->supplierEmployees as $supplierEmployee)
                        <li>{{ $supplierEmployee->honorific->honorific }}. {{ $supplierEmployee->first_name }} {{ $supplierEmployee->last_name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    @if(!empty($delivery->note))
        <h4>Note</h4>
        <div class="panel callout">
            <p>{{ $delivery->note }}</p>
        </div>
    @endif

    <hr>

    <div class="row">
        <div class="small-12 columns">
            <ul class="button-group radius">
                <li><a href="{{ route('deliveries.edit', $delivery->id) }}" class="button small">Edit</a></li>
                <li><a href="{{ route('deliveries.index') }}" class="button small">Cancel</a></li>
            </ul>
        </div>
    </div>

    <div id="cancelDeliveryAlert" class="reveal-modal actions" data-reveal>
        <h2>Alert</h2>
        <p>Are you sure that you want to cancel this delivery.</p>
        <a href="{{ route('deliveries.cancel', $delivery->id) }}" class="right button small alert radius">Contine</a>
        <a class="close-reveal-modal">&#215;</a>
    </div>

    <div id="deleteDropAlert" class="reveal-modal" data-reveal>
        <h2>Alert</h2>
        <p>Deleting this delivery drop will remove it from the database.</p>
        {{ Form::open(array('route'=>array('deliveries.destroy', $delivery->id), 'class'=>'actions')) }}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Contine', array('class'=>'right button small alert radius'))}}
        {{ Form::close() }}
        <a class="close-reveal-modal">&#215;</a>
    </div>
@stop