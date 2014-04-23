@extends('layouts.default')

@section('breadcrumbs')
    <li class="current">Dashboard</li>
@stop

@section('content')
    <h1>Welcome to DMS-P</h1>

    <div class="row">
        <div class="small-12 columns">
            <img data-interchange="[/img/photo-0041-small.png, (small)], [/img/photo-0041.png, (large)]">
        </div>
    </div>

    <hr>
    
    <div class="row">
        <div class="small-12 columns">
            <p>Putabam equidem satis, inquit, me dixisse. Quid igitur, inquit, eos responsuros putas? Neque solum ea communia, verum etiam paria esse dixerunt. Eadem fortitudinis ratio reperietur. Duo Reges: constructio interrete. Igitur neque stultorum quisquam beatus neque sapientium non beatus. Experiamur igitur, inquit, etsi habet haec Stoicorum ratio difficilius quiddam et obscurius. Non dolere, inquam, istud quam vim habeat postea videro; Eadem nunc mea adversum te oratio est. Sed in rebus apertissimis nimium longi sumus.</p>
        </div>
    </div>

    <div class="row">
        <div class="small-12 columns">
            @unless (Auth::check())
                <a href="{{ route('login') }}" class="button radius">Login</a>
            @endunless
        </div>
    </div>
@stop