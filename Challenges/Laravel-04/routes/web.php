<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DiscussionController;

Route::get('/',                                                            [DashboardController::class, 'index'])->name('index');
Route::get('/dashboard',                                                   [DashboardController::class, 'index']);
Route::get('/dashboard/{discussion}',                                      [DiscussionController::class, 'show'])->name('discussion.show');

Route::middleware('auth')->group(function () {
    Route::get('/newDiscussion',                                           [DiscussionController::class, 'create'])->name('new.discussion');
    Route::post('/newDiscussion',                                          [DiscussionController::class, 'store'])->name('store.discussion');
    Route::get('/dashboard/{discussion}/edit',                             [DiscussionController::class, 'edit'])->name('discussion.edit');
    Route::patch('/dashboard/{discussion}/update',                         [DiscussionController::class, 'update'])->name('discussion.update');
    Route::delete('/dashboard/{discussion}/delete',                        [DiscussionController::class, 'destroy'])->name('discussion.destroy');


    Route::get('/dashboard/{discussion}/comment',                          [CommentsController::class, 'create'])->name('comment.create');
    Route::post('/dashboard/{discussion}/comment',                         [CommentsController::class, 'store'])->name('comment.store');
    Route::get('/comment/{comment}/edit',                                  [CommentsController::class, 'edit'])->name('comment.edit');
    Route::patch('/comment/{comment}/edit',                                [CommentsController::class, 'update'])->name('comment.update');
    Route::delete('/comment/{comment}/delete',                             [CommentsController::class, 'destroy'])->name('comment.destroy');
});

require __DIR__ . '/auth.php';
