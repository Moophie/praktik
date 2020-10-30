<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applications</title>
</head>

<body>
    <h1>Applications</h1>
    <label for="search">Search by name</label>
    <input type="text" name="search" id="search">
    <input type="submit" value="Search">
    <br><br>

    <label for="filter">Filter by label</label>
    <select name="filter" id="filter">
        <option value="new">New</option>
        <option value="starred">Starred</option>
        <option value="approved">Approved</option>
        <option value="declined">Declined</option>
    </select>
    <input type="submit" value="Go">
    <br><br>

    @foreach( $applications as $app )
    <a href="/applications/{{ $app->id }}"><h3>User {{ $app->user_id }} for job {{ $app->job_id }}</h3></a>
    <p>{{ $app->message }}</p>
    <h5>Label {{ $app->label_id }}</h5>
    @endforeach
</body>

</html>