@extends('layouts/app')

@section('title')
Student
@endsection

@section('content')
@component('components/navbar')

@endcomponent

<div class="Wrapper bg-light">
    @if(Auth::check())
    @if(Auth::user()->profilepic)
    <img src="{{ asset('/storage/images/'.Auth::user()->profilepic) }}" alt="profile picture" width="150px">
    @endif
    <h1>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h1>
    @else
    <div class="alert alert-info">Please log in</div>
    @endif
    <p>This is a student description!</p>
    <h3>Portfolio</h3>
    @if(!Auth::user()->portfolio)
    <p>You don't have any portfolio items yet.</p>
    <button class="btn btn-primary "><a href="/settings" style="color:white">Upload portfolio</a></button>
    <br>
    <br>
    @else
    <?php
    $portfolioLinks = (explode(",", Auth::user()->portfolio));
    // var_dump($portfolioLinks);
    ?>
    <ol class="portfolio">
        @foreach($portfolioLinks as $picture)
        <li class="portfolio-picture">
            <img src="{{ $picture }}" alt="">
        </li>
        @endforeach
    </ol>
    @endif
    <h3>CV</h3>
    @if(!Auth::user()->cv)
    <p>You didn't upload a CV yet.</p>
    <button class="btn btn-primary "><a href="/settings" style="color:white">Upload CV</a></button>
    @else
    <?php
    $cv = Auth::user()->cv;
    var_dump($cv);
    ?>
    @endif
</div>

@endsection