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
        <h5>Inleiding</h5>
        <p>{{ $user->inleiding }}</p>
        <h5>Website</h5>
        <a href="{{ $user->website }}" target="_blank" rel="noopener noreferrer">{{ $user->website }}</a>
        <h5>Taalvoorkeur</h5>
        <p>{{ $user->taalvoorkeur }}</p>
        <h5>Telefoon</h5>
        <p>{{ $user->telefoon }}</p>
        <h5>Portfolio</h5>
        
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
