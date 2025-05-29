<x-guest-layout>
    <div class="mb-6 text-sm text-gray-600 text-center">
        {{ __('Forgot your password? No problem. Just enter your email address and we will send you a password reset link.') }}
    </div>

    <!-- Session Status -->
    @if (session('status'))
    <div class="mb-4 text-green-600 text-sm text-center font-medium">
        {{ session('status') }}
    </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div class="relative">
            <input
                id="email"
                name="email"
                type="email"
                value="{{ old('email') }}"
                required
                autofocus
                placeholder=" "
                class="peer block w-full pl-10 pr-3 pt-4 pb-1 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-blue-500 text-sm" />

            <!-- Email Icon -->
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 12H8m8 0l-8 8m8-8l-8-8" />
                </svg>
            </span>

            <!-- Floating Label -->
            <label for="email"
                class="absolute left-10 top-2 text-gray-400 text-sm transition-all 
                peer-placeholder-shown:top-4 
                peer-placeholder-shown:text-sm 
                peer-focus:top-2 
                peer-focus:text-xs 
                peer-focus:text-blue-500">
                Email Address
            </label>

            <!-- Validation Errors -->
            @error('email')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-end">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded text-sm">
                {{ __('Email Password Reset Link') }}
            </button>
        </div>
    </form>
</x-guest-layout>