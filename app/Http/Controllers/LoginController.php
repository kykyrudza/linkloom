<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController
{
    public function index()
    {
        return view('auth.login.index');
    }

    public function store(Request $request)
    {

        $request->validate([
            'email' => 'email|required',
            'password' => 'required|string|min:8',
        ]);

        auth()->attempt($request->only('email', 'password'));

        return redirect('/');
    }
}
