<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('home'))->name('home');
Route::get('/about', fn () => view('about'))->name('about');
Route::get('/education', fn () => view('education'))->name('education');

Route::resource('projects', ProjectController::class);

Route::get('/posts/trash', [PostController::class, 'trash'])
    ->name('posts.trash');
Route::patch('/posts/{id}/restore', [PostController::class, 'restore'])
    ->name('posts.restore');
Route::delete('/posts/{id}/force-delete', [PostController::class, 'forceDelete'])
    ->name('posts.forceDelete');
Route::resource('posts', PostController::class);
