<nav class="bg-white border-b border-gray-200 shadow-sm" x-data="{ open: false, profileOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('index') }}" class="text-xl font-bold text-gray-800">
                        Laravel
                    </a>
                </div>
            </div>

            <!-- Right Side -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @auth
                <!-- Dropdown for Authenticated Users -->
                <div class="relative" x-data="{ profileOpen: false }">
                    <button @click="profileOpen = !profileOpen"
                        class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 focus:outline-none">
                        {{ Auth::user()->username }}
                        <svg class="ml-1 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.293l3.71-4.06a.75.75 0 111.08 1.04l-4.25 4.646a.75.75 0 01-1.08 0L5.23 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <div x-show="profileOpen" @click.away="profileOpen = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-20">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
                @else
                <!-- For Guests -->
                <div class="flex space-x-4">
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-500 font-semibold px-4 py-2">
                        Login
                    </a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="text-gray-700 hover:text-green-500 font-semibold px-4 py-2">
                        Register
                    </a>
                    @endif
                </div>
                @endauth
            </div>

            <!-- Mobile menu button -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = !open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" x-transition class="sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @auth
            <div class="px-4 py-2 text-sm text-gray-700">
                Welcome, {{ Auth::user()->username }}
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    Logout
                </button>
            </form>
            @else
            <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                Login
            </a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                Register
            </a>
            @endif
            @endauth
        </div>
    </div>
</nav>