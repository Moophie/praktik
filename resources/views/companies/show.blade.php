<?php

$lat = $company->geolat;
$lng = $company->geolng;

$nearest_station = DB::select("SELECT name, SQRT(POW(111.2 * (latitude - $lat), 2) + POW(111.2 * ($lng - longitude) *
COS(latitude / 57.3), 2))
AS distance FROM stations ORDER BY distance LIMIT 1");
?>

@extends('layouts/app')

@section('title')
    {{ $company->name }}
@endsection

@section('content')

    @component('components/navbar')

    @endcomponent

    <h1>{{ $company->name }}</h1>
    <h3>{{ $company->city }}</h3>
    <h5>{{ $company->address }}</h5>
    <img src="{{ $company->logo }}" alt="">
    <p>{{ $company->description }}</p>
    <p>{{ $company->website }}</p>

    <h3>Internships</h3>
    <li>please</li>
    <li>apply</li>
    <li>we</li>
    <li>need</li>
    <li>interns</li>

    <h3>Rating</h3>
    <h3>{{ $company->rating }}/5</h3>
    <article>Their coffee tastes like dirt, beautiful campus though!</article>
    <p>- John Doe</p>

    <h3>Contact</h3>
    <p>{{ $company->email }}</p>
    <p>{{ $company->phone }}</p>

    <h3>Accessibility</h3>
    <h3>{{ $company->pubtrans_score }}/3</h3>
    <h3>Nearest Station</h3>
    {{ $nearest_station[0]->name }}
    
@endsection
