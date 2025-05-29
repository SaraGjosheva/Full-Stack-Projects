@extends('layouts.app')

@section('show_discussion')

<div class="min-h-screen bg-gray-100">

    <!-- Header -->
    <header class="py-6 text-center">
        <h1 class="text-3xl font-bold text-gray-800">Welcome to the Forum</h1>
    </header>

    <!-- Back Button -->
    <div class="max-w-4xl mx-auto my-7">
        <a href="{{ auth()->check() && auth()->user()->role_id === 1 ? route('admin.index') : route('index') }}"
            class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md text-sm">
            ← Back to Dashboard
        </a>
    </div>

    <!-- Discussion Content -->
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-6 mb-8">
        <p class="text-sm text-gray-500 text-right">{{ $data->category->name }} | {{ $data->user->username }}</p>

        <div class="flex justify-center my-4">
            <img src="{{ $data->img }}" alt="discussion image" class="w-1/3 rounded-md object-cover border">
        </div>

        <h2 class="text-2xl font-semibold text-center text-gray-800 mt-4">{{ $data->title }}</h2>
        <p class="text-center text-gray-600 mt-2">{{ $data->description }}</p>
    </div>

    <!-- Comment Section -->
    <section class="max-w-4xl mx-auto px-4">

        <!-- Flash Messages -->
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

        <!-- Comments Header -->
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-semibold text-gray-800">Comments:</h3>
            <a href="{{ route('comment.create', $data->id) }}"
                class="bg-gray-700 hover:bg-gray-800 text-white font-semibold py-2 px-4 rounded-md text-sm">
                Add a Comment
            </a>
        </div>

        <!-- Comments List -->
        @foreach($comments as $comment)
        <div class="bg-white rounded-lg shadow p-4 mb-4">
            <div class="flex justify-between text-sm text-gray-600 mb-2">
                <span>{{ $comment->user->username }} says:</span>
                <span>{{ $comment->created_at->format('Y-m-d H:i') }}</span>
            </div>

            <p class="text-gray-700 mb-3">{{ $comment->comment }}</p>

            @if(Auth::id() === $comment->user_id)
            <div class="flex space-x-2">
                <a href="{{ route('comment.edit', $comment->id) }}"
                    class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-sm">
                    <i class="fas fa-edit"></i>
                </a>

                <form method="POST" action="{{ route('comment.destroy', $comment->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        onclick="return confirm('Are you sure you want to delete this comment?')"
                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">
                        <i class="fa fa-trash"></i>
                    </button>
                </form>
            </div>
            @endif
        </div>
        @endforeach

    </section>

</div>

@endsection