<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Signup</h1>
        </div>
    </div>

    <div class="container">
        <div class="loginForm">
            <form action="" method="post">
                {{ csrf_field() }}
                <label for="firstname">First name</label>
                <input type="text" name="firstname" id="firstname">
                <br>
                <label for="lastname">Last name</label>
                <input type="text" name="lastname" id="lastname">
                <br>
                <label for="email">Email</label>
                <input type="text" name="email" id="email">
                <br>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
                <br>
                <label for="confirmPassword">Confirm password</label>
                <input type="password" name="confirmPassword" id="password">
                <br>
                <label for="type">Student or company?</label><br>
                <input type="radio" name="type" id="student" value="student">
                <label for="student">Student</label><br>
                <input type="radio" name="type" id="company" value="company">
                <label for="company">Company</label>
                <br>
                <input type="submit" value="Signup">
            </form>
        </div>
    </div>
</body>

</html>