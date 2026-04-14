<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudUserController;

Route::get('/', [CrudUserController::class, 'listUser'])->name('home');
Route::get('/list', [CrudUserController::class, 'listUser'])->name('list');
Route::get('/signout', function () {
    return redirect()->route('user.list');
})->name('signout');

Route::prefix('users')->name('user.')->group(function () {
    Route::get('/', [CrudUserController::class, 'listUser'])->name('list');
    Route::get('/{user}', [CrudUserController::class, 'readUser'])->name('readUser');
    Route::get('/{user}/edit', [CrudUserController::class, 'editUser'])->name('updateUser');
    Route::put('/{user}', [CrudUserController::class, 'saveUser'])->name('saveUser');
    Route::delete('/{user}', [CrudUserController::class, 'deleteUser'])->name('deleteUser');
});
