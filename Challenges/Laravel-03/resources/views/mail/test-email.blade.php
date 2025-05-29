<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.partials.metaTags')

    <title> @yield('title') </title>

    @include('layouts.partials.bootstrapLink')

    @include('layouts.partials.fontAwesomeLink')

    @vite(['resources/css/app.css', 'resources/css/style.css', 'resources/js/app.js'])

</head>

<body>

    Company:{{$email}},
    <br>
    Company:{{$phone}},
    <br>
    Name: {{$company}}

</body>

</html>