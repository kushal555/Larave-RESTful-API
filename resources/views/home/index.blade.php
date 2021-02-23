<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Controller View</title>
</head>
<body>
    <h1>Hello I am displaying the content from HomeController</h1>
    @if($count)
        <p>This will only available when you have count</p>
    @endif
</body>
</html>
