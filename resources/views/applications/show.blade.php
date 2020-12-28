@extends('layouts/app')

@section('title')
{{ $application->user->lastname }} for {{ $application->job->name }}
@endsection

@section('content')

@component('components/navbar')

@endcomponent
<div class="jobsWrapper bg-light">
    <div class="container">
        <div class="top">
            <h1>Application for {{ $application->job->name }}</h1>
            <h3>by {{ $application->user->firstname }} {{ $application->user->lastname }}</h3>
            <p>on {{ $application->updated_at }} — {{$application->label->name }} <a href="">change label</a></p>
        </div>
    </div>

    <br>

    <div class="container">
        <div class="letter"> </div>
        <article>{{ $application->message }}</article>

        <br>

        <div class="cv">
            @if(isset($application->cv))
            <a href="{{ $application->dribbble_url }}"></a>
            <p>{{ $application->cv }}</p>
            @else
            <p>No cv submitted.</p>
            @endif
        </div>

        <br>

        <div class="portfolio">
            @if(isset($application->dribbble_url))
            <a href="{{ $application->dribbble_url }}"></a>
            <p>{{ $application->portfolio }}</p>
            @else
            <p>No portfolio submitted.</p>
            @endif
        </div>

        <div class="contact">
            <h5>Contact information</h4>
            @if(isset($application->user->email))
            <a href="mailto:{{ $application->user->email }}">{{ $application->user->email }}</a>
            @else
            <p>No email given.</p>
            @endif
        </div>
    </div>



</div>


@endsection