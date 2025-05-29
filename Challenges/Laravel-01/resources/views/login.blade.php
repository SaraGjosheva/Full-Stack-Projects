@extends('layouts.master')

@section('title', 'Login')

@section('content')

<div class="col-12 col-md-6 offset-md-3 mx-auto my-4">

    <form action="{{ route('store') }}" method="POST" class="text-light mx-auto">
        @csrf

        @error ('name')
        <div class="alert alert-danger mb-2">
            <p class="mb-0">{{ $message }}</p>
        </div>
        @enderror

        <div class="mb-3">
            <label for="name" class="form-label text-uppercase fw-bold">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name')}}" placeholder="Enter First Name" class="form-control">
        </div>

        @error ('surname')
        <div class="alert alert-danger mb-2">
            <p class="mb-0">{{ $message }}</p>
        </div>
        @enderror

        <div class="mb-3">
            <label for="surname" class="form-label text-uppercase fw-bold">Last Name</label>
            <input type="text" id="surname" name="surname" value="{{ old('surname') }}" placeholder="Enter Last Name" class="form-control">
        </div>

        @error ('email')
        <div class="alert alert-danger mb-2">
            <p class="mb-0">{{ $message }}</p>
        </div>
        @enderror

        <div class="mb-4">
            <label for="email" class="form-label text-uppercase fw-bold">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email')}}" placeholder="Enter Email" class="form-control">
        </div>

        <button type="submit" class="btn btn-info w-100">Submit</button>
    </form>
</div>

@endsection