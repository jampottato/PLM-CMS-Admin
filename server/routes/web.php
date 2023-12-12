<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;

Route::redirect('/', 'login');
use App\Http\Controllers\PostController;

Route::group(['middleware' => ['web', 'guest']], function(){
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/connect', [AuthController::class, 'connect'])->name('connect');
});

Route::group(['middleware' => ['web', 'MsGraphAuthenticated'], 'prefix' => 'app'], function(){
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

// Show form to create a post
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

// Store a new post
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
