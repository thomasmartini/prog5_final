<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create()
    {
        return view('sessions.create');

    }

    public function store()
    {
        $attributes = \request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (auth()->attempt($attributes)) {
            return redirect('/')->with('succes', 'Logged In');

        }
        return back()
            ->withInput()
            ->withErrors(['email' => 'E-mail or password is incorrect']);
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('succes', 'you have been logged out');
    }

}
