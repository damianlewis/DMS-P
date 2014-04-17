@extends('layouts.default')

@section('breadcrumbs')
    <li><a href="/">Dashboard</a></li>
    <li><a href="{{ route('supplieremployees.index') }}">Supplier Employees</a></li>
    <li class="current">Details</li>
@stop

@section('content')
    <div class="clearfix">
        <h1 class="left">Supplier employee details</h1>
        <a href="#" data-reveal-id="alertModel" class="right button alert radius">Delete employee</a>
    </div>

    <div id="alertModel" class="reveal-modal" data-reveal>
        <h2>Alert</h2>
        <p>Deleting this employee will remove them from the database along with any deliveries assocaited with them.</p>
        {{ Form::open(array('route'=>array('supplieremployees.destroy', $supplierEmployee->id), 'class'=>'actions')) }}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Contine', array('class'=>'right button small alert radius'))}}
        {{ Form::close() }}
        <a class="close-reveal-modal">&#215;</a>
    </div>

    <hr>

    <h5>Employed at supplier</h5>
    <div class="vcard">
        <span class="street-address">{{ $supplierEmployee->supplier->name }}</span>,
        <span class="street-address">{{ $supplierEmployee->supplier->address1 }}</span>,
        @if(!empty($supplierEmployee->supplier->address2))
            <span class="street-address">{{ $supplierEmployee->supplier->address2 }}</span>,
        @endif
        <span class="locality">{{ $supplierEmployee->supplier->city }}</span>,
        <span class="state">{{ $supplierEmployee->supplier->region }}</span>,
        <span class="postcode">{{ $supplierEmployee->supplier->post_code }}</span>,
        <span class="country">{{ $supplierEmployee->supplier->country }}</span>
    </div>

    <h5>Details</h5>
    <div class="panel">
        <p>Name: {{ $supplierEmployee->honorific->honorific }}. {{ $supplierEmployee->first_name }} {{ $supplierEmployee->last_name }}</p>
        <p>Phone number: {{ $supplierEmployee->phone_number }}</p>
        <p>Job role: {{ $supplierEmployee->employeeRole->role }}</p>
    </div>

    <hr>

    <div class="row">
        <div class="small-12 columns">
            <ul class="button-group radius">
                <li><a href="{{ route('supplieremployees.edit', $supplierEmployee->id) }}" class="button small">Edit</a></li>
                <li><a href="{{ route('supplieremployees.index') }}" class="button small">Cancel</a></li>
            </ul>
        </div>
    </div>
@stop