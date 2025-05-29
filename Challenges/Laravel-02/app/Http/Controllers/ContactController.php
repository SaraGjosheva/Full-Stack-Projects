<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|alpha|min:2|max:20',
            'email' => 'required|email',
            'phone' => 'nullable|integer',
            'message' => 'required|min:10|max:200',
        ]);

        return redirect()->route('contact')->with('success', 'Your message has been sent!');
    }
}
