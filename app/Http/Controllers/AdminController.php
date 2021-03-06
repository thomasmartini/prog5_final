<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

        return view('admin.admin', ['posts' => Post::latest()->paginate(20)
        ]);
    }

}
