@extends('layouts/app')

@section('title')
    Applications
@endsection

@section('content')

    @component('components/navbar')

    @endcomponent

    <div class="wrapper bg-light">
        <h1>Applications</h1>
        <label for="search">Search by name</label>
        <input type="text" name="search" id="search">
        <input type="submit" value="Search">
        <br><br>

        <label for="filter">Filter by label</label>
        <select name="filter" id="filter">
            <option value="new">New</option>
            <option value="starred">Starred</option>
            <option value="approved">Approved</option>
            <option value="declined">Declined</option>
        </select>
        <input type="submit" value="Go">
        <br><br>

        @foreach ($applications as $app)
            <a href="/applications/{{ $app->app_id }}">
                <h3>{{ $app->user->firstname }} {{ $app->user->lastname }} applied for "{{ $app->job->name }}"</h3>
            </a>
            <p>{{ $app->message }}</p>
            <h5>label: {{ $app->label->name }}</h5>
        @endforeach
        
    </div>
@endsection
