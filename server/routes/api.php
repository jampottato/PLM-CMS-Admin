<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::redirect('/', 'login');
use App\Http\Controllers\PostController;

Route::group(['middleware' => ['web', 'guest']], function(){
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/connect', [AuthController::class, 'connect'])->name('connect');
});

Route::group(['middleware' => ['web', 'MsGraphAuthenticated'], 'prefix' => 'app'], function(){
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
   
    // Show form to create a post
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

    // Store a new post
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

});

