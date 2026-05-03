@extends('layouts.AuthLayout')

@section('title', 'Create Account')

@section('auth_content')
    <div class="mb-8">
        <h1 class="text-gray-900 text-3xl mb-2">Create account</h1>
        <p class="text-gray-400 text-sm">Join thousands of creators on LinkLoom</p>
    </div>

    @if ($errors->any())
        <div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-100">
            <p class="text-red-600 text-sm">{{ $errors->first() }}</p>
        </div>
    @endif

    <form method="POST" action="{{ route('register.store') }}">
        @csrf
        <div class="grid sm:grid-cols-2 gap-x-5">
            <x-auth.form-input type="text" name="nickname" placeholder="your_nickname" label="Nickname" autofocus />
            <x-auth.form-input type="email" name="email" placeholder="you@example.com" label="Email" />
            <x-auth.form-input type="text" name="first_name" placeholder="John" label="First Name" />
            <x-auth.form-input type="text" name="last_name" placeholder="Doe" label="Last Name" />
            <x-auth.form-input type="password" name="password" placeholder="Min. 8 characters" label="Password" />
            <x-auth.form-input type="password" name="password_confirmation" placeholder="Repeat password" label="Confirm Password" />
        </div>
        <x-auth.form-button>Create Account</x-auth.form-button>
    </form>

    <p class="text-center text-sm text-gray-400 mt-6">
        Already have an account?
        <a href="{{ route('login') }}" class="text-red-600 hover:text-red-700 transition-colors hover:underline underline-offset-2">
            Sign in
        </a>
    </p>
@endsection
