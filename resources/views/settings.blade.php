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
        <input type="file" name="image">
        <input type="submit" value="Upload">
    </form>

    <h3>Portfolio</h3>
    <p>Add more items to your portfolio</p>
</body>

</html>