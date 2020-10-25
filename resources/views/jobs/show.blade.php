<h1>{{ $job->name }}</h1>
<h3><a href="#">Company {{ $job->company_id }}</a></h3>
<p>{{ $job->description }}</p>
<p>{{ $job->start_date }}</p>

<a href="/applications/create">Apply now</a>