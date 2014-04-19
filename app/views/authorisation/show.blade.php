@extends('layouts.default')

@section('breadcrumbs')
    <li><a href="/">Dashboard</a></li>
    <li><a href="{{ route('authorisation.index') }}">Facilities</a></li>
    <li class="current">Deliveries</li>
@stop

@section('content')
    <div class="clearfix">
        <h1 class="left">{{ $facility->name }}</h1>
    </div>

    <table class="fullWidth" id="dmsp-table">
        <thead>
            <tr>
                <th width="10%">ID</th>
                <th width="15%">Date</th>
                <th width="10%">Time</th>
                <th width="45%">Supplier</th>
                <th width="10%">Status</th>
                <th width="10%">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($facility->drops as $drop)
                <tr>
                    <td>{{ $drop->delivery->id }}</td>
                    <td>{{ date("jS F Y", strtotime($drop->delivery->date)) }}</td>
                    <td>{{ date("H:i", strtotime($drop->time_slot)) }}</td>
                    <td>{{ $drop->delivery->supplierEmployees->first()->supplier->name }}</td>
                    <td>{{ $drop->dropStatus->status }}</td>
                    <td class="actions">
                        <a href="{{ route('authorisation.drop', $drop->id) }}" class="button tiny radius">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop