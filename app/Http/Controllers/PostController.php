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
        if (auth()->id() != implode(\request(['user_id']))) {

            abort(403);
        }
        $post->delete();
        return redirect('/')->with('succes', 'post has been deleted');


    }

    public function showPost(Post $post)
    {

        return view('post', [

            'post' => $post
        ]);
    }

    public function edit(Post $post)
    {

        return view('edit', ['post' => $post]);

    }
    public function update(Post $post){
        $attributes = \request()->validate([
            "thumbnail" => 'image',
            "title" => 'required',
            "body" => 'required',
            "category_id" => ['required', Rule::exists('categories', 'id')]
        ]);

        if (\request(['thumbnail'])) {
            $attributes['thumbnail'] = \request()->file('thumbnail')->store('thumbnails');
        }
        $post->update($attributes);
        return back()->with('succes', 'Post updated');
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

        if (\request(['thumbnail'])) {
            $attributes['thumbnail'] = \request()->file('thumbnail')->store('thumbnails');
        }
        $attributes['user_id'] = auth()->id();
        $attributes['slug'] = Str::slug($attributes["title"], "-");

        Post::create($attributes);
        return redirect('/');

    }
}

