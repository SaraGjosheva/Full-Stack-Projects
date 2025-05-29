@extends('layouts.master')

@section('title', 'Home')

@section('content')

<section class="container my-5">

    <div class="row">

        <div class="col-12 col-md-6 offset-md-3">

            <div class="border-bottom mb-3">
                <h2 class="fw-bolder mb-3">Lorem Ipsum</h2>
                <p class="mb-3 fw-700">Cillum laborum tempor laborum non dolore duis ipsum fugiat consectetur reprehenderit ipsum ipsum ex.</p>
                <p class="mb-4 fst-italic text-secondary fs-6">Posted by <span class="fw-bold">John Doe</span></p>
            </div>

            <div class="border-bottom mb-3 ">
                <h2 class="fw-bolder mb-3">Lorem Ipsum 2</h2>
                <p class="mb-4 fst-italic text-secondary fs-6">Posted by <span class="fw-bold">John Doe</span> in another boring news</p>
            </div>

            <div class="border-bottom mb-3">
                <h2 class="fw-bolder mb-3">Lorem Ipsum 3</h2>
                <p class="mb-3 fw-700">Veniam amet ad laborum excepteur ullamco consequat in adipisicing Lorem cillum excepteur. Commodo labore non sit ullamco minim dolore velit irure incididunt quis exercitation anim dolore non. Ut ex nostrud nostrud irure. Dolor ea sint mollit nisi excepteur laboris mollit ut occaecat excepteur Lorem.</p>
                <p class="mb-4 fst-italic text-secondary fs-6">Posted by <span class="fw-bold">Jane Doe</span></p>
            </div>

            <div class="border-bottom mb-3">
                <h2 class="fw-bolder mb-3">Lorem Ipsum 4</h2>
                <p class="mb-3 fw-700">Mollit aute dolore proident consectetur exercitation ex.</p>
                <p class="mb-4 fst-italic text-secondary fs-6">Posted by <span class="fw-bold">Missy Doe</span></p>
            </div>

            <div class="text-end">
                <a href="#" class="btn btn-primary btn-turquoise">Older posts -></a>
            </div>

        </div>
    </div>

</section>

@endsection