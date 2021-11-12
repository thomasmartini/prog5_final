<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
      //if (auth()->id() != ) {

        //    abort(403);
        //}
ddd(\request()->all());
        return view('profile', [


            'posts' => Post::latest()->filter(\request(['search', 'category', 'user']))->paginate(20)->withQueryString(),
            'categories' => Category::all(),

        ]);

    }
    //
}
