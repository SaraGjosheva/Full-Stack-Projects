<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->name('home');

Route::get('/login', [UserController::class, 'create'])->name('create');
Route::post('/login', [UserController::class, 'store'])->name('store');
Route::get('/not-found', [UserController::class, 'notFound'])->name('not-found');
Route::get('/logout', [UserController::class, 'destroy'])->name('logout');

Route::get('/information/{key}', [UserController::class, 'show'])->name('information');
