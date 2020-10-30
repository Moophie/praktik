@extends('layouts/app')

@section('title')
Company
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
<div class="wrapper bg-light">
    <img class="companyLogo" src="images/googleLogo.png" alt="logo google">
    <h1>Google</h1>
    <p>Description goes here!</p>
    <h3>Practical information</h3>
    <img src="https://via.placeholder.com/150" alt="">
    <img src="https://via.placeholder.com/150" alt="">
    <img src="https://via.placeholder.com/150" alt="">

    <h3>Internships</h3>
    <li>please</li>
    <li>apply</li>
    <li>we</li>
    <li>need</li>
    <li>interns</li>

    <h3>Reviews</h3>
    <article>Their coffee tastes like dirt, beautiful campus though!</article>
    <p>- John Doe</p>
</div>

@endsection