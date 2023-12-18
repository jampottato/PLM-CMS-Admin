<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;

Route::redirect('/', 'login');

Route::group(['middleware' => ['web', 'guest']], function(){
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::get('connect', [AuthController::class, 'connect'])->name('connect');
});

Route::group(['middleware' => ['web', 'MsGraphAuthenticated'], 'prefix' => 'app'], function(){
    Route::get('/', [PagesController::class, 'app'])->name('app');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

// Route::get('/{any}', function () {
//     return redirect('http://localhost:5173');
// })->where('any', '.*');