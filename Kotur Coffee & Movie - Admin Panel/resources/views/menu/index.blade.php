<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Мени') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">

                @if (session('success'))
                <div class="mb-6 p-4 bg-green-100 text-green-800 rounded-md">
                    {{ session('success') }}
                </div>
                @endif

                {{-- Create New Menu Button --}}
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg font-bold">Мени</h2>
                    <a href="{{ route('menu.create') }}"
                        class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded text-sm font-semibold">
                        + Креирај Мени Продукт
                    </a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($items as $item)
                    <div class="relative h-72 rounded-lg overflow-hidden shadow-md group">
                        <!-- Background Image -->
                        <img src="{{ $item->image }}" alt="{{ $item->name }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">

                        <!-- Dark Overlay -->
                        <div class="absolute inset-0 bg-black bg-opacity-50"></div>

                        <!-- Content -->
                        <div class="relative z-10 h-full flex flex-col justify-between text-white p-4">
                            <div>
                                <div class="flex justify-between items-center">
                                    <h5 class="text-xl font-bold">{{ $item->name }}</h5>
                                    @if($item->is_popular)
                                    <span class="bg-cyan-400 text-white text-xs font-semibold px-2 py-1 rounded">⭐ Популарно</span>
                                    @endif
                                </div>

                                @if($item->is_recommended)
                                <span class="mt-1 inline-block bg-green-500 text-white text-xs font-semibold px-2 py-1 rounded">Препорачано</span>
                                @endif

                                <p class="mt-2 text-sm text-gray-200"><strong>Категорија:</strong> {{ $item->category }}</p>
                                <p class="mt-1 text-sm">{{ $item->ingredients }}</p>
                            </div>

                            <div class="flex justify-center gap-3 mt-4">
                                <a href="{{ route('menu.edit', $item->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-1 rounded">Промени</a>
                                <form action="{{ route('menu.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Дали сте сигурни дека сакате да го избришите мени продуктот?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white text-sm px-4 py-1 rounded">Избриши</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>