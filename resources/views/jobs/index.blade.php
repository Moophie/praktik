@extends('layouts/app')

@section('title')
    Jobs
@endsection

@section('content')

    @component('components/navbar')

    @endcomponent

    <div class="Wrapper bg-light">
        <h1>All jobs</h1>
        <ul class="list-group list-group-flush">
            @foreach ($jobs as $job)
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
