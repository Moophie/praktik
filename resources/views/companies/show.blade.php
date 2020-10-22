<?php

$lat = $company->geolat;
$lng = $company->geolng;

$nearest_station = DB::select("SELECT name, SQRT(POW(69.1 * (latitude - $lat), 2) + POW(69.1 * ($lng - longitude) * COS(latitude / 57.3), 2)) 
AS distance
FROM stations 
ORDER BY distance 
LIMIT 1");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $company->name }}</title>
</head>

<body>
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
    <h3>{{ $company->pubtrans_score }}/5</h3>
    <h3>Nearest Station</h3>
    {{ $nearest_station[0]->name }}
</body>

</html>
