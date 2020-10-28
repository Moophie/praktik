@extends('layouts/app')

@section('title')
Student
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
<div class="wrapper">
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