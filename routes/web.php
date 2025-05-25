<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home'); // homepage shows posts list

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home.dashboard'); // rename route name to avoid conflict

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('posts')->name('posts.')->group(function () {
    Route::get('/submit', [PostController::class, 'create'])->name('create');
    Route::post('/submit', [PostController::class, 'store'])->name('store');
});

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/posts', [AdminController::class, 'index'])->name('posts.index');
    Route::post('/posts/{post}/accept', [AdminController::class, 'accept'])->name('posts.accept');
    Route::post('/posts/{post}/decline', [AdminController::class, 'decline'])->name('posts.decline');
});


require __DIR__.'/auth.php';
