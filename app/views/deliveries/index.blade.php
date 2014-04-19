@extends('layouts.default')

@section('breadcrumbs')
    <li><a href="/">Dashboard</a></li>
    <li class="current">Deliveries</li>
@stop

@section('content')
    <div class="clearfix">
        <h1 class="left">Deliveries</h1>
        <a href="{{ route('deliveries.create') }}" class="right button radius">Add new delivery</a>
    </div>

    <table class="fullWidth" id="dmsp-table">
        <thead>
            <tr>
                <th width="10%">ID</th>
                <th width="15%">Date</th>
                <th width="50%">Supplier</th>
                <th width="15%">Status</th>
                <th width="10%">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($deliveries as $delivery)
                <tr>
                    <td>{{ $delivery->id }}</td>
                    <td>{{ date("jS F Y", strtotime($delivery->date)) }}</td>
                    <td>{{ $delivery->supplierEmployees->first()->supplier->name }}</td>
                    <td>{{ $delivery->deliveryStatus->status }}</td>
                    <td class="actions">
                        <a href="{{ route('deliveries.show', $delivery->id) }}" class="button tiny radius">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop