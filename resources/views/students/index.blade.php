@extends('layouts/app')

@section('title')
    Students
@endsection

@section('content')

    @component('components/navbar')

    @endcomponent

    <div class="wrapper bg-light">
        <button class="btn btn-primary "><a href="/profile" style="color:white">Update your profile</a></button>
        <br>
        <br>

        <h1>All Students</h1>

        @foreach ($students as $student)
            <div class="jumbotron">
                <h3><a href="/students/{{ $student->id }}">{{ $student->firstname }}</a></h3>
            </div>
        @endforeach
    </div>

@endsection
