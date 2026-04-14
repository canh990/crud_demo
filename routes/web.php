<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudUserController;

Route::get('/', [CrudUserController::class, 'listUser']);
Route::get('/list', [CrudUserController::class, 'listUser'])->name('list');
Route::get('/users', [CrudUserController::class, 'listUser'])->name('user.list');
