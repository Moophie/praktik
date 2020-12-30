@extends('layouts/app')

@section('title')
    Jobs
@endsection

@section('content')

    @component('components/navbar')

    @endcomponent
    <div class="jobsWrapper bg-light">
        <h1>{{ $job->name }}</h1>
        <h3>at <a href="/companies/{{ $job->company->id }}">{{ $job->company->name }}</a></h3>
        <p>{{ $job->description }}</p>
        <p>You will start on: {{ $job->start_date }}</p>

        <button><a href="{{ '/jobs/' . $job->id . '/create' }}">Apply now</a></button>
    </div>

@endsection
