@extends('layouts/app')

@section('title')
jobs
@endsection

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="/"><img class="navbar-brand" id="menuLogo" src="images/logo.png" alt="logo"></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/jobs">jobs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/student">Student</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/settings">Student settings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/settingspro">Professional settings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/companies">Companies</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/student">Student profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/companies">Student profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Log out</a>
            </li>
        </ul>
    </div>
</nav>
<div class="jobsWrapper bg-light">
    <h1>All jobs</h1>
    <ul class="list-group list-group-flush">
        @foreach( $jobs as $job )
        <li class="list-group-item"><a href="/jobs/{{ $job->id }}">{{ $job->name }}</a></li>
        @endforeach
    </ul>
</div>

<footer class="footerLink">
    <div class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/jobs/create">Create job</a>
                </li>
            </ul>
        </div>
    </div>
</footer>

@endsection