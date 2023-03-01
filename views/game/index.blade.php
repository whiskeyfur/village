<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />
    <title>Home</title>
    <style>
        * {
            font-family: monospace
        }
    </style>
</head>
<body>
@foreach($people as $person)
    <div>[{{$person->id}}] {{$person->age}}y {{$person->gender[0]}} {{$person->race}}</div>
@endforeach
</body>
</html>