<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{

    public function index()
    {
        return view('auth.register.index');
    }

    public function store(Request $request)
    {

        $request->validate([
            'nickname' => 'required|string|unique:users|regex:/^[a-zA-Z0-9]+$/|max:32',
            'first_name' => 'required|string|max:32',
            'last_name' => 'required|string|max:32',
            'email' => 'email|required|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'nickname' => $request->nickname,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        Auth::login($user);

        return redirect('/');
    }

}
