<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function index(): View
    {
        return view('auth.register.index');
    }

    public function store(RegisterRequest $request): RedirectResponse
    {
        $user = User::create($request->safe()->only([
            'nickname',
            'first_name',
            'last_name',
            'email',
            'password',
        ]));

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('main');
    }
}
