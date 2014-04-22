@extends('layouts.default')

@section('breadcrumbs')
    <li><a href="/">Dashboard</a></li>
    <li class="current">Error</li>
@stop

@section('content')
    <h1>Error</h1>

    <p>I'm sorry but you do not have the permissions required to view this page</p>
    
    @unless (Auth::check())
        <a href="{{ route('login') }}" class="button radius">Login</a>
    @endunless
@stop