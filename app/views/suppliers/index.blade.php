@extends('layouts.default')

@section('breadcrumbs')
    <li><a href="/">Dashboard</a></li>
    <li class="current">Suppliers</li>
@stop

@section('content')
    <div class="clearfix">
        <h1 class="left">Suppliers</h1>
        <a href="{{ route('suppliers.create') }}" class="right button radius">Add new supplier</a>
    </div>

    <table class="fullWidth" id="dmsp-table">
        <thead>
            <tr>
                <th width="10%">ID</th>
                <th width="50%">Supplier</th>
                <th width="15%">Vehicles</th>
                <th width="15%">Staff</th>
                <th width="10%">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suppliers as $supplier)
                <tr>
                    <td>{{ $supplier->id }}</td>
                    <td>{{ $supplier->name }}</td>
                    <td>{{ count($supplier->vehicles) }}</td>
                    <td>{{ count($supplier->staff) }}</td>
                    <td class="actions">
                        <a href="{{ route('suppliers.show', $supplier->id) }}" class="button tiny radius">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop