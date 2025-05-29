<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureIsAdmin;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FootballMatchController;

// Public (guest) — only see match listings:
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('matches.index');
    }
    return view('index');
});

Route::get('/matches', [FootballMatchController::class, 'index'])
    ->name('matches.index');

require __DIR__ . '/auth.php';

// Admin-only routes:
Route::middleware(['auth', EnsureIsAdmin::class])->group(function () {
    // Full CRUD on teams
    Route::resource('teams', TeamController::class)
        ->except(['show']);

    // Full CRUD on players
    Route::resource('players', PlayerController::class)
        ->except(['show']);

    // All match management except listing
    Route::resource('matches', FootballMatchController::class)
        ->except(['index', 'show']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
