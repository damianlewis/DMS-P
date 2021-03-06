@extends('layouts.default')

@section('breadcrumbs')
    <li><a href="/">Dashboard</a></li>
    <li class="current">Vehicles</li>
@stop

@section('content')
    <div class="clearfix">
        <h1 class="left">Vehicles</h1>
        <a href="{{ route('vehicles.create') }}" class="right button radius">Add new vehicle</a>
    </div>

    <table class="fullWidth" id="dmsp-table">
        <thead>
            <tr>
                <th width="10%">ID</th>
                <th width="30%">Supplier</th>
                <th width="17.50%">Make</th>
                <th width="17.5%">Model</th>
                <th width="15%">Registration #</th>
                <th width="10%">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehicles as $vehicle)
                <tr>
                    <td>{{ $vehicle->id }}</td>
                    <td>{{ $vehicle->supplier->name }}</td>
                    <td>{{ $vehicle->vehicleModel->vehicleMake->make }}</td>
                    <td>{{ $vehicle->vehicleModel->model }}</td>
                    <td>{{ $vehicle->registration_number }}</td>
                    <td class="actions">
                        <a href="{{ route('vehicles.show', $vehicle->id) }}" class="button tiny radius">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop