@extends('layouts.app')

@section('admin_content')

<div class="min-h-screen bg-gray-100">

    <!-- Header -->
    <header class="text-center py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-3">Welcome to the Forum</h1>
    </header>

    <!-- Admin Actions (Add + Approve Discussions) -->
    <div class="max-w-6xl mx-auto px-4 mb-8">
        <div class="flex flex-row justify-between items-center space-x-4">

            <a href="{{ route('new.discussion') }}"
                class="bg-gray-700 hover:bg-gray-800 text-white font-semibold py-2 px-4 rounded text-center">
                Add New Discussion
            </a>

            <a href="{{ route('admin.approve') }}"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded text-center">
                Approve Discussions
            </a>

        </div>
    </div>
    <!-- Discussions Section -->
    <div class="max-w-6xl mx-auto px-4">

        @if($discussions->count())
        <div class="grid grid-cols-1 gap-6">
            @foreach($discussions as $discussion)
            <div class="bg-white rounded-lg shadow p-6 flex items-center">

                <!-- Image -->
                <div class="w-24 h-24 flex-shrink-0">
                    <a href="{{ route('discussion.show', $discussion->id) }}">
                        <img src="{{ $discussion->img }}" alt="Discussion Image"
                            class="w-full h-full object-cover rounded">
                    </a>
                </div>

                <!-- Info -->
                <div class="ml-6 flex-1">
                    <h2 class="text-xl font-semibold text-gray-800">{{ $discussion->title }}</h2>
                    <p class="text-gray-600 mt-2">{{ Str::limit($discussion->description, 100) }}</p>
                    <div class="text-sm text-gray-500 mt-2">
                        {{ $discussion->category->name }} | {{ $discussion->user->username }}
                    </div>
                </div>

                <!-- Admin Actions (Edit/Delete) -->
                @auth
                <div class="flex space-x-2 ml-4">
                    <a href="{{ route('discussion.edit', $discussion->id) }}"
                        class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-2 rounded text-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form method="POST" action="{{ route('discussion.destroy', $discussion->id) }}">
                        @csrf
                        @method('delete')
                        <button type="submit"
                            onclick="return confirm('Are you sure you want to delete this discussion?')"
                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded text-sm">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
                @endauth

            </div>
            @endforeach
        </div>
        @else
        <h4 class="text-center text-gray-500 text-xl mt-8">
            Nothing here yet! Start a topic!
        </h4>
        @endif

    </div>

</div>

@endsection