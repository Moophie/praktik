@extends('layouts/app')

@section('title')
Jobs
@endsection

@section('content')

@component('components/navbar')

@endcomponent
<div class="jobsWrapper bg-light">
    <h1>{{ $job->name }}</h1>
    <h3><a href="#">Company {{ $job->company_id }}</a></h3>
    <p>{{ $job->description }}</p>
    <p>{{ $job->start_date }}</p>

    <button><a href="{{ '/jobs/' . $job->id . '/create' }}">Apply now</a></button>
</div>


@endsection