<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List of companies</title>
</head>
<body>
    <button class="btn btn-primary"><a href="/companies/create">Create your own</a></button>
    
    <h1>All companies</h1>

    @foreach ($companies as $company)
        <h3><a href="/companies/{{ $company->id }}">{{ $company->name }}</a></h3>
        <h5>{{ $company->city }}</h3>
        <p>{{ $company->description }}</p>
    @endforeach

</body>
</html>