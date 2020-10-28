@extends('layouts/app')

@section('title')
Company settings
@endsection

@section('content')
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
    <h1>Company page settings</h1>
    <h3>Change description</h3>
    <h3>Add vacancies</h3>

@endsection
