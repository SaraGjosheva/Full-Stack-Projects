<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.partials.metaTags')

    <title> @yield('title') </title>

    @include('layouts.partials.bootstrapLink')

    @include('layouts.partials.fontAwesomeLink')

    @vite(['resources/css/app.css', 'resources/css/style.css', 'resources/js/app.js'])

</head>

<body class="position-relative">

    @include('layouts.partials.header')

    <main class="container">

        @yield('content')

    </main>

    @include('layouts.partials.footer')

    @include('layouts.partials.bootstrapJs')

</body>

</html>