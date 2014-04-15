@extends('layouts.default')

@section('breadcrumbs')
    <li><a href="/">Dashboard</a></li>
    <li><a href="{{ route('suppliers.index') }}">Suppliers</a></li>
    <li><a href="{{ route('suppliers.show', $supplier->id) }}">Details</a></li>
    <li class="current">Manage vehicles</li>
@stop

@section('content')
    <div class="clearfix">
        <h1 class="left">{{ $supplier->name }}</h1>
        <a href="{{ route('suppliers.vehicles.create', $supplier->id) }}" class="right button radius">Add New</a>
    </div>

    <hr>
    
    <h5>Vehicles</h5>
    <table class="fullWidth" id="dmsp-table">
        <thead>
            <tr>
                <th width="10%">ID</th>
                <th width="25%">Make</th>
                <th width="25%">Model</th>
                <th width="15%">Registration #</th>
                <th width="25%">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($supplier->vehicles as $vehicle)
                <tr>
                    <td>{{ $vehicle->id }}</td>
                    <td>{{ $vehicle->vehicleModel->vehicleMake->make }}</td>
                    <td>{{ $vehicle->vehicleModel->model }}</td>
                    <td>{{ $vehicle->registration_number }}</td>
                    <td>
                        <ul class="button-group actions">
                            <li><a href="{{ route('vehicles.edit', $vehicle->id) }}" class="button tiny">Edit</a></li>
                            <li>
                                {{ Form::open(['route'=>array('vehicles.destroy', $vehicle->id)]) }}
                                    {{ Form::hidden('_method', 'DELETE') }}
                                    {{ Form::submit('Delete', array('class'=>'button tiny alert'))}}
                                {{ Form::close() }}
                            </li>
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop