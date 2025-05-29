@extends('layouts.app')

@section('register_content')

<div class="min-h-screen flex items-top justify-center bg-gray-100">
    <div class="w-full max-w-md space-y-8 mt-10">

        @if (session('message'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" x-transition
            class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            {{ session('message') }}
        </div>
        @endif

        <div class="bg-white border border-gray-300 rounded-md shadow-sm">
            <div class="border-b px-6 py-3 text-2xl font-semibold bg-gray-100 text-center">
                Register
            </div>
            <form method="POST" action="{{ route('register') }}" class="px-6 py-6 space-y-6">
                @csrf

                <!-- Username -->
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fas fa-user"></i>
                        </span>
                        <input id="username" name="username" type="text" value="{{ old('username') }}" required autofocus
                            autocomplete="username" placeholder="Enter username"
                            class="pl-10 block w-full rounded-md border-gray-300 shadow-sm p-2 transition-all duration-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-500 sm:text-sm" />
                    </div>
                    @error('username')
                    <p x-data x-show="$el.textContent.length" x-transition.duration.500ms
                        class="text-sm text-red-600 mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">E-mail Address</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="email"
                            placeholder="Enter e-mail address"
                            class="pl-10 block w-full rounded-md border-gray-300 shadow-sm p-2 transition-all duration-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-500 sm:text-sm" />
                    </div>
                    @error('email')
                    <p x-data x-show="$el.textContent.length" x-transition.duration.500ms
                        class="text-sm text-red-600 mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input id="password" name="password" type="password" required autocomplete="new-password"
                            placeholder="Enter password"
                            class="pl-10 block w-full rounded-md border-gray-300 shadow-sm p-2 transition-all duration-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-500 sm:text-sm" />
                    </div>
                    @error('password')
                    <p x-data x-show="$el.textContent.length" x-transition.duration.500ms
                        class="text-sm text-red-600 mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input id="password_confirmation" name="password_confirmation" type="password" required
                            placeholder="Confirm password"
                            class="pl-10 block w-full rounded-md border-gray-300 shadow-sm p-2 transition-all duration-300 focus:ring-2 focus:ring-blue-400 focus:border-blue-500 sm:text-sm" />
                    </div>
                    @error('password_confirmation')
                    <p x-data x-show="$el.textContent.length" x-transition.duration.500ms
                        class="text-sm text-red-600 mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Register
                    </button>
                </div>
            </form>

            <!-- Already have an account -->
            <div class="text-center mb-5">
                <p class="text-sm text-gray-600">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-blue-600 hover:underline">
                        Login
                    </a>
                </p>
            </div>

        </div>
    </div>
</div>

@endsection