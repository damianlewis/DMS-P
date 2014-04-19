@extends('layouts.default')

@section('breadcrumbs')
    <li><a href="/">Dashboard</a></li>
    <li><a href="{{ route('suppliers.index') }}">Suppliers</a></li>
    <li class="current">Details</li>
@stop

@section('content')
    <div class="clearfix">
        <h1 class="left">{{ $supplier->name }}</h1>
        <a href="#" data-reveal-id="alertModel" class="right button alert radius">Delete supplier</a>
    </div>

    <div id="alertModel" class="reveal-modal" data-reveal>
        <h2 >Alert</h2>
        <p>Deleting this supplier will remove it from the database along with any deliveries, vehicles, and staff assocaited with this supplier.</p>
        {{ Form::open(array('route'=>array('suppliers.destroy', $supplier->id), 'class'=>'actions')) }}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Contine', array('class'=>'right button small alert radius'))}}
        {{ Form::close() }}
        <a class="close-reveal-modal">&#215;</a>
    </div>

    <hr>

    <h4>Address</h4>
    <div class="vcard fullWidth">
        <span class="street-address">{{ $supplier->address1 }}</span>,
        @if(!empty($supplier->address2))
            <span class="street-address">{{ $supplier->address2 }}</span>,
        @endif
        <span class="locality">{{ $supplier->city }}</span>,
        <span class="state">{{ $supplier->region }}</span>,
        <span class="postcode">{{ $supplier->post_code }}</span>,
        <span class="country">{{ $supplier->country }}</span>
    </div>

    <h4>Details</h4>
    <div class="panel">
        <p>{{ $supplier->description }}</p>
        <p>Number of vehicles: {{ count($supplier->vehicles) }}</p>
        <p>Number of staff:  {{ count($supplier->staff) }}</p>
    </div>

    <hr>

    <div class="row">
        <div class="small-12 columns">
            <ul class="button-group radius">
                <li><a href="{{ route('suppliers.edit', $supplier->id) }}" class="button small">Edit</a></li>
                <li><a href="{{ route('suppliers.index') }}" class="button small">Cancel</a></li>
            </ul>
        </div>
    </div>
@stop