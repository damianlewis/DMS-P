@extends('layouts.default')

@section('breadcrumbs')
    <li><a href="/">Dashboard</a></li>
    <li><a href="{{ route('deliveries.index') }}">Deliveries</a></li>
    <li><a href="{{ route('deliveries.show', $delivery->id) }}">Details</a></li>
    <li class="current">Add New Drop</li>
@stop

@section('content')
    <div class="clearfix">
        <h1 class="left">ID: {{ $delivery->id }} </h1>
    </div>

    <hr>
    
    <div class="clearfix">
        <h3 class="left">Delivey date: <time id="delivery-date" datetime="{{ date("Y-m-d", strtotime($delivery->date)) }}">{{ date("jS F Y", strtotime($delivery->date)) }}</time></h3>
    </div>

    <hr>

    <div class="clearfix">
        <h4 class="left">Add a new delivery drop</h4>
    </div>

    {{ Form::open(array('route'=>'drops.store', 'data-abide')) }}
        {{ Form::hidden('delivery_id', $delivery->id); }}
        {{ Form::hidden('drop_status_id', '1'); }}
        <div class="row">
            <div class="small-12 large-6 columns">
                {{ Form::label('facilities', 'Facility:') }}
                <select id="facilities" name="facility_id">
                    @foreach($facilities as $facility)
                        <option value="{{ $facility->id }}">{{ $facility->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="small-12 large-6 columns">
                {{ Form::label('timeslot', 'Time slot:') }}
                {{ Form::text('timeslot', null, array('class'=>'timepicker', 'name'=>'time_slot', 'placeholder'=>'Select a time', 'required')) }}
                <small class="error">Time is required.</small>
            </div>
        </div>

    <hr>

        <div class="row">
            <div class="small-12 columns">
                <ul class="button-group radius">
                    <li>{{ Form::submit('Save', array('class'=>'button small')) }}</li>
                    <li><a href="{{ route('deliveries.show', $delivery->id) }}" class="button small">Cancel</a></li>
                </ul>
            </div>
        </div>
    {{ Form::close() }}
@stop

@section('scripts')
    <script src="/js/timeslots.js"></script>
@stop