<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use function Composer\Autoload\includeFile;

class PostController extends Controller
{
    public function index()
    {

        return view('forum', [
            'posts' => Post::latest()->Where('active', 1)
                ->filter(\request(['search', 'category', 'user']))->paginate(10)->withQueryString(),
            'categories' => Category::all(),
            'currentCategory' => Category::firstWhere('slug', \request('category'))

        ]);
    }

    public function destroy(Post $post)
    {

        $post->delete();
        if (auth()->user()->role == 'admin'){

            return redirect('/admin')->with('succes', 'post has been deleted');
        }
        return redirect('/')->with('succes', 'post has been deleted');


    }

    public function showPost(Post $post)
    {

        return view('post', [

            'post' => $post
        ]);
    }

    public function active(Post $post){
        if ($post->active){
            Post::where('id',$post['id'])->update(['active' => false]);

        }
        else{
            Post::where('id',$post['id'])->update(['active' => true]);
        }
        return back();
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
        return redirect('forum/' . $post->slug)->with('succes', 'Post updated');
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

