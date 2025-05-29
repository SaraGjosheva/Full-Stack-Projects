@extends('layouts.app')

@section('index_content')

<div class="min-h-screen bg-gray-100">

    <header class="py-6">
        <div class="container mx-auto text-center">
            @if (session('message'))
            <div class="bg-green-100 text-green-700 p-3 mb-4 rounded-md">
                {{ session('message') }}
            </div>
            @endif

            @if (session('update'))
            <div class="bg-yellow-100 text-yellow-700 p-3 mb-4 rounded-md">
                {{ session('update') }}
            </div>
            @endif

            @if (session('delete'))
            <div class="bg-red-100 text-red-700 p-3 mb-4 rounded-md">
                {{ session('delete') }}
            </div>
            @endif

            <h1 class="text-3xl font-bold text-gray-800">Welcome to the Forum</h1>
        </div>
    </header>

    <!-- Back Button -->
    <div class="container mx-auto px-4">
        <a href="{{ route('admin.index') }}"
            class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md text-sm">
            ← Back to Dashboard
        </a>
    </div>

    <section class="py-8">
        <div class="container mx-auto px-4">
            <div class="space-y-6">

                @if(count($discussions))
                @foreach($discussions as $discussion)
                <div class="bg-white p-6 rounded-lg shadow-md flex flex-col md:flex-row items-center justify-between">
                    <div class="flex items-center space-x-4 w-full md:w-auto">
                        <a href="{{ route('discussion.show', $discussion->id) }}">
                            <img src="{{ $discussion->img }}" alt="discussion image" class="w-20 h-20 object-cover rounded-md border">
                        </a>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">{{ $discussion->title }}</h3>
                            <p class="text-gray-600 text-sm">{{ Str::limit($discussion->description, 100) }}</p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-2 mt-4 md:mt-0">
                        @auth
                        <!-- Approve Button -->
                        <form method="POST" action="{{ route('admin.store', $discussion->id) }}">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="inline-flex items-center px-3 py-2 bg-green-500 hover:bg-green-600 text-white text-sm font-semibold rounded-md shadow">
                                <i class="fas fa-check"></i>
                            </button>
                        </form>

                        <!-- Edit Button -->
                        <a href="{{ route('discussion.edit', $discussion->id) }}" class="inline-flex items-center px-3 py-2 bg-yellow-400 hover:bg-yellow-500 text-white text-sm font-semibold rounded-md shadow">
                            <i class="fas fa-edit"></i>
                        </a>

                        <!-- Delete Button -->
                        <form method="POST" action="{{ route('discussion.destroy', $discussion->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-3 py-2 bg-red-500 hover:bg-red-600 text-white text-sm font-semibold rounded-md shadow">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                        @endauth

                        <p class="text-gray-500 text-xs ml-4">{{ $discussion->category->name }} | {{ $discussion->user->username }}</p>
                    </div>
                </div>
                @endforeach
                @else
                <h4 class="text-center text-gray-500 text-lg">Nothing here yet! Start a topic!</h4>
                @endif

            </div>
        </div>
    </section>

</div>

@endsection