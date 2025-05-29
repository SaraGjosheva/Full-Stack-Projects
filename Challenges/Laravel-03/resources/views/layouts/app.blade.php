<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.partials.metaTags')

    <title> @yield('title') </title>

    <!-- @include('layouts.partials.bootstrapLink') -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />

    @include('layouts.partials.fontAwesomeLink')

    @vite(['resources/css/app.css'])

    <style>
        main {
            height: 600px;
            background-image:linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)),
            url("{{ asset('image/synthesio-0301.gif') }}");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;

        }

        .mobile {
            top: 96px;
            width: 100%;

        }

        .margine {
            margin-top: 13rem;
        }

        .borderAdd {
            border-bottom: 1px solid white;
            border-top-width: 2px;
            border-left-width: 2px;
            border-right-width: 2px;
            border-radius: 3px;
            color: gray;
        }
    </style>

</head>

<body class="pb-16">
    @include('layouts.partials.header')


    @if(session()->has('admin_id'))

    @yield('admin_content')
    @vite('resources/js/admin.js')
    @else
    @yield('content')
    @vite('resources/js/index.js')
    @vite('resources/js/modal.js')

    @endif

    @include('layouts.partials.footer')
    <!-- @include('layouts.partials.bootstrapJs') -->

</body>

</html>