@php
$hasSuperAdmin = \App\Models\User::where('role', 'super-admin')->exists();
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.partials.metaTags')

    <title> @yield('title') Котур </title>

    @include('layouts.partials.bootstrapLink')

    @include('layouts.partials.fontAwesomeLink')

    @vite(['resources/css/app.css', 'resources/css/style.css', 'resources/js/app.js'])

</head>

<body class="d-flex align-items-center justify-content-center min-vh-100 text-center home">
    <main class="button-container">

        @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if (Route::has('login'))
        <div class="d-flex justify-content-center align-items-center gap-5 flex-wrap flex-column">
            @auth
            <a href="{{ url('/dashboard') }}" class="btn btn-custom px-3 py-3 fw-bolder">
                Почетна
            </a>
            @else
            <a href="{{ route('login') }}" class="btn btn-custom px-3 py-2 fw-bolder w-40">
                Логирај се
            </a>

            @if (Route::has('register') && !$hasSuperAdmin)
            <a href="{{ route('register') }}" class="btn btn-custom px-3 py-2 fw-bolder w-40">
                Регистрирај се
            </a>
            @endif

            @endauth
        </div>
        @endif
    </main>

    @if (Route::has('login'))
    <div class="h-14.5 hidden lg:block"></div>
    @endif

    @include ('layouts.partials.bootstrapJs')

</body>

</html>