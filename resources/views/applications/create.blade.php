@extends('layouts/app')

@section('title')
New application
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
                <a class="nav-link" href="/applications">Applications</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Log out</a>
            </li>
        </ul>
    </div>
</nav>

<div class="wrapper bg-light">
    <h1>Apply for job</h1>
    <form action="/applications" method="post">
        {{ csrf_field() }}

        <label for="message">Write a motivation letter</label>
        <br>
        <textarea name="message" id="message" cols="30" rows="10"></textarea>
        <br><br>

        <!-- deze input moet later weg natuurlijk !! -->
        <label for="job_id">Job id</label>
        <input type="number" name="job_id" id="job_id">
        <br><br>

        <label for="user_id">User id</label>
        <input type="number" name="user_id" id="user_id">
        <br><br>

        <input type="submit" value="Submit">
    </form>
</div>

@endsection