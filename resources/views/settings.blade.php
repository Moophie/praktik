<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student settings</title>
</head>

<body>
    <h1>Profile settings</h1>
    This is where you can make changes to your profile!

    <form action="/upload" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <label for="image">Profile picture</label><br>
        <input type="file" name="image">
        <br>
        <label for="cv">CV</label><br>
        <input type="file" name="cv">
        <br>
        <input type="submit" value="Upload">
    </form>

    <h3>Portfolio</h3>
    <a href="/dribbble" class="button">Import shots from Dribbble</a>

</body>

</html>