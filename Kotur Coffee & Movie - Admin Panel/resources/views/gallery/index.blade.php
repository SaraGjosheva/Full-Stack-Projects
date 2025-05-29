<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Галерија') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                  <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg font-bold">Албуми од Настани</h2>
                    <a href="{{ route('gallery.create') }}"
                        class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded text-sm font-semibold">
                        + Креирај Галерија за Настан
                    </a>
                </div>

                    @if ($events ->isEmpty())
                        <div class="text-center">
                            <p class="text-gray-500">Нема настани со фотографии.</p>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($events as $event)
                            @if ($event->gallery->count())
                                <div
                                    class="bg-white/70 dark:bg-gray-800/70 backdrop-blur-xl shadow-xl rounded-3xl p-8 ring-1 ring-gray-200 dark:ring-gray-700 transition-transform transform hover:scale-[1.01]">
                                    <div class="flex flex-col justify-between h-full">
                                        <div class="mb-6">
                                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white">
                                                {{ $event->name }}</h3>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                                {{ \Carbon\Carbon::parse($event->date)->format('d.m.Y') }}</p>
                                        </div>

                                        <a href="{{ route('gallery.show', ['id' => $event->id]) }}" class="group">
                                            <div
                                                class="relative overflow-hidden rounded-xl shadow-lg transition-transform duration-300 ease-in-out transform hover:scale-105 hover:shadow-2xl">
                                                <div class="w-full h-56 relative">
                                                    <span
                                                        class="absolute top-2 right-2 inline-block bg-indigo-600 text-white text-xs px-2 py-1 rounded-full font-medium">
                                                        {{ $event->gallery->count() }} фотографии
                                                    </span>
                                                    <img src="{{ $event->gallery[0]->image }}"
                                                        data-images='@json($event->gallery->pluck('image'))'
                                                        class="slideshow-image object-cover w-full h-full rounded-xl transition-transform duration-500 group-hover:scale-110" />
                                                </div>
                                                <div
                                                    class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center text-white text-lg font-semibold">
                                                    Прегледај
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
