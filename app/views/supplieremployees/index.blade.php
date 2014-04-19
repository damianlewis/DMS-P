@extends('layouts.default')

@section('breadcrumbs')
    <li><a href="/">Dashboard</a></li>
    <li class="current">Supplier Employees</li>
@stop

@section('content')
    <div class="clearfix">
        <h1 class="left">Supplier employees</h1>
        <a href="{{ route('supplieremployees.create') }}" class="right button radius">Add new employee</a>
    </div>

    <table class="fullWidth" id="dmsp-table">
        <thead>
            <tr>
                <th width="10%">ID</th>
                <th width="15%">First name</th>
                <th width="15%">Last name</th>
                <th width="50%">Supplier</th>
                <th width="10%">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($supplierEmployees as $supplierEmployee)
                <tr>
                    <td>{{ $supplierEmployee->id }}</td>
                    <td>{{ $supplierEmployee->first_name }}</td>
                    <td>{{ $supplierEmployee->last_name }}</td>
                    <td>{{ $supplierEmployee->supplier->name }}</td>
                    <td class="actions">
                        <a href="{{ route('supplieremployees.show', $supplierEmployee->id) }}" class="button tiny radius">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop