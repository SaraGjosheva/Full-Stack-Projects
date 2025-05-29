@extends('layouts.master')

@section('title', 'Contact')

@section('content')

<section class="container my-5">

    <div class="row">

        <div class="col-12 col-md-6 offset-md-3 text-secondary">

            @if(session('success'))
            <div class="alert alert-success text-center mb-4">
                {{ session('success') }}
            </div>
            @endif

            <form method="POST" action="{{ route('contact.submit') }}">
                @csrf

                <div class="mb-4">
                    <label for="name" class="form-label mb-2">Name</label>
                    <input type="text" class="form-control border-0 border-bottom rounded-0 shadow-none mb-3" id="name" name="name" value="{{ old('name') }}" required>
                    @error('name')
                    <div class="alert alert-danger mb-3">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="form-label mb-2">Email Address</label>
                    <input type="email" class="form-control border-0 border-bottom rounded-0 shadow-none mb-3" id="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                    <div class="alert alert-danger mb-3">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="phone" class="form-label mb-2">Phone Number</label>
                    <input type="text" class="form-control border-0 border-bottom rounded-0 shadow-none mb-3" id="phone" name="phone" value="{{ old('phone') }}">
                    @error('phone')
                    <div class="alert alert-danger mb-3">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="message" class="form-label mb-2">Message</label>
                    <textarea class="form-control border-0 border-bottom rounded-0 shadow-none mb-3" id="message" name="message" rows="4" value="{{ old('message') }}" required></textarea>
                    @error('message')
                    <div class="alert alert-danger mb-3">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary btn-turquoise px-3 py-2">SEND</button>
                </div>
            </form>

        </div>

    </div>

</section>

@endsection