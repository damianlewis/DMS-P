@extends('layouts.default')

@section('breadcrumbs')
    <li><a href="/">Dashboard</a></li>
    <li class="current">Facilities</li>
@stop

@section('content')
    <div class="clearfix">
        <h1 class="left">Facilities</h1>
        <a href="{{ route('facilities.create') }}" class="right button radius">Add new facility</a>
    </div>

    <table class="fullWidth" id="dmsp-table">
        <thead>
            <tr>
                <th width="10%">ID</th>
                <th width="65%">Facility</th>
                <th width="15%">Capacity</th>
                <th width="10%">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($facilities as $facility)
                <tr>
                    <td>{{ $facility->id }}</td>
                    <td>{{ $facility->name }}</td>
                    <td>{{ $facility->capacity }}</td>
                    <td class="actions">
                        <a href="{{ route('facilities.show', $facility->id) }}" class="button tiny radius">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop