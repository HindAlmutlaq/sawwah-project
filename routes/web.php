<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MessageController;

Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/contact', [MessageController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [MessageController::class, 'store'])->name('contact.store');

Route::middleware('auth')->group(function () {

    Route::get('/home', function () {
        return view('main', ['page' => 'home']);
    });

    Route::get('/dashboard', [MessageController::class, 'index'])->name('dashboard');


    Route::get('/dashboard/messages', [MessageController::class, 'index'])->name('dashboard.messages');

    Route::delete('/dashboard/messages/{id}', [MessageController::class, 'destroy'])->name('messages.destroy');

Route::get('/dashboard/messages/{id}/edit', [MessageController::class, 'edit'])->name('messages.edit');
Route::put('/dashboard/messages/{id}', [MessageController::class, 'update'])->name('messages.update');

});

