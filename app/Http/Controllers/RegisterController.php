<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create()
    {

        return view('register.create');
    }

    public function createAdmin()
    {
        return view('admin.create');

    }

    public function storeAdmin()
    {
        $attributes = \request()->validate([

            'name' => 'required|max:255',
            'username' => ['required', 'max:255', Rule::unique('users', 'username')],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => 'required|max:255'
        ]);
        $attributes['role'] = "admin";
        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/admin')->with('succes', 'your admin account has been created');
    }

    public function store()
    {
        $attributes = \request()->validate([

            'name' => 'required|max:255',
            'username' => ['required', 'max:255', Rule::unique('users', 'username')],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => 'required|max:255'
        ]);
        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/')->with('succes', 'your account has been created');
    }
}
