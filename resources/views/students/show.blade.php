@extends('layouts/app')

@section('title')
{{ $student->firstname }} {{ $student->lastname }}
@endsection

@section('content')

@component('components/navbar')

@endcomponent

<div class="Wrapper bg-light">
    @if(Auth::user()->profilepic)
    <img src="{{ asset('/storage/images/'.Auth::user()->profilepic) }}" alt="profile picture" height="150px">
    @endif
    <h1>{{ $student->firstname }} {{ $student->lastname }}</h1>
    <p>This is a student description!</p>
    <h3>Portfolio</h3>
    @if(!Auth::user()->portfolio)
    <p>You don't have any portfolio items yet.</p>
    <button class="btn btn-primary "><a href="/profile" style="color:white">Upload portfolio</a></button>
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
    <button class="btn btn-primary "><a href="/profile" style="color:white">Upload CV</a></button>
    @endif
    <?php
    $cv = Auth::user()->cv;
    // var_dump($cv);
    // $filename = $cv;
    // $path = storage_path($filename);
    // return response()->file($path);
    ?>
</div>

@endsection