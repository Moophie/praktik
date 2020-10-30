@extends('layouts/app')

@section('title')
    Companies
@endsection

@section('extrascripts')
    <script src=" {{ asset('js/ajax.js') }}"></script>
@endsection

@section('csrftoken')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

    @component('components/navbar')

    @endcomponent


    <div class="wrapper bg-light">
        <form method="POST" action="/companies">
            <h1>Your company <button type="submit" class="btn btn-primary float-right">Save Company</button></h1>
            @csrf

            <div class="form-group row">
                <input value="3" type="text" class="form-control" id="user_id" name="user_id" hidden>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Latitude</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="geolat" name="geolat" step="any">
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Longitude</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="geolng" name="geolng" step="any">
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Company name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name">
                </div>
            </div>

            <div class="form-group row">
                <label for="city" class="col-sm-2 col-form-label">City</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="city" name="city">
                </div>
            </div>

            <div class="form-group row">
                <label for="address" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="address" name="address">
                </div>
            </div>

            <div class="form-group row">
                <label for="logo" class="col-sm-2 col-form-label">Logo</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="logo" name="logo">
                </div>
            </div>

            <div class="form-group row">
                <label for="website" class="col-sm-2 col-form-label">Website</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="website" name="website">
                </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea name="description" class="form-control" id="description" cols="30" rows="6"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email">
                </div>
            </div>

            <div class="form-group row">
                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control" id="phone" name="phone">
                </div>
            </div>
        </form>
    </div>
@endsection
