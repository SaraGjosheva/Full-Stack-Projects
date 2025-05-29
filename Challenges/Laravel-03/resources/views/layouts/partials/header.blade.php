<header class="bg-yellow-500 shadow-md">
    <nav class="container mx-auto flex items-center justify-between px-4 py-3">
        <!-- Logo & Branding: stacked vertically -->
        <div>
            <a href="{{ route('guests.index') }}" class="flex flex-col items-center space-y-1">
                <img class="w-10" src="{{ asset('image/logo_footer_black.png') }}" alt="Brainster Logo">
                <span class="font-bold text-lg text-black text-decoration-none" href="/">
                    BRAINSTER
                </span>
            </a>
        </div>

        <!-- Hamburger icon (hidden on medium and above) -->
        <button id="menuBtn"
            class="md:hidden text-black focus:outline-none
                   transition-transform hover:scale-110"
            aria-label="Toggle Menu">
            <i class="fa-solid fa-bars text-2xl p-2"></i>
        </button>

        <!-- Navigation links -->
        <!-- hidden by default on mobile; shown on md+ -->
        <ul id="navMenu"
            class="hidden md:flex md:items-center
               space-x-4 text-sm font-medium text-black
               text-decoration-none">
            <li>
                <a class="text-decoration-none block py-2 px-3 rounded-md
                  hover:bg-blue-500 hover:text-yellow-300
                  hover:scale-105 transition-transform duration-200"
                    target="_blank"
                    href="https://brainster.co/full-stack/">
                    Академија за<br>Програмирање
                </a>
            </li>
            <li>
                <a class="text-decoration-none block py-2 px-3 rounded-md
                  hover:bg-blue-500 hover:text-yellow-300
                  hover:scale-105 transition-transform duration-200"
                    target="_blank"
                    href="https://brainster.co/marketing/?gclid=CjwKCAiA-bmsBhAGEiwAoaQNmqAAFzV9A09JfUyyrswYzIcuOkgZU5HJczeDmTyPUzCVurkTteTV_xoC2d8QAvD_BwE">
                    Академија за<br>Маркетинг
                </a>
            </li>
            <li>
                <a class="text-decoration-none block py-2 px-3 rounded-md
                  hover:bg-blue-500 hover:text-yellow-300
                  hover:scale-105 transition-transform duration-200"
                    target="_blank"
                    href="https://brainster.co/graphic-design/">
                    Академија за<br>Дизајн
                </a>
            </li>
            <li>
                <a class="text-decoration-none block py-2 px-3 rounded-md
                  hover:bg-blue-500 hover:text-yellow-300
                  hover:scale-105 transition-transform duration-200"
                    target="_blank"
                    href="https://blog.brainster.co/">
                    Блог
                </a>
            </li>
            <li id="open_modal">
                <button class="text-decoration-none block py-2 px-3 rounded-md
                       hover:bg-blue-500 hover:text-yellow-300
                       hover:scale-105 transition-transform duration-200 
                       focus:outline-none">
                    Вработи наши<br>студенти
                </button>
            </li>

            @if(session()->has('admin_id'))
            <li>
                <a class="text-decoration-none block py-2 px-3 rounded-md
                        hover:bg-blue-500 hover:text-yellow-300
                        hover:scale-105 transition-transform duration-200"
                    href="{{ route('logout') }}">
                    Одлогирај<br>се
                </a>
            </li>
            @else
            <li>
                <a class="text-decoration-none block py-2 px-3 rounded-md
                        hover:bg-blue-500 hover:text-yellow-300
                        hover:scale-105 transition-transform duration-200"
                    href="{{ route('login') }}">
                    Логирај<br>се
                </a>
            </li>
            @endif
        </ul>
    </nav>
</header>

<!-- Script to toggle the mobile nav -->
<script>
    const menuBtn = document.getElementById('menuBtn');
    const navMenu = document.getElementById('navMenu');

    menuBtn.addEventListener('click', () => {
        navMenu.classList.toggle('hidden');
    });
</script>