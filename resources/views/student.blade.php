@extends('layouts/app')

@section('title')
    Student
@endsection

@section('content')

    @component('components/navbar')

    @endcomponent

    <div class="Wrapper bg-light">
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
