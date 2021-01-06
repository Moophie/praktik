@extends('layouts/app')

@section('title')
    Your companies
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

        @if(!empty($company))

        <form method="POST" action="" enctype="multipart/form-data">
            <h1>Your company <button type="submit" class="btn btn-primary float-right">Update Company</button></h1>
            @csrf

            <input type="text" class="form-control" id="user_id" name="user_id" value="{{ $company->user_id }}" hidden>
            <input type="number" class="form-control" id="geolat" name="geolat" step="any" value="{{ $company->geolat }}"
                hidden>
            <input type="number" class="form-control" id="geolng" name="geolng" step="any" value="{{ $company->geolng }}"
                hidden>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Company name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" required value="{{ $company->name }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="city" class="col-sm-2 col-form-label">City</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="city" name="city" required value="{{ $company->city }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="address" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="address" name="address" required value="{{ $company->address }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="logo" class="col-sm-2 col-form-label">Logo</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control-file" id="logo" name="logo" value="{{ $company->logo }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="website" class="col-sm-2 col-form-label">Website</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="website" name="website" required value="{{ $company->website }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea name="description" class="form-control" id="description" cols="30" rows="6"
                        required>{{ $company->description }}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" required value="{{ $company->email }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control" id="phone" name="phone" required value="{{ $company->phone }}">
                </div>
            </div>
        </form>

        @else 
        
        <h2>There's no company linked to this user.</h2>

        @endif
        
    </div>

@endsection
