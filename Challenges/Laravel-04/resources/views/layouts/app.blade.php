<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Forum</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/17dc55828f.js" crossorigin="anonymous"></script>
    <!-- Styles -->

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

    @include("layouts.navigation")

    <div class="bg-body-tertiary">

        @yield('index_content')
        @yield('admin_content')
        @yield('login_content')
        @yield('register_content')
        @yield('new_discussion')
        @yield('edit_discussion')
        @yield('show_discussion')
        @yield('add_comment')
        @yield('edit_comment')

    </div>

    <script src="//unpkg.com/alpinejs" defer></script>

</body>

</html>