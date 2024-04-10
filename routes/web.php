<?php

use App\Http\Controllers\AdminPanel\AdminPanelController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('admin/login', [AdminPanelController::class, 'login'])->name('admin.login');
    Route::post('admin/login', [AdminPanelController::class, 'loginProcess'])->name('admin.login_process');
});

Route::middleware('auth')->group(function () {

    Route::get('admin/logout', [AdminPanelController::class, 'logout'])->name('admin.logout');
    Route::get('/', [AdminPanelController::class, 'redirect'])->name('home');
    Route::get('admin', [AdminPanelController::class, 'index'])->name('admin.index');

    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('users', [UserController::class, 'store'])->name('users.store');
    Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::patch('users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

});



