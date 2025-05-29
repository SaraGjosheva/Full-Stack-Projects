<?php

use App\Mail\NewAdminCreatedMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Middleware\EnsureSuperAdmin;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MenuItemController;
use App\Http\Middleware\LogoutIfUserDeleted;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\CinemaReservationController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CocktailReservationController;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', LogoutIfUserDeleted::class])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admins
    Route::get('/admins', [AdminController::class, 'index'])->name('admins');

    // Admin Management
    Route::middleware(['auth', EnsureSuperAdmin::class])
        ->prefix('admin')
        ->name('admin.')     // so route names become admin.users.index, admin.create, etc.
        ->group(function () {

            Route::get('/users', [AdminController::class, 'index'])
                ->name('users.index');

            Route::get('/create', [AdminController::class, 'create'])
                ->name('create');
            Route::post('/store', [AdminController::class, 'store'])
                ->name('store');

            Route::get('/users/{id}/edit', [AdminController::class, 'edit'])
                ->name('users.edit');
            Route::put('/users/{id}', [AdminController::class, 'update'])
                ->name('users.update');

            Route::get('/users/{id}/delete',   [AdminController::class, 'delete'])
                ->name('users.delete');

            Route::delete('/users/{id}',       [AdminController::class, 'destroy'])
                ->name('users.destroy');
        });

    // Cocktail Reservations
    Route::get('/cocktail-reservation', [CocktailReservationController::class, 'index'])->name('cocktail_reservation');
    Route::get('/cocktail/reservations', [CocktailReservationController::class, 'index'])->name('cocktail.reservations');
    Route::get('/cocktail/reservations/create', [CocktailReservationController::class, 'create'])->name('cocktail.reservations.create');
    Route::post('/cocktail/reservations/store', [CocktailReservationController::class, 'store'])->name('cocktail.reservations.store');
    Route::get('/cocktail/reservations/edit/{id}', [CocktailReservationController::class, 'edit'])->name('cocktail.reservations.edit');
    Route::put('/cocktail/reservations/update/{id}', [CocktailReservationController::class, 'update'])->name('cocktail.reservations.update');
    Route::delete('/cocktail/reservations/delete/{id}', [CocktailReservationController::class, 'destroy'])->name('cocktail.reservations.delete');

    // Cinema Reservations
    Route::get('/cinema-reservation', [CinemaReservationController::class, 'index'])->name('cinema_reservation');
    Route::get('/cinema/reservations', [CinemaReservationController::class, 'index'])->name('cinema.reservations');
    Route::get('/cinema/reservations/create', [CinemaReservationController::class, 'create'])->name('cinema.reservations.create');
    Route::post('/cinema/reservations/store', [CinemaReservationController::class, 'store'])->name('cinema.reservations.store');
    Route::get('/cinema/reservations/edit/{id}', [CinemaReservationController::class, 'edit'])->name('cinema.reservations.edit');
    Route::put('/cinema/reservations/update/{id}', [CinemaReservationController::class, 'update'])->name('cinema.reservations.update');
    Route::delete('/cinema/reservations/delete/{id}', [CinemaReservationController::class, 'destroy'])->name('cinema.reservations.delete');

    // Job Applications
    Route::get('/job-application', [JobApplicationController::class, 'index'])->name('job_application');
    Route::get('/job-applications', [JobApplicationController::class, 'index'])->name('job.application.index');
    Route::post('/job-applications/review/{id}', [JobApplicationController::class, 'toggleReview'])->name('job.application.toggleReview');
    Route::delete('/job-applications/delete/{id}', [JobApplicationController::class, 'destroy'])->name('job.application.delete');

    // Menu Items
    Route::get('/menu', [MenuItemController::class, 'index'])->name('menu.index');
    Route::get('/menu/create', [MenuItemController::class, 'create'])->name('menu.create');
    Route::post('/menu', [MenuItemController::class, 'store'])->name('menu.store');
    Route::get('/menu/edit/{id}', [MenuItemController::class, 'edit'])->name('menu.edit');
    Route::put('/menu/update/{id}', [MenuItemController::class, 'update'])->name('menu.update');
    Route::delete('/menu/delete/{id}', [MenuItemController::class, 'destroy'])->name('menu.destroy');

    // Events
    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/edit/{id}', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/update/{id}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/delete/{id}', [EventController::class, 'destroy'])->name('events.destroy');

    // Gallery
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
    Route::get('/gallery/{id}', [GalleryController::class, 'show'])->name('gallery.show');
    Route::delete('gallery/{image}', [GalleryController::class, 'destroy'])->name('gallery.delete');
    Route::get('/gallery/{event}/add', [GalleryController::class, 'add'])->name('gallery.add');
    Route::post('/events/{event}/gallery', [GalleryController::class, 'update'])->name('gallery.update');
    Route::post('/events/gallery/store', [GalleryController::class, 'store'])->name('gallery.store');
    Route::get('/events/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
    // Testimonials
    Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials');

    // Mail
    Route::get('mail-test', function () {
        Mail::to('you@domain.com')->send(new NewAdminCreatedMail(Auth::user(), 'test1234'));
        dd('Sent!');
    });
});

require __DIR__ . '/auth.php';
