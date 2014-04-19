@extends('layouts.default')

@section('breadcrumbs')
    <li><a href="/">Dashboard</a></li>
    <li><a href="{{ route('facilities.index') }}">Facilities</a></li>
    <li class="current">Details</li>
@stop

@section('content')
    <div class="clearfix">
        <h1 class="left">{{ $facility->name }}</h1>
        <a href="#" data-reveal-id="alertModel" class="right button alert radius">Delete facility</a>
    </div>

    <div id="alertModel" class="reveal-modal" data-reveal>
        <h2 >Alert</h2>
        <p>Deleting this facility will remove it from the database along with any deliveries assocaited with this facility.</p>
        {{ Form::open(array('route'=>array('facilities.destroy', $facility->id), 'class'=>'actions')) }}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Contine', array('class'=>'right button small alert radius'))}}
        {{ Form::close() }}
        <a class="close-reveal-modal">&#215;</a>
    </div>

    <hr>
    
    <h4>Address</h4>
    <div class="vcard fullWidth">
        <span class="street-address">{{ $facility->address1 }}</span>,
        @if(!empty($facility->address2))
            <span class="street-address">{{ $facility->address2 }}</span>,
        @endif
        <span class="locality">{{ $facility->city }}</span>,
        <span class="state">{{ $facility->county }}</span>,
        <span class="postcode">{{ $facility->post_code }}</span>,
    </div>

    <h4>Details</h4>
    <div class="panel">
        <p>{{ $facility->description }}</p>
        <p>Capacity: {{ $facility->capacity }} m<sup>2</sup></p>
    </div>

    <div class="row">
        <div class="small-12 columns">
            <ul class="button-group radius">
                <li><a href="{{ route('facilities.edit', $facility->id) }}" class="button small">Edit</a></li>
                <li><a href="{{ route('facilities.index') }}" class="button small">Cancel</a></li>
            </ul>
        </div>
    </div>

@stop