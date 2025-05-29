@extends('layouts.app')

@section('add_comment')

<div class="min-h-screen flex items-start justify-center bg-gray-100 py-12">
    <div class="w-full max-w-2xl bg-white p-8 rounded-lg shadow-md">
        <h3 class="text-2xl font-semibold text-gray-800 mb-6">Add a Comment:</h3>

        <form action="{{ route('comment.store', $id) }}" method="POST" class="space-y-6">
            @csrf

            <!-- Comment Textarea -->
            <div>
                <textarea
                    name="comment"
                    id="comment"
                    rows="5"
                    class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm bg-white"
                    placeholder="Write your comment here..."
                    required></textarea>
            </div>


            <div class="flex justify-between">

                <!-- Back Button -->
                <a href="{{ route('discussion.show', $id) }}"
                    class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md text-sm">
                    ← Back to Discussion
                </a>

                <!-- Submit Button -->
                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-md text-sm shadow-md transition-all">
                    Submit
                </button>
            </div>

        </form>
    </div>
</div>

@endsection