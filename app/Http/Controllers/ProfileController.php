<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
      if (auth()->id() != implode(\request(['id']))) {

            abort(403);
        }
        else
        return view('profile', [


            'posts' => Post::latest()->filter(\request(['search', 'category', 'user']))->paginate(10)->withQueryString(),
            'categories' => Category::all(),

        ]);

    }
    //
}
