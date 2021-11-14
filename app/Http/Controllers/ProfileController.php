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

            'posts' => Post::Where('user_id', \request(['id']))
                ->filter(\request(['search', 'category', 'user']))->latest()->paginate(10)->withQueryString(),
            'categories' => Category::all(),

        ]);
    }
    //
}
