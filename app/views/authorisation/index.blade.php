@extends('layouts.default')

@section('breadcrumbs')
    <li><a href="/">Dashboard</a></li>
    <li class="current">Facilities</li>
@stop

@section('content')
    <div class="clearfix">
        <h1 class="left">Facilities</h1>
    </div>

    <table class="fullWidth" id="dmsp-table">
        <thead>
            <tr>
                <th width="90%">Facility</th>
                <th width="10%">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($facilities as $facility)
                <tr>
                    <td>{{ $facility->name }}</td>
                    <td class="actions">
                        <a href="{{ route('authorisation.show', $facility->id) }}" class="button tiny radius">Select</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop