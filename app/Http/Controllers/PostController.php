<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

        return view('forum', [
            'posts' => Post::latest()->filter(\request(['search', 'category','user']))->paginate(20)->withQueryString(),
            'categories' => Category::all(),
            'currentCategory' => Category::firstWhere('slug', \request('category'))

        ]);
    }

    public function showPost(Post $post)
    {

        return view('post', [

            'post' => $post
        ]);
    }
}
