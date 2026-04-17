<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// 1. Trang chủ
Route::get('/', function () {
    return view('welcome');
});

// CRUD routes cho Users
Route::get('/users', [UserController::class, 'list'])->name('users.list');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

// Redirect register to create
Route::get('/register', [UserController::class, 'create'])->name('register');

// Test controller
Route::get('/test-controller', [UserController::class, 'index']);