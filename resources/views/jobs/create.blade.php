@extends('layouts/app')

@section('title')
    Create job
@endsection

@section('content')

    @component('components/navbar')

    @endcomponent

    <div class="wrapper bg-light">
        <form action="/jobs" method="post">
            <h1>Add new job listing <input type="submit" value="Submit" class="btn btn-primary float-right"></h1>

            {{ csrf_field() }}

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Job title</label>
                <div class="col-sm-10">
                    <input type="text" name="name" id="name" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="start_date" class="col-sm-2 col-form-label">Start date</label>
                <div class="col-sm-10">
                    <input type="date" name="start_date" id="start_date" class="form-control">
                </div>
            </div>

            <!-- Only for testing -->
            <div class="form-group row">
                <label for="company_id" class="col-sm-2 col-form-label">Company_id (testing)</label>
                <div class="col-sm-10">
                    <input type="number" name="company_id" id="company_id" class="form-control">
                </div>
            </div>
        </form>
    </div>

@endsection
