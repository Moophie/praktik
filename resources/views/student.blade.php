@extends('layouts/app')

@section('title')
Student
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
<div class="studentWrapper bg-light">
    <h1>Plain Jane</h1>
    <p>This is a student description!</p>
    <h3>Portfolio</h3>
    <img src="https://via.placeholder.com/150" alt="">
    <img src="https://via.placeholder.com/150" alt="">
    <img src="https://via.placeholder.com/150" alt="">
    <h3>CV</h3>
    <li>this</li>
    <li>is</li>
    <li>where</li>
    <li>my</li>
    <li>cv</li>
    <li>goes</li>

</div>

@endsection