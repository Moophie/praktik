@extends('layouts/app')

@section('title')
Homepage
@endsection

@section('content')
<h1>Homepage</h1>
<div class="container">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <img class="navbar-brand" id="menuLogo" src="images/logo.png" alt="logo">
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/signup">Signup</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/settings">Student settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/settingspro">Professional settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/company">Company profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/student">Student profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Log out</a>
                </li>
            </ul>
        </div>
    </nav>

    <ul class="vacancies bg-light">
        <li><a href="/vacancy">Vacancy 1</a></li>
        <li><a href="/vacancy">Vacancy 2</a></li>
        <li><a href="/vacancy">Vacancy 3</a></li>
    </ul>
</div>

@endsection