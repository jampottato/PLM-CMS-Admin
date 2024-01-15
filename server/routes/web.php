<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdmirationsController;


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



Route::post('tag/create', [TagController::class, 'store'])->name('tag.create');
Route::get('tags', [TagController::class, 'index'])->name('tag.index');
Route::get('tag/{id}', [TagController::class, 'show'])->name('tag.show');
Route::put('tag/update/{id}', [TagController::class, 'update'])->name('tags.update');
Route::delete('tag/{id}', [TagController::class, 'destroy'])->name('tags.destroy');


Route::post('contact/create', [ContactController::class, 'store'])->name('contact.create');
Route::get('contacts', [ContactController::class, 'index'])->name('contact.index');
Route::get('contact/{id}', [ContactController::class, 'show'])->name('contact.show');
Route::put('contact/update/{id}', [ContactController::class, 'update'])->name('contacts.update');
Route::delete('contact/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');

Route::post('admirations/create', [AdmirationsController::class, 'store'])->name('admirations.create');
Route::get('admirations', [AdmirationsController::class, 'index'])->name('admirations.index');
Route::get('admirations/{id}', [AdmirationsController::class, 'show'])->name('admirations.show');
Route::put('admirations/update/{id}', [AdmirationsController::class, 'update'])->name('admirations.update');
Route::delete('admirations/{id}', [AdmirationsController::class, 'destroy'])->name('admirations.destroy');