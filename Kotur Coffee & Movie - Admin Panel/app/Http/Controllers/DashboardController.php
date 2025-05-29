<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use App\Models\CinemaReservation;
use App\Models\CocktailReservation;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'adminCount' => User::whereIn('role', ['admin', 'super-admin'])->count(),
            'menuCount' => MenuItem::count(),
            'cinemaCount' => CinemaReservation::count(),
            'cocktailCount' => CocktailReservation::count(),
            'jobAppCount' => JobApplication::count(),
            'eventCount' => Event::count(),
        ]);
    }
}
