<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create a company</title>
</head>

<body>
    <h1>Your company</h1>
    <form method="POST" action="/companies">
        @csrf

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
