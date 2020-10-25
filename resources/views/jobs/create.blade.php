<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New job</title>
</head>

<body>
    <h1>Add new job listing</h1>
    <form action="/jobs" method="post">
        {{ csrf_field() }}

        <label for="name">Job title</label>
        <input type="text" name="name" id="name">
        <br><br>

        <label for="description">Description</label>
        <br>
        <textarea name="description" id="description" cols="30" rows="10"></textarea>
        <br><br>

        <label for="start_date">Start date</label>
        <input type="date" name="start_date" id="start_date">
        <br><br>

        <!-- deze input moet later weg natuurlijk !! -->
        <label for="company_id"> Company id</label>
        <input type="number" name="company_id" id="company_id">
        <br><br>

        <input type="submit" value="Submit">
    </form>
</body>

</html>