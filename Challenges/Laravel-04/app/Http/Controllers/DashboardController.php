<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $discussions = Discussion::with(['category', 'user'])->where('admin_approve', true)->get();

        if (Auth::user()) {
            if (Auth::user()->role_id === 1) {
                return redirect()->route('admin.index');
            }
        }

        return view('dashboard', compact('discussions'));
    }
}
