<?php

use App\Http\Controllers\PostController;

use Illuminate\Support\Facades\Route;



Route::get('/', [PostController::class, 'index']);
Route::get('forum/{post:slug}', [PostController::class, 'showPost']);



