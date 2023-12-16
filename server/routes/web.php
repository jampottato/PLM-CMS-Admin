<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserDataController;

Route::redirect('/', 'login');
use App\Http\Controllers\PostController;

    Route::group(['middleware' => ['web', 'guest']], function(){
        Route::get('/login', [AuthController::class, 'login'])->name('login');
        Route::get('/connect', [AuthController::class, 'connect'])->name('connect');
    });

    Route::group(['middleware' => ['web', 'MsGraphAuthenticated'], 'prefix' => 'app'], function(){
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');

});

// Userdata Creation

Route::get('/userdatas', [UserDataController::class, 'index'])->name('userdatas.index');
Route::get('/userdatas/create', [UserDataController::class, 'create'])->name('userdatas.create');
Route::post('/userdatas', [UserDataController::class, 'store'])->name('userdatas.store');
Route::get('/userdatas/{userData}', [UserDataController::class, 'show'])->name('userdatas.show');
Route::get('/userdatas/{userData}/edit', [UserDataController::class, 'edit'])->name('userdatas.edit');
Route::put('/userdatas/{userData}', [UserDataController::class, 'update'])->name('userdatas.update');
Route::delete('/userdatas/{userData}', [UserDataController::class, 'destroy'])->name('userdatas.destroy');
