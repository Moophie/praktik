@extends('layouts/app')

@section('title')
    Students
@endsection

@section('content')

    @component('components/navbar')

    @endcomponent

    <div class="wrapper bg-light">
        <h1>All Students</h1>
        @foreach ($students as $student)
            <div class="jumbotron">
                <h3><a href="/students/{{ $student->id }}">{{ $student->firstname }}</a></h3>
                <img src="{{ asset('/storage/images/' . $student->profilepic) }}" alt="Profile picture" height="150px">
            </div>
        @endforeach
    </div>

@endsection
