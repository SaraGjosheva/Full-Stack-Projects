<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\MenuController;
use App\Http\Controllers\API\EventController;
use App\Http\Controllers\API\ApplicationController;
use App\Http\Controllers\API\CinemaReservationController;
use App\Http\Controllers\API\JobApplicationApiController;
use App\Http\Controllers\API\CocktailReservationController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/events', [EventController::class, 'index']);

Route::get('/menu', [MenuController::class, 'index']);

Route::post('/cocktail-reservations', [CocktailReservationController::class, 'store']);

Route::post('/cinema-reservations', [CinemaReservationController::class, 'store']);

Route::post('/job-applications', [JobApplicationApiController::class, 'store']);



// Route::post('/cinema-application', [ApplicationController::class, 'hallApplication']);

// http://localhost::8000/api/hall-reservation
