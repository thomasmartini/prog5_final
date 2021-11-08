<?php

use App\Models\Category;
use App\Models\Post;
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

Route::get('/', function () {
    return view('forum', [
        'posts' => Post::latest() -> with('category', 'user')->get()

    ]);
});

Route::get('forum/{post:slug}', function(Post $post){
    return view('post',[

        'post' => $post
    ]);

});

Route::get('categories/{category}', function(Category $category ){
    return view('forum', [
        'posts' => $category->posts->load(['category', 'user'])
    ]);

});


Route::get('authors/{user}', function(User $user ){
    return view('forum', [
        'posts' => $user->posts->load(['category', 'user'])
    ]);

});

