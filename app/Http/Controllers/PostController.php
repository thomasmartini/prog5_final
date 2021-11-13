<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {

        return view('forum', [
            'posts' => Post::latest()->filter(\request(['search', 'category', 'user']))->paginate(20)->withQueryString(),
            'categories' => Category::all(),
            'currentCategory' => Category::firstWhere('slug', \request('category'))

        ]);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/')->with('succes', 'post has been deleted');


    }

    public function showPost(Post $post)
    {

        return view('post', [

            'post' => $post
        ]);
    }

    public function create()
    {
        if (auth()->guest()) {

            abort(403);
        }

        return view('create', [


            'posts' => Post::latest()->filter(\request(['search', 'category', 'user']))->paginate(20)->withQueryString(),
            'categories' => Category::all(),
        ]);

    }

    public function store()
    {

        $attributes = \request()->validate([
            "thumbnail" => 'image',
            "title" => 'required',
            "body" => 'required',
            "category_id" => ['required', Rule::exists('categories', 'id')]
        ]);
        $attributes['thumbnail'] = \request()->file('thumbnail')->store('thumbnails');
        $attributes['user_id'] = auth()->id();
        $attributes['slug'] = Str::slug($attributes["title"], "-");

        Post::create($attributes);
        return redirect('/');

    }
}

