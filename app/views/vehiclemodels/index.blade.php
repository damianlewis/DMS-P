@extends('layouts.default')

@section('breadcrumbs')
    <li><a href="/">Dashboard</a></li>
    <li class="current">Vehicle Models</li>
@stop

@section('content')
    <div class="clearfix">
        <h1 class="left">Vehicle Models</h1>
        <a href="{{ route('vehiclemodels.create') }}" class="right button radius">Add New</a>
    </div>

    <table class="fullWidth" id="dmsp-table">
        <thead>
            <tr>
                <th width="10%">ID</th>
                <th width="32.5%">Make</th>
                <th width="32.5%">Model</th>
                <th width="25%">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehiclemodels as $vehiclemodel)
                <tr>
                    <td>{{ $vehiclemodel->id }}</td>
                    @if (!empty($vehiclemodel->vehicleMake->make))
                        <td>{{ $vehiclemodel->vehicleMake->make }}</td>
                    @else
                        <td><span class="label secondary radius">No make</span></td>
                    @endif
                    <td>{{ $vehiclemodel->model }}</td>
                    <td>
                        <ul class="button-group actions">
                            <li><a href="{{ route('vehiclemodels.edit', $vehiclemodel->id) }}" class="button tiny">Edit</a></li>
                            <li>
                                {{ Form::open(['route'=>array('vehiclemodels.destroy', $vehiclemodel->id)]) }}
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