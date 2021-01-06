@extends('layouts/app')

@section('title')
    Students
@endsection

@section('content')

    @component('components/navbar')

    @endcomponent

    <div class="wrapper bg-light">
        <h1>All Students</h1>
        
        @foreach ($users as $user)
            <div class="jumbotron">
                <h3><a href="/users/{{ $user->id }}">{{ $user->firstname }}</a></h3>
                <img src="{{ asset('/storage/images/' . $user->profilepic) }}" alt="Profile picture" height="150px">
                <a href="{{ $user->website }}" target="_blank" rel="noopener noreferrer">{{ $user->website }}</a>
            </div>
        @endforeach

    </div>

@endsection
