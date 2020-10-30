@extends('layouts/app')

@section('title')
    Companies
@endsection

@section('content')

    @component('components/navbar')

    @endcomponent

    <button class="btn btn-primary"><a href="/companies/create">Create your own</a></button>

    <h1>All companies</h1>

    @foreach ($companies as $company)
        <h3><a href="/companies/{{ $company->id }}">{{ $company->name }}</a></h3>
        <h5>{{ $company->city }}</h5>
        <p>{{ $company->description }}</p>
    @endforeach

@endsection
