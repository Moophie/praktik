@extends('layouts/app')

@section('title')
    New application
@endsection

@section('content')

    @component('components/navbar')

    @endcomponent

    <div class="wrapper bg-light">
        <h1>Apply for job</h1>
        <form action="/applications" method="post">
            {{ csrf_field() }}

            <label for="message">Write a motivation letter</label>
            <br>
            <textarea name="message" id="message" cols="30" rows="10"></textarea>
            <br><br>

            <!-- deze input moet later weg natuurlijk !! -->
            <label for="job_id">Job id</label>
            <input type="number" name="job_id" id="job_id">
            <br><br>

            <label for="user_id">User id</label>
            <input type="number" name="user_id" id="user_id">
            <br><br>

            <input type="submit" value="Submit">
        </form>
    </div>

@endsection
