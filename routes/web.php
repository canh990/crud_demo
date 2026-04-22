<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudUserController;

Route::get('dashboard', [CrudUserController::class, 'dashboard']);


Route::get('list', [CrudUserController::class, 'listUser'])->name('user.list');


Route::get('/', function () {
    return view('welcome');
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [CrudUserController::class, 'showLogin'])->name('login');
Route::post('/login', [CrudUserController::class, 'login']);
Route::get('/register', [CrudUserController::class, 'showRegister'])->name('register');
Route::post('/register', [CrudUserController::class, 'register']);
Route::get('/logout', [CrudUserController::class, 'ssignout'])->name('signout');

Route::get('dashboard', [CrudUserController::class, 'dashboard'])->name('dashboard');
Route::get('/user/create', [CrudUserController::class, 'createUser'])->name('user.createUser');

Route::get('/', function () {
    return view('welcome');
});
