@extends('layouts/app')

@section('title')
    {{ $company->name }}
@endsection

@section('content')

    @component('components/navbar')

    @endcomponent

    <div class="wrapper bg-light">


        <div id="apply">
            <button v-on:click="say('You applied at {{ $company->name }}')">Apply now</button>
        </div>
        

        <h1>{{ $company->name }}</h1>
        <h3>{{ $company->city }}</h3>
        <h5>{{ $company->address }}</h5>
        <img src="{{ $company->logo }}" alt="Company logo">
        <br>
        <br>

        <h3 class="clear-both">Description</h3>
        <p>{{ $company->description }}</p>

        <!-- <h3>Internships</h3> -->

        <h3>Rating</h3>
        <p>{{ $company->rating }}/5</p>

        <h3>Contact</h3>
        <p>Website: {{ $company->website }}</p>
        <p>Email: {{ $company->email }}</p>
        <p>Phone: {{ $company->phone }}</p>

        <h3>Accessibility</h3>
        <p>{{ $company->pubtrans_score }}/3</p>
        <h3>Nearest Station</h3>
        <p>{{ $nearest_station[0]->name }}</p>
    </div>

@endsection
