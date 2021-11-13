<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PostController::class, 'index']);
Route::get('forum/{post:slug}', [PostController::class, 'showPost']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::get('forum/posts/create', [PostController::class, 'create'])->middleware('auth');
Route::post('forum/posts', [PostController::class, 'store'])->middleware('auth');
Route::delete('forum/{post:id}/delete', [PostController::class, 'destroy'])->middleware('auth');
Route::get('forum/{post:id}/edit', [PostController::class, 'edit'])->middleware('auth');
Route::patch('forum/posts/{post:id}', [PostController::class, 'update'])->middleware('auth');

Route::get('profile/{id}',[ProfileController::class, 'index'])->middleware('auth');

Route::get('admin', [AdminController::class, 'index'])->middleware('admin');

