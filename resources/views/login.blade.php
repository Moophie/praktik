@extends('layouts/app')

@section('title')
    Login
@endsection

@section('content')
    <div class="loginContainer">
        <div class="">
            <div class="header">
                <h1>Login</h1>
            </div>
        </div>

        <div class="">
            <div class="loginForm">
                <form action="" method="post">
                    @auth
                        <div class="alert alert-info">You are logged in!</div>
                    @endauth

                    {{ csrf_field() }}
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" id="email">

                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password">

                    <input class="btn btn-primary" type="submit" value="Login">
                </form>
            </div>
        </div>
    </div>

@endsection
