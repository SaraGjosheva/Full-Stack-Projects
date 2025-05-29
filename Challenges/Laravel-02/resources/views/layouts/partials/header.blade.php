<header class="
    @if (request()->routeIs('home')) home-bg
    @elseif (request()->routeIs('about')) about-bg
    @elseif (request()->routeIs('blog')) blog-bg
    @elseif (request()->routeIs('contact')) contact-bg
    @else bg-primary
    @endif
 ">


    <nav class="navbar navbar-expand-lg container pt-3">

        <div class="row w-100 align-items-center">

            <!-- Left: Logo & Brand -->
            <div class="col-12 col-md-6">
                <a class="navbar-brand d-flex align-items-center text-white fw-bolder fs-4" href="{{route('home')}}">
                    Blog
                </a>
            </div>

            <!-- Center: Navigation links -->
            <div class="col-12 col-md-6 text-center py-2 d-flex align-items-center justify-content-end gap-3">

                <a href="{{ route('home') }}"
                    class="fw-bold text-uppercase text-decoration-none 
              {{ request()->routeIs('home') ? 'text-white' : 'header-text-color' }}">
                    Home
                </a>

                <a href="{{ route('about') }}"
                    class="fw-bold text-uppercase text-decoration-none 
              {{ request()->routeIs('about') ? 'text-white' : 'header-text-color' }}">
                    About
                </a>

                <a href="{{ route('blog') }}"
                    class="fw-bold text-uppercase text-decoration-none 
                  {{ request()->routeIs('blog') ? 'text-white' : 'header-text-color' }}">
                    Sample post
                </a>

                <a href="{{ route('contact') }}"
                    class="fw-bold text-uppercase text-decoration-none 
                  {{ request()->routeIs('contact') ? 'text-white' : 'header-text-color' }}">
                    Contact
                </a>

            </div>

        </div>

    </nav>

    <section class="position-absolute top-50 start-50 translate-custom text-center">

        <h1 class="text-white fw-bolder mb-3 pb-3">
            @if (request()->routeIs('home')) Clean Blog
            @elseif (request()->routeIs('about')) About Me
            @elseif (request()->routeIs('blog')) Man must explore, and this is exploration at it's graitest
            @elseif (request()->routeIs('contact')) Contact Me
            @endif
        </h1>

        <p class="mb-3 header-text-color fs-5 fw-bold">
            @if (request()->routeIs('home')) A Blog Theme By Start Bootstrap
            @elseif (request()->routeIs('about')) This is what I do.
            @elseif (request()->routeIs('blog')) Problems look mighty small from 150 miles up
            @elseif (request()->routeIs('contact')) Have questions? I have answers!
            @endif
        </p>

        <p class="mb-0 header-text-color fs-6">
            @if (request()->routeIs('blog')) Posted by Start Bootstrap on March 30, 2025
            @endif
        </p>

    </section>

</header>