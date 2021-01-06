@extends('layouts/app')

@section('title')
    Student Profile
@endsection

@section('content')

    @component('components/navbar')
    @endcomponent

    <div class="Wrapper bg-light">
        <h1>Profile settings</h1>

        @if (Auth::user()->profilepic)
            <img src="{{ asset('/storage/images/' . Auth::user()->profilepic) }}" alt="profile picture" height="150px">
        @endif

        <h2>Hello {{ Auth::user()->firstname }}!</h2>
        <p>This is where you can make changes to your profile!</p>

        <form class="form-group" action="/updateinfo" method="POST">
            {{ csrf_field() }}
            <label for="inleiding">About me</label>
            <textarea class="form-control" name="inleiding" id="inleiding" cols="30" rows="10"
                placeholder="Write something about yourself!">{{ Auth::user()->inleiding }}</textarea>
            <label for="telefoon">Telefoon</label>
            <input class="form-control" type="number" name="telefoon" id="telefoon" value="{{ Auth::user()->telefoon }}">
            <label for="postcode">Postcode</label>
            <input class="form-control" type="number" name="postcode" id="postcode" value="{{ Auth::user()->postcode }}">
            <label for="website">Website</label>
            <input class="form-control" type="text" name="website" id="website" value="{{ Auth::user()->website }}">
            <label for="taalvoorkeur">Language preference</label>
            <input class="form-control" type="text" name="taalvoorkeur" id="taalvoorkeur"
                value="{{ Auth::user()->taalvoorkeur }}">
            <input type="submit" class="btn btn-primary" value="Save">
        </form>

        <form class="form-group" action="/upload" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            <label for="image">Profile picture</label><br>
            <input type="file" name="image">
            <br>
            <br>
            <label for="cv">CV</label><br>
            <input type="file" name="cv">
            <br><br>
            <input type="submit" class="btn btn-primary" value="Upload">
        </form>
        <br>
        <h3>Portfolio</h3>
        <form class="form-group" action="/dribbble" method="GET">
            <label for="url">Dribbble URL</label>
            <input class="form-control" type="text" name="url" id="url" placeholder="Please give your Dribbble-profile URL">
            <input type="submit" class="btn btn-primary" value="Get portfolio">
        </form>

        @if (!Auth::user()->portfolio)
            <p>You don't have any portfolio items yet.</p>
        @endif

        <?php $portfolioLinks = explode(',', Auth::user()->portfolio); ?>
        <ol class="portfolio">

            @foreach ($portfolioLinks as $picture)
                <li class="portfolio-picture">
                    <img src="{{ $picture }}" alt="">
                </li>
            @endforeach

        </ol>
    </div>

@endsection
