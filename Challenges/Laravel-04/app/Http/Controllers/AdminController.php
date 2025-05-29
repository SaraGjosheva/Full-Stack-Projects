<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        $discussions = Discussion::with(['category', 'user'])->where('admin_approve', true)->get();
        return view("adminDashboard", compact('discussions'));
    }

    public function approve()
    {
        $discussions = Discussion::with(['category', 'user'])->where('admin_approve', false)->get();

        return view('discussions.approveAdminDiscussion', compact('discussions'));
    }

    public function approveStore(Discussion $discussion)
    {
        $discussion->admin_approve = true;
        $discussion->update();
        return redirect()->route('admin.approve',)->with('message', ' Your Discussion successfully was approved! ');
    }
}
