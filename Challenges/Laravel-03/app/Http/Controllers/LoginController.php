<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $request->validate([

            'email' => 'required|email',
            'password' => 'required|min:6'

        ]);

        $admin  = DB::table('admins')->where('email', $request->email)->first();

        if ($admin) {

            if (Hash::check($request->password, $admin->password)) {

                session()->put('admin_id', $admin->id);

                return redirect()->route('admin');
            }
        }
        return redirect()->back();
    }


    public function logout()
    {
        session()->flush();

        return redirect()->route('guests.index');
    }
}
