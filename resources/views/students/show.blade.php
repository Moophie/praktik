@extends('layouts/app')

@section('title')
    {{ $student->firstname }} {{ $student->lastname }}
@endsection

@section('content')

    @component('components/navbar')

    @endcomponent

    <div class="Wrapper bg-light">
        <img src="{{ asset('/storage/images/' . $student->profilepic) }}" alt="Profile picture" height="150px">
        <h1>{{ $student->firstname }} {{ $student->lastname }}</h1>
        <p>This is a student description!</p>
        <h3>Portfolio</h3>
        @if (empty($student->portfolio))
            <p>This user has no portfolio items</p>
        @else
            <?php $portfolioLinks = explode(',', $student->portfolio); ?>
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
