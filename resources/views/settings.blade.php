@extends('layouts/app')

@section('title')
    Student settings
@endsection

@section('content')
    @component('components/navbar')

    @endcomponent

    <div class="Wrapper bg-light">
        <h1>Profile settings</h1>
        This is where you can make changes to your profile!
        <h3>Portfolio</h3>
        <p>Add more items to your portfolio</p>
    </div>


@endsection
