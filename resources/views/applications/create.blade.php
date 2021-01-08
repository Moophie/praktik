@extends('layouts/app')

@section('title')
    New application
@endsection

@section('content')

    @component('components/navbar')

    @endcomponent

    <div class="wrapper bg-light">
        <h1>Apply for job</h1>
        <form action="{{ route('applications', ['job' => $job]) }}" method="post">
            {{ csrf_field() }}

            <label for="message">Write a motivation letter</label>
            <br>
            <textarea name="message" id="message" cols="30" rows="10"></textarea>
            <br><br>

            <input type="submit" value="Submit">
        </form>
    </div>

@endsection
