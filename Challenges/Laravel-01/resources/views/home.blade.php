@extends('layouts.master')

@section('title', 'Business casual')

@section('content')

<section class="container d-flex justify-content-center align-items-center position-relative py-5">
    <div class="position-relative w-75 d-flex justify-content-end">
        <img class="w-75 img-fluid" src="{{ asset('assets/images/cafe.jpg') }}" alt="Cafe">
        <div class="position-absolute bg-light bg-opacity-75 p-4 text-center w-50 top-50 start-0 translate-middle-y shadow-lg rounded">
            <h5 class="text-uppercase fw-bold pb-3">Lorem Ipsum</h5>
            <h3 class="text-uppercase fs-3">Lorem Ipsum</h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Provident modi commodi, aspernatur nobis quis tempora debitis blanditiis eos dolor maiores.</p>
            <div class="position-absolute start-50 translate-middle-x" style="bottom: -20px;">
                <button class="btn btn-warning text-light fw-bold">Visit us today</button>
            </div>
        </div>
    </div>
</section>

@endsection

@section('extraContent')

<section class="bg-warning py-5 mt-5">
    <div class="outer-bisque bisquet w-75 mx-auto p-3 text-center shadow-lg bg-light rounded">
        <h6 class="fw-bold text-uppercase text-secondary py-3">Our Promise</h6>

        @if(session('name'))
        <h2 class="fs-2 text-uppercase text-dark pb-3">To {{session('name')}} {{session('surname')}}</h2>
        @else
        <h2 class="fs-2 text-uppercase text-dark pb-3">To You</h2>
        @endif

        <p class="text-secondary px-3">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti ipsa vitae consequatur expedita accusantium harum numquam earum aperiam neque voluptatem repellendus ut, odio dicta temporibus perferendis, voluptatibus tenetur. Qui sed dolore aliquam! Ratione corporis quia similique illo voluptate quas esse pariatur aliquid distinctio ullam eius et impedit optio rerum possimus, quibusdam perferendis laboriosam! Recusandae, laboriosam hic aliquid quis delectus sapiente obcaecati quaerat?
        </p>
    </div>
</section>

@endsection