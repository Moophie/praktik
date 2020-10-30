@extends('layouts/app')

@section('title')
Student settings
@endsection

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <img class="navbar-brand" id="menuLogo" src="images/logo.png" alt="logo">
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="/applications/create">applications</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Log out</a>
                </li>
            </ul>
        </div>
    </nav>
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

    @foreach( $applications as $app )
    <a href="/applications/{{ $app->id }}"><h3>User {{ $app->user_id }} for job {{ $app->job_id }}</h3></a>
    <p>{{ $app->message }}</p>
    <h5>Label {{ $app->label_id }}</h5>
    @endforeach
    @endsection
