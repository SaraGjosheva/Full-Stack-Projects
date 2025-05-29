<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Настани') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">

                @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 border border-green-300 rounded-md">
                    {{ session('success') }}
                </div>
                @endif

                @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 text-red-700 border border-red-300 rounded-md">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {{-- Create New Event Button --}}
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg font-bold">Сите Настани</h2>
                    <a href="{{ route('events.create') }}"
                        class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded text-sm font-semibold">
                        + Креирај Настан
                    </a>
                </div>

                {{-- Upcoming Events --}}
                <h3 class="text-md font-bold text-gray-700 dark:text-gray-100 mb-4 pb-3">🔜 Претстојни Настани</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                    @forelse ($events->where('date', '>=', now()->toDateString()) as $event)
                    <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md overflow-hidden flex flex-col justify-between">
                        <img src="{{ $event->image }}" alt="{{ $event->name }}" class="w-full h-48 object-cover">
                        <div class="p-4 flex-1 flex flex-col">
                            <h5 class="text-lg font-semibold mb-2">{{ $event->name }}</h5>
                            <p class="text-sm text-gray-700 dark:text-gray-200 mb-2">
                                {{ \Illuminate\Support\Str::limit($event->description, 100) }}
                            </p>
                            <p class="text-sm text-gray-500"><strong>Дата:</strong> {{ $event->date }}</p>
                            <p class="text-sm text-gray-500"><strong>Време:</strong> {{ $event->time }}</p>
                        </div>
                        <div class="p-4 border-t flex justify-center gap-2">
                            <a href="{{ route('events.edit', $event->id) }}"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm">Промени</a>
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST"
                                onsubmit="return confirm('Дали сте сигурни дека сакате да го избришите настанот?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm">
                                    Избриши
                                </button>
                            </form>
                            <a href="{{ route('gallery.show', $event->id) }}"
                                class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-1 rounded text-sm">
                                Галерија
                            </a>
                        </div>
                    </div>
                    @empty
                    <p class="text-gray-500 dark:text-gray-400">Нема претстојни настани.</p>
                    @endforelse
                </div>

                {{-- Past Events --}}
                <h3 class="text-md font-bold text-gray-700 dark:text-gray-100 mb-4 pb-3">⏳ Минати Настани</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse ($events->where('date', '<', now()->toDateString()) as $event)
                        <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md overflow-hidden flex flex-col justify-between opacity-75">
                            <img src="{{ $event->image }}" alt="{{ $event->name }}" class="w-full h-48 object-cover grayscale">
                            <div class="p-4 flex-1 flex flex-col">
                                <h5 class="text-lg font-semibold mb-2">{{ $event->name }}</h5>
                                <p class="text-sm text-gray-700 dark:text-gray-200 mb-2">
                                    {{ \Illuminate\Support\Str::limit($event->description, 100) }}
                                </p>
                                <p class="text-sm text-gray-500"><strong>Дата:</strong> {{ $event->date }}</p>
                                <p class="text-sm text-gray-500"><strong>Време:</strong> {{ $event->time }}</p>
                            </div>
                            <div class="p-4 border-t flex justify-center gap-2">
                                <a href="{{ route('events.edit', $event->id) }}"
                                    class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm">Промени</a>
                                <form action="{{ route('events.destroy', $event->id) }}" method="POST"
                                    onsubmit="return confirm('Дали сте сигурни дека сакате да го избришите настанот?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm">
                                        Избриши
                                    </button>
                                </form>
                                <a href="{{ route('gallery.show', $event->id) }}"
                                    class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-1 rounded text-sm">
                                    Галерија
                                </a>
                            </div>
                        </div>
                        @empty
                        <p class="text-gray-500 dark:text-gray-400">Нема минати настани.</p>
                        @endforelse
                </div>

            </div>
        </div>
    </div>
</x-app-layout>