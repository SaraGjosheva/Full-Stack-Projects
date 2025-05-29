<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function create()
    {
        return view('login');
    }

    public function store(Request $request)
    {
        $user = $request->validate([
            'name' => 'required|max:15|alpha',
            'surname' => 'required|alpha|max:25',
            'email' => 'nullable|email',
        ]);

        if ($request->session()->has('name') || $request->session()->has('surname') || $request->session()->has('email')) {
            return redirect()->route('create')->with('error', 'You have already created a user.');
        }

        $request->session()->put('name', $user['name']);
        $request->session()->put('surname', $user['surname']);
        $request->session()->put('email', $user['email']);

        return redirect()->route('information', ['key' => 'name']);
    }

    public function show($key, Request $request)
    {
        $validKeys = ['name', 'surname', 'email'];

        if (!in_array($key, $validKeys)) {
            return redirect()->route('not-found');
        }

        $user = $request->session()->get($key);

        if (!$user) {
            return redirect()->route('not-found');
        }

        return view('information', ['user' => $user]);
    }

    public function notFound()
    {
        return view('not-found');
    }

    public function destroy(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('home');
    }
}
