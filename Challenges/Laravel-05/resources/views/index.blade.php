<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Football Manager</title>

    @vite(['resources/css/app.css', 'resources/css/style.css', 'resources/js/app.js'])
</head>

<body class="home min-h-screen bg-cover bg-center bg-no-repeat flex items-center justify-center text-white">
    <main class="button-container space-x-4 text-center">
        @if (Route::has('login'))
        <a href="{{ route('login') }}"
            class="btn btn-custom px-6 py-3 fw-bolder w-40">
            Log in
        </a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}"
            class="btn btn-custom px-6 py-3 fw-bolder w-40">
            Register
        </a>
        @endif
        @endif
    </main>

</body>

</html>