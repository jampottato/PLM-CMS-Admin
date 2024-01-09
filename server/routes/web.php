<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::redirect('/', 'login');

Route::group(['middleware' => ['web', 'guest']], function(){
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::get('connect', [AuthController::class, 'connect'])->name('connect');
});

Route::group(['middleware' => ['web', 'MsGraphAuthenticated'], 'prefix' => 'app'], function(){
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});



Route::post('user/create', [UserController::class, 'store'])->name('user.create');
Route::get('users', [UserController::class, 'index'])->name('user.index');
Route::get('user/{id}', [UserController::class, 'show'])->name('user.show');
Route::put('user/update/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('user/{id}', [UserController::class, 'destroy'])->name('users.destroy');