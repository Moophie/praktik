<h1>All jobs</h1>
@foreach( $jobs as $job )
    <h3><a href="/job/{{ $job->id }}">{{ $job->name }}</a></h3>
@endforeach