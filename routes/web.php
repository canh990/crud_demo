<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudUserController;

Route::get('dashboard', [CrudUserController::class, 'dashboard']);


Route::get('list', [CrudUserController::class, 'listUser'])->name('user.list');


Route::get('/', function () {
    return view('welcome');
});