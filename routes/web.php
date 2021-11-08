<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class, 'index']);



Route::get('forum/{post:slug}', [PostController::class, 'showPost']);

Route::get('categories/{category}', function(Category $category ){
    return view('forum', [
        'posts' => $category->posts->load(['category', 'user']),
        'categories' => Category::all()
    ]);

});


Route::get('authors/{user}', function(User $user ){
    return view('forum', [
        'posts' => $user->posts->load(['category', 'user']),
        'categories' => Category::all()
    ]);

});

