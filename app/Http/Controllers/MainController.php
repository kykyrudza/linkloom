<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MainController extends Controller
{
    public function index(): View|RedirectResponse
    {
        if (! Auth::check()) {
            return view('main.index');
        }

        return redirect()->route('profile', [
            'id' => Auth::id(),
            'nickname' => Auth::user()->nickname,
        ]);
    }
}
