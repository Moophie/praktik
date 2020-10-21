<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New job</title>
</head>

<body>
    <h1>Add new job listing</h1>
    <label for="title">Job title</label>
    <input type="text" name="title" id="title">
    <br><br>

    <label for="desc">Description</label>
    <br>
    <textarea name="desc" id="desc" cols="30" rows="10"></textarea>
    <br><br>

    <label for="start">Start date</label>
    <input type="date" name="start" id="start">
    <br><br>

    <!-- deze input moet later weg natuurlijk !! -->
    <label for="id">Company id</label>
    <input type="number" name="id" id="id">
    <br><br>

    <input type="submit" value="Submit">
</body>

</html>