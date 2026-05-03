@extends('layouts.layout')

@section('title', 'Access Denied')

@section('content')
<div class="flex items-center justify-center min-h-[80vh] px-6">
    <div class="text-center max-w-md">
        <div class="w-20 h-20 rounded-3xl bg-red-50 border border-red-100 flex items-center justify-center mx-auto mb-6">
            <i class="fas fa-lock text-red-500 text-2xl"></i>
        </div>
        <h1 class="text-gray-900 text-4xl mb-3">Access denied</h1>
        <p class="text-gray-400 text-sm mb-8 leading-relaxed">
            You don't have permission to view this page. Please make sure you're logged in with the right account.
        </p>
        <div class="flex gap-3 justify-center">
            <a href="{{ route('main') }}" class="btn-primary text-sm px-6 py-3">Go home</a>
            @guest
                <a href="{{ route('login') }}" class="btn-outline text-sm px-6 py-3">Sign in</a>
            @endguest
        </div>
    </div>
</div>
@endsection
