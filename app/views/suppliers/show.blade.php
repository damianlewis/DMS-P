@extends('layouts.default')

@section('breadcrumbs')
    <li><a href="/">Dashboard</a></li>
    <li><a href="{{ route('suppliers.index') }}">Suppliers</a></li>
    <li class="current">Details</li>
@stop

@section('content')
    <div class="clearfix">
        <h1 class="left">{{ $supplier->name }}</h1>
            {{ Form::open(['route'=>array('suppliers.destroy', $supplier->id)]) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Delete Supplier', array('class'=>'right button alert radius'))}}
            {{ Form::close() }}
    </div>

    <hr>
    
    <h5>Address</h5>
    <div class="vcard">
        <span class="street-address">{{ $supplier->address1 }}</span>,
        @if(!empty($supplier->address2))
            <span class="street-address">{{ $supplier->address2 }}</span>,
        @endif
        <span class="locality">{{ $supplier->locality }}</span>,
        <span class="state">{{ $supplier->region }}</span>,
        <span class="postcode">{{ $supplier->post_code }}</span>,
        <span class="country">{{ $supplier->country }}</span>
    </div>

    <h5>Details</h5>
    <div class="panel">
        <p>Number of vehicles: {{ count($supplier->vehicles) }}</p>
        <p>Number of staff: </p>
    </div>

    <hr>

    <ul class="button-group radius">
        <li><a href="{{ route('suppliers.edit', $supplier->id) }}" class="button tiny">Edit Supplier Details</a></li>
        <li><a href="{{ route('suppliers.vehicles', $supplier->id) }}" class="button tiny">Manage Vehicles</a></li>
        <li><a href="{{ route('suppliers.edit', $supplier->id) }}" class="button tiny">Manage Staff</a></li>
    </ul>
@stop