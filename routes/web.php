<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/my_list', [PostController::class, 'index'])->name('post.index');

    Route::get('post/new', [PostController::class, 'create'])->name('post.create');
    Route::post('post/store', [PostController::class, 'store'])->name('post.store');
    Route::get('post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::put('post/{id}/update', [PostController::class, 'update'])->name('post.update');
    Route::get('post/{id}/destroy', [PostController::class, 'destroy'])->name('post.destroy');

    Route::post('/posts/vote', [PostController::class, 'postVote'])->name('post.vote');
    Route::post('/posts/follow', [PostController::class, 'postFollow'])->name('post.follow');

    Route::get('/following', [DashboardController::class, 'follow'])->name('following');
});

require __DIR__ . '/auth.php';
