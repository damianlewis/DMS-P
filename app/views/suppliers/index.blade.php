@extends('layouts.default')

@section('breadcrumbs')
    <li><a href="/">Dashboard</a></li>
    <li class="current">Suppliers</li>
@stop

@section('content')
    <div class="clearfix">
        <h1 class="left">Suppliers</h1>
        <a href="{{ route('suppliers.create') }}" class="right button radius">Add New</a>
    </div>

    <table class="fullWidth" id="dmsp-table">
        <thead>
            <tr>
                <th width="10%">ID</th>
                <th width="32.5%">Supplier</th>
                <th width="32.5%">Vehicles</th>
                <th width="25%">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suppliers as $supplier)
                <tr>
                    <td>{{ $supplier->id }}</td>
                    <td>{{ $supplier->name }}</td>
                    <td>{{ count($supplier->vehicles) }}</td>
                    <td>
                        <ul class="button-group actions">
                            <li><a href="{{ route('suppliers.show', $supplier->id) }}" class="button tiny">View</a></li>
                            <li><a href="{{ route('suppliers.edit', $supplier->id) }}" class="button tiny">Edit</a></li>
                            <li>
                                {{ Form::open(['route'=>array('suppliers.destroy', $supplier->id)]) }}
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