@extends('layouts.app')

@section('login_content')

<div class="min-h-screen flex items-start justify-center bg-gray-100">
    <div class="w-full max-w-md mt-9">
        @if (session('redirect_message'))
        <div
            x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 5000)"
            x-show="show"
            x-transition
            class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6">
            {{ session('redirect_message') }}
            @php
            session()->forget('redirect_message');
            @endphp
        </div>
        @endif

        <div class="bg-white border border-gray-300 rounded-md shadow-sm">
            <div class="border-b px-6 py-3 font-semibold bg-gray-100 text-2xl text-center">
                Login
            </div>

            <form method="POST" action="{{ route('login') }}" class="px-6 py-6 space-y-6">
                @csrf

                <!-- Username -->
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-1">
                        Username
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 15c2.647 0 5.093.772 7.121 2.097M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </span>
                        <input
                            id="username"
                            name="username"
                            type="text"
                            value="{{ old('username') }}"
                            placeholder="Username"
                            required
                            autofocus
                            autocomplete="username"
                            class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-blue-500 text-sm" />
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                        Password
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V7a4.5 4.5 0 00-9 0v3.5M4.5 10.5h15a1.5 1.5 0 011.5 1.5v7.5a1.5 1.5 0 01-1.5 1.5h-15a1.5 1.5 0 01-1.5-1.5V12a1.5 1.5 0 011.5-1.5z" />
                            </svg>
                        </span>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            placeholder="Password"
                            required
                            class="block w-full pl-10 pr-3 py-2 mb-3 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-blue-500 text-sm" />
                    </div>

                    @if ($errors->any())

                    <div
                        x-data="{ show: true }"
                        x-init="setTimeout(() => show = false, 5000)"
                        x-show="show"
                        x-transition
                        class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6">
                        {{ $errors->first() }}
                    </div>

                    @endif

                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input id="remember_me" name="remember" type="checkbox"
                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="remember_me" class="ml-2 block text-sm text-gray-700">
                        Remember Me
                    </label>
                </div>

                <!-- Submit Button and Link -->
                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded text-sm">
                        Login
                    </button>

                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                        class="text-sm text-blue-500 hover:text-blue-700">
                        Forgot Your Password?
                    </a>
                    @endif
                </div>

            </form>
        </div>
    </div>
</div>

@endsection