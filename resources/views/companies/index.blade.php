@extends('layouts/app')

@section('title')
    Companies
@endsection

@section('content')

    @component('components/navbar')

    @endcomponent

    <div class="wrapper bg-light">
        <button class="btn btn-primary "><a href="/companies/create" style="color:white">Create your own</a></button>
        <br>
        <br>

        <h1>All companies</h1>

        @foreach ($companies as $company)
            <div class="jumbotron">
                <h3><a href="/companies/{{ $company->id }}">{{ $company->name }}</a></h3>
                <h5>{{ $company->city }}</h5>
                <p>{{ $company->description }}</p>
            </div>
        @endforeach
    </div>

@endsection
