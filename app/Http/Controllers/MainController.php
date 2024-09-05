<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $nickname = Auth::check() ? Auth::user()->nickname : null;

        return view('main.index', compact('userId', 'nickname'));
    }
}
