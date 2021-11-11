<?php

use App\Http\Controllers\PostController;

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;



Route::get('/', [PostController::class, 'index']);
Route::get('forum/{post:slug}', [PostController::class, 'showPost']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store']);


