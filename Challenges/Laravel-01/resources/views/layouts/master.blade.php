<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title') </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                url("../../assets/images/textures/1.jpg") !important;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
            margin: 0;
            min-height: 100vh !important;
            padding-bottom: 7vh;
        }

        h1 {
            font-size: 60px !important;
            letter-spacing: 3px !important;
        }

        nav {
            background-color: #2e1810 !important;
            top: 30;
            left: 0;
            width: 100%;
            height: 8vh;
        }

        footer {
            position: absolute !important;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 7vh;
            background-color: #2e1810 !important;
            font-size: 11px;
        }

        .bisquet {
            border: 10px double orange;
        }

        .spacing-2 {
            letter-spacing: 2px;
        }
    </style>

</head>

<body>

    <h1 class="text-center text-uppercase text-light fw-bolder my-5">Business casual</h1>

    <!-- Improved the log in link to not be present in the navbar when user is already logged in. -->

    <nav class="text-center py-2 mb-5 d-flex align-items-center justify-content-center gap-4">
        <a href="{{ route('home') }}"
            class="fw-bold text-uppercase text-decoration-none 
              {{ request()->routeIs('home') ? 'text-warning' : 'text-light' }}">
            Home
        </a>

        @if(!session()->has('name'))
        <a href="{{ route('create') }}"
            class="fw-bold text-uppercase text-decoration-none 
              {{ request()->routeIs('create') ? 'text-warning' : 'text-light' }}">
            Log In
        </a>
        @endif

        @if(session("name"))
        <a href="{{ route('logout') }}"
            class="fw-bold text-uppercase text-decoration-none 
                  {{ request()->routeIs('logout') ? 'text-warning' : 'text-light' }}">
            Log Out
        </a>
        @endif
    </nav>



    <main class="container">
        @yield('content')
    </main>

    @yield('extraContent')

    <footer class="text-center text-light d-flex align-items-center justify-content-center">
        <p class="mb-0">Copyright &copy; Your Website 2025</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>