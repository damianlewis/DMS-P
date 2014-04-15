@extends('layouts.default')

@section('breadcrumbs')
    <li><a href="/">Dashboard</a></li>
    <li class="current">Vehicle Categories</li>
@stop

@section('content')
    <div class="clearfix">
        <h1 class="left">Vehicle Categories</h1>
        <a href="{{ route('vehiclecategories.create') }}" class="right button radius">Add New</a>
    </div>

    <table class="fullWidth" id="dmsp-table">
        <thead>
            <tr>
                <th width="10%">ID</th>
                <th width="65%">Category</th>
                <th width="25%">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehiclecategories as $vehiclecategory)
                <tr>
                    <td>{{ $vehiclecategory->id }}</td>
                    <td>{{ $vehiclecategory->category }}</td>
                    <td>
                        <ul class="button-group actions">
                            <li><a href="{{ route('vehiclecategories.edit', $vehiclecategory->id) }}" class="button tiny">Edit</a></li>
                            <li>
                                {{ Form::open(['route'=>array('vehiclecategories.destroy', $vehiclecategory->id)]) }}
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