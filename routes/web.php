<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudUserController;

Route::get('dashboard', [CrudUserController::class, 'dashboard']);

Route::get('list', [CrudUserController::class, 'listUser'])->name('user.list');

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('login', [CrudUserController::class, 'login'])->name('login');
Route::post('login', [CrudUserController::class, 'authUser'])->name('user.authUser');
Route::get('/register', [CrudUserController::class, 'showRegister'])->name('register');
Route::post('/register', [CrudUserController::class, 'register']);
Route::get('/logout', [CrudUserController::class, 'ssignout'])->name('signout');

Route::get('dashboard', [CrudUserController::class, 'dashboard'])->name('dashboard');
Route::get('/user/create', [CrudUserController::class, 'createUser'])->name('user.createUser');