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
<h1>Profile settings</h1>
@if (Auth::check())
<h3>Hello {{ Auth::user()->firstname }}!</h3>
@else
<div class="alert alert-warning">Please log in</div>
@endif
<p>This is where you can make changes to your profile!</p>

<form action="/upload" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    <label for="image">Profile picture</label><br>
    <input type="file" name="image">
    <br>
    <br>
    <label for="cv">CV</label><br>
    <input type="file" name="cv">
    <br><br>
    <input type="submit" value="Upload">
</form>
<br>
<h3>Portfolio</h3>
<a href="/dribbble" class="button">Import shots from Dribbble</a>

@endsection