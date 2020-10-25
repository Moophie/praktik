<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New application</title>
</head>

<body>
    <h1>Apply for job</h1>
    <form action="/jobs" method="post">
        {{ csrf_field() }}

        <label for="message">Write a motivation letter</label>
        <br>
        <textarea name="message" id="message" cols="30" rows="10"></textarea>
        <br><br>

        <!-- deze input moet later weg natuurlijk !! -->
        <label for="job_id">Job id</label>
        <input type="number" name="job_id" id="job_id">
        <br><br>

        <label for="user_id">User id</label>
        <input type="number" name="user_id" id="user_id">
        <br><br>

        <input type="submit" value="Submit">
    </form>
</body>

</html>