<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">

            {{-- Logo only on the left --}}
            <div class="flex-shrink-0">
                <a href="{{ route('matches.index') }}">
                    <x-application-logo-mini class="h-8 w-8 text-gray-800" />
                </a>
            </div>

            {{-- All nav links on the right --}}
            <div class="hidden sm:flex sm:items-center sm:space-x-4">
                <x-nav-link :href="route('matches.index')" :active="request()->routeIs('matches.*')">
                    {{ __('Matches') }}
                </x-nav-link>

                @auth
                @if(auth()->user()->role === 'admin')
                <x-nav-link :href="route('teams.index')" :active="request()->routeIs('teams.*')">
                    {{ __('Teams') }}
                </x-nav-link>
                <x-nav-link :href="route('players.index')" :active="request()->routeIs('players.*')">
                    {{ __('Players') }}
                </x-nav-link>
                @endif

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border rounded text-sm font-medium text-gray-500 hover:text-gray-700 focus:outline-none">
                            {{ Auth::user()->name }}
                            <svg class="ml-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">{{ __('Profile') }}</x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
                @else
                <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                    {{ __('Login') }}
                </x-nav-link>
                <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                    {{ __('Register') }}
                </x-nav-link>
                @endauth
            </div>

            {{-- Mobile hamburger --}}
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile menu --}}
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('matches.index')" :active="request()->routeIs('matches.*')">
                {{ __('Matches') }}
            </x-responsive-nav-link>

            @auth
            @if(auth()->user()->role === 'admin')
            <x-responsive-nav-link :href="route('teams.index')" :active="request()->routeIs('teams.*')">
                {{ __('Teams') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('players.index')" :active="request()->routeIs('players.*')">
                {{ __('Players') }}
            </x-responsive-nav-link>
            @endif

            <x-responsive-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                {{ __('Profile') }}
            </x-responsive-nav-link>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
            @else
            <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
                {{ __('Login') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')">
                {{ __('Register') }}
            </x-responsive-nav-link>
            @endauth
        </div>
    </div>
</nav>