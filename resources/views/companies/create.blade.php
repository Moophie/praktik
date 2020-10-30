<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create a company</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src=" {{ asset('js/ajax.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <h1>Your company</h1>
    <form method="POST" action="/companies">
        @csrf

        <div class="form-group">
            <label for="name">user_id</label>
            <input value="3" type="text" class="form-control" id="user_id" name="user_id" >
        </div>

        <div class="form-group">
            <label for="name">geolat</label>
            <input type="number" class="form-control" id="geolat" name="geolat" step="any">
        </div>

        <div class="form-group">
            <label for="name">geolng</label>
            <input type="number" class="form-control" id="geolng" name="geolng" step="any">
        </div>

        <div class="form-group">
            <label for="name">Company name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>

        <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" id="city" name="city">
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address">
        </div>

        <div class="form-group">
            <label for="logo">Logo</label>
            <input type="text" class="form-control" id="logo" name="logo">
        </div>

        <div class="form-group">
            <label for="website">Website</label>
            <input type="text" class="form-control" id="website" name="website">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="tel" class="form-control" id="phone" name="phone">
        </div>


        <button type="submit" class="btn btn-primary">Save Company</button>
    </form>
</body>

</html>
