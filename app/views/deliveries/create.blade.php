@extends('layouts.default')

@section('breadcrumbs')
    <li><a href="/">Dashboard</a></li>
    <li><a href="{{ route('deliveries.index') }}">Deliveries</a></li>
    <li class="current">Add New</li>
@stop

@section('content')
    <h1>Add a new delivery</h1>

    {{ Form::open(array('route'=>'deliveries.store', 'data-abide')) }}
        {{ Form::hidden('delivery_status_id', '1'); }}
        <div class="row">
            <div class="small-12 large-6 columns">
                {{ Form::label('supplier', 'Supplier:') }}
                <select id="supplier" name="supplier_id">
                    @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="small-12 large-6 columns">
                {{ Form::label('date', 'Date:') }}
                {{ Form::text('date', null, array('class'=>'datepicker', 'placeholder'=>'Select a date', 'required')) }}
                <small class="error">Date is required.</small>
            </div>
        </div>

        <div class="row">
            <div class="small-12 large-6 columns">
                {{ Form::label('vehicle', 'Vehicle:') }}
                <select id="vehicle" name="vehicle_id">
                    <option>Please choose supplier first</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="small-12 large-6 columns">
                {{ Form::label('employee', 'Employee:') }}
                <select id="employee" name="employee_id">
                    <option>Please choose supplier first</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="small-12 columns">
                {{ Form::label('note', 'Delivery note:') }}
                {{ Form::textarea('note') }}
            </div>
        </div>

        <div class="row">
            <div class="small-12 columns">
                <ul class="button-group radius">
                    <li>{{ Form::submit('Save', array('class'=>'button small')) }}</li>
                    <li><a href="{{ route('deliveries.index') }}" class="button small">Cancel</a></li>
                </ul>
            </div>
        </div>
    {{ Form::close() }}
@stop

@section('scripts')
    <script src="/js/deliveryDates.js"></script>
    <script src="/js/vehicles.js"></script>
    <script src="/js/employees.js"></script>
@stop