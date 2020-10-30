@extends('layouts/app')

@section('title')
    Company settings
@endsection

@section('content')
    @component('components/navbar')

    @endcomponent

    <div class="Wrapper bg-light">
        <h1>Company page settings</h1>
        <h3>Change description</h3>
        <h3>Add vacancies</h3>
        <a href="/newjob">Add new job listing</a>
    </div>

@endsection
