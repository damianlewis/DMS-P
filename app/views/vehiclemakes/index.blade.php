@extends('layouts.default')

@section('breadcrumbs')
    <li><a href="/">Dashboard</a></li>
    <li class="current">Vehicle Makes</li>
@stop

@section('content')
    <div class="clearfix">
        <h1 class="left">Vehicle Makes</h1>
        <a href="{{ route('vehiclemakes.create') }}" class="right button radius">Add New</a>
    </div>

    <table class="fullWidth" id="dmsp-table">
        <thead>
            <tr>
                <th width="10%">ID</th>
                <th width="65%">Make</th>
                <th width="25%">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehiclemakes as $vehiclemake)
                <tr>
                    <td>{{ $vehiclemake->id }}</td>
                    <td>{{ $vehiclemake->make }}</td>
                    <td>
                        <ul class="button-group actions">
                            <li><a href="{{ route('vehiclemakes.edit', $vehiclemake->id) }}" class="button tiny">Edit</a></li>
                            <li>
                                {{ Form::open(['route'=>array('vehiclemakes.destroy', $vehiclemake->id)]) }}
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