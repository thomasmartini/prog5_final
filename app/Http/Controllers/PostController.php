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
            'posts' => Post::latest()->filter(\request(['search', 'category']))->paginate(2),
            'categories' => Category::all()

        ]);
    }

    public function showPost(Post $post)
    {

        return view('post', [

            'post' => $post
        ]);
    }
}
