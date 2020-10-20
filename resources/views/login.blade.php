<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Login</h1>
        </div>
    </div>

    <div class="container">
        <div class="loginForm">
            <form action="" method="post">
                @auth
                <div class="alert alert-info">We are logged in!</div>
                @endauth

                {{ csrf_field() }}
                <label for="email">Email</label>
                <input type="email" name="email" id="email">

                <label for="password">Password</label>
                <input type="password" name="password" id="password">

                <input type="submit" value="Login">
            </form>
        </div>
    </div>
</body>

</html>