@extends('layouts.AuthLayout')

@section('title', 'Sign In')

@section('auth_content')
    <div class="mb-8">
        <h1 class="text-gray-900 text-3xl mb-2">Welcome back</h1>
        <p class="text-gray-400 text-sm">Sign in to your LinkLoom account</p>
    </div>

    @if ($errors->any())
        <div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-100">
            <p class="text-red-600 text-sm">{{ $errors->first() }}</p>
        </div>
    @endif

    <form method="POST" action="{{ route('login.store') }}" class="space-y-0">
        @csrf
        <x-auth.form-input type="email" name="email" placeholder="you@example.com" label="Email" />
        <x-auth.form-input type="password" name="password" placeholder="Your password" label="Password" />
        <div class="pt-2">
            <x-auth.form-button>Sign In</x-auth.form-button>
        </div>
    </form>

    <p class="text-center text-sm text-gray-400 mt-6">
        Don't have an account?
        <a href="{{ route('register') }}" class="text-red-600 hover:text-red-700 transition-colors hover:underline underline-offset-2">
            Create one
        </a>
    </p>
@endsection
