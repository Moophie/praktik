@extends('layouts/app')

@section('title')
    {{ $user->firstname }} {{ $user->lastname }}
@endsection

@section('content')

    @component('components/navbar')

    @endcomponent

    <div class="Wrapper bg-light">
        <img src="{{ asset('/storage/images/' . $user->profilepic) }}" alt="Profile picture" height="150px">
        <h1>{{ $user->firstname }} {{ $user->lastname }}</h1>
        <p>This is a student description!</p>
        <h3>Portfolio</h3>
        @if (empty($user->portfolio))
            <p>This user has no portfolio items</p>
        @else
            <?php $portfolioLinks = explode(',', $user->portfolio); ?>
            <ol class="portfolio">
                @foreach ($portfolioLinks as $picture)
                    <li class="portfolio-picture">
                        <img src="{{ $picture }}" alt="">
                    </li>
                @endforeach
            </ol>
        @endif
    </div>

@endsection
