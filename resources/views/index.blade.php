<?php

$parameters = "WHERE 1=1";

if(!empty($_GET)){
    if(!empty($_GET['rating'])){
        $parameters = $parameters . " AND companies.rating >= " . $_GET['rating'];
    }
    if(!empty($_GET['pubtrans_score'])){
        $parameters = $parameters . " AND companies.pubtrans_score >= " . $_GET['pubtrans_score'];
    }
    if(!empty($_GET['start_date'])){
        $parameters = $parameters . " AND jobs.start_date > '" . $_GET['start_date'] . "'";
    }
}

$query = "SELECT jobs.*, companies.name AS compname, companies.rating, companies.pubtrans_score FROM jobs
INNER JOIN companies ON jobs.company_id = companies.id " . $parameters ." LIMIT 10";

$jobs = DB::select($query); ?>

@extends('layouts/app')

@section('title')
    Homepage
@endsection

@section('content')

    @component('components/navbar')

    @endcomponent

    <div class="sidenav">
        <div class="sideWrapper" style="color:white">
            <h3>Filters</h3>
            <form method="GET">
                <div class="form-group">
                    <label for="rating">Rating (1-5)</label>
                    <input type="range" id="rating" class="form-control" name="rating" min="1" max="5" value="1">
                </div>
                <div class="form-group">
                    <label for="pubtrans_score">Public transport (1-3)</label>
                    <input type="range" id="pubtrans_score" class="form-control" name="pubtrans_score" min="1" max="3" value="1">
                </div>
                <div class="form-group">
                    <label for="start_date">Start date</label>
                    <input type="date" id="start_date" class="form-control" name="start_date">
                </div>
                <input type="submit" class="btn btn-primary" value="Filter">
            </form>
        </div>
    </div>

    <div class="vacancyWrapper">

        <h1>Internship vacancies</h1>
        @foreach ($jobs as $job)
            <div class="Vacancy bg-light">
                <h3 style="color:black">{{ $job->name }}</h3>
                <h5>Company: {{ $job->compname }}<span style="font-size:0.7em" class="float-right">Rating: {{ $job->rating }}</span></h5>
                <article>{{ $job->description }}</article>
                <br>
                <p>Starts on: {{ $job->start_date }}</p>
            </div>
        @endforeach
    </div>
@endsection
