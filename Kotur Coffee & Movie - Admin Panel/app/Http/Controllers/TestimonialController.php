<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonial = Testimonial::all();
        return view('testimonials.testimonials');
    }

    public function store(Request $request)
    {
        return Testimonial::create($request->all());
    }

    public function show($id)
    {
        return Testimonial::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->update($request->all());

        return $testimonial;
    }

    public function destroy($id)
    {
        Testimonial::destroy($id);
        return response()->json(['message' => 'Препорака успешно избришана']);
    }
}
