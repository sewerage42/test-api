<?php

use App\Http\Controllers\AdminPanel\AdminPanelController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\PolygonController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\Tag\TagController;
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

    Route::get('posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('posts/create', [PostController::class, 'store'])->name('posts.store');
    Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::patch('posts/{post}', [PostController::class, 'update'])->name('posts.update');


    Route::get('blogs/create', [BlogController::class, 'create'])->name('blogs.create');
    Route::post('blogs/create', [BlogController::class, 'store'])->name('blogs.store');
    Route::get('blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::patch('blogs/{blog}', [BlogController::class, 'update'])->name('blogs.update');
    Route::delete('blogs/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');

    Route::get('tags', [TagController::class, 'index'])->name('tags.index');
    Route::get('tags/create', [TagController::class, 'create'])->name('tags.create');
    Route::post('tags/create', [TagController::class, 'store'])->name('tags.store');

});

Route::get('blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show');

Route::get('polygon', [PolygonController::class, 'index'])->name('polygon');





