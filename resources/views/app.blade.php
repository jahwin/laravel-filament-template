<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">

    @if (request()->routeIs('blog'))
        <meta name="title" content="{{ $page['props']['blog']['title'] }}" />
    @else
        @inertiaHead
    @endif
    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,900&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    @inertia
</body>

</html>
