@extends('layouts/app')

@section('title')
Student settings
@endsection

@section('content')
@component('components/navbar')

@endcomponent

<div class="Wrapper bg-light">
    <h1>Profile settings</h1>
    This is where you can make changes to your profile!
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
</div>

@endsection