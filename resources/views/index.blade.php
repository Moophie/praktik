@extends('layouts/app')

@section('title')
    Homepage
@endsection

@section('content')

    @component('components/navbar')

    @endcomponent

    <div class="sidenav">
        <div class="sideWrapper">
            <h3>Filters</h3>
            <form action="">
                <h4>Title</h4>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Default checkbox
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Default checkbox
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Default checkbox
                    </label>
                </div>
            </form>

            <form action="">
                <h4>Title</h4>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Default checkbox
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Default checkbox
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Default checkbox
                    </label>
                </div>
            </form>

            <form action="">
                <h4>Title</h4>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Default checkbox
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Default checkbox
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Default checkbox
                    </label>
                </div>
            </form>
            <button class="btn btn-primary">Save Filter</button>


        </div>


    </div>

    <div class="vacancyWrapper">
        <h3>Internship vacancies</h3>
        <div class="Vacancy bg-light">
            <h4>Stagiar developer gezocht</h4>
            <article>Looking for an enthousiastic Javascript developer! Yada yada</article>
            <img src="https://via.placeholder.com/150" alt="">
            <img src="https://via.placeholder.com/150" alt="">
            <img src="https://via.placeholder.com/150" alt="">
        </div>
        <div class="Vacancy bg-light">
            <h4>Stagiar developer gezocht</h4>
            <article>Looking for an enthousiastic Javascript developer! Yada yada</article>
            <img src="https://via.placeholder.com/150" alt="">
            <img src="https://via.placeholder.com/150" alt="">
            <img src="https://via.placeholder.com/150" alt="">
        </div>
        <div class="Vacancy bg-light">
            <h4>Stagiar developer gezocht</h4>
            <article>Looking for an enthousiastic Javascript developer! Yada yada</article>
            <img src="https://via.placeholder.com/150" alt="">
            <img src="https://via.placeholder.com/150" alt="">
            <img src="https://via.placeholder.com/150" alt="">
        </div>
    </div>
    <footer class="footerMain">
        <div class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <div class="bg-light">
                        <li class="nav-item">
                            <a class="nav-link" href="/signup">Signup</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Login</a>
                        </li>
                    </div>
                </ul>
            </div>
        </div>
    </footer>



@endsection
