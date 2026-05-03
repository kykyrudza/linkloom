@extends('layouts.layout')

@section('title', 'About')

@section('content')

<section class="relative pt-20 pb-24 px-6 overflow-hidden">
    <div class="absolute inset-0 dot-bg"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[600px] h-[350px] opacity-20 blur-3xl rounded-full pointer-events-none"
         style="background: radial-gradient(ellipse, rgba(220,38,38,0.3) 0%, transparent 70%);"></div>
    <div class="relative z-10 max-w-screen-lg mx-auto text-center">
        <span class="chip mb-6 inline-flex">Our story</span>
        <h1 class="text-5xl sm:text-6xl text-gray-900 mb-6 leading-tight">
            We built LinkLoom<br>for <span class="gradient-text">creators</span>
        </h1>
        <p class="text-gray-500 text-lg max-w-2xl mx-auto leading-relaxed">
            LinkLoom started with a simple idea: every creative person deserves a beautiful, unified space to share their work with the world.
        </p>
    </div>
</section>

<div class="section-divider"></div>

<section class="py-20 px-6">
    <div class="max-w-screen-xl mx-auto">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <span class="chip mb-5 inline-flex">Our mission</span>
                <h2 class="text-4xl text-gray-900 mb-5 leading-tight">Empowering creativity<br>through connection</h2>
                <p class="text-gray-500 text-sm leading-relaxed mb-4">
                    We believe that creativity thrives when it's shared. Too often, talented creators are scattered across dozens of platforms, making it hard for anyone to see the full picture of their work.
                </p>
                <p class="text-gray-500 text-sm leading-relaxed">
                    LinkLoom brings it all together — your projects, your social presence, your story — in one elegant profile that you can share anywhere.
                </p>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="custom-box rounded-3xl p-6 card-hover">
                    <i class="fas fa-heart text-red-500 text-2xl mb-3"></i>
                    <p class="text-gray-900 text-sm mb-1">Built with passion</p>
                    <p class="text-gray-400 text-xs">Every detail designed for creators</p>
                </div>
                <div class="custom-box rounded-3xl p-6 card-hover mt-6">
                    <i class="fas fa-globe text-red-500 text-2xl mb-3"></i>
                    <p class="text-gray-900 text-sm mb-1">Global community</p>
                    <p class="text-gray-400 text-xs">Creators from around the world</p>
                </div>
                <div class="custom-box rounded-3xl p-6 card-hover">
                    <i class="fas fa-shield-alt text-red-500 text-2xl mb-3"></i>
                    <p class="text-gray-900 text-sm mb-1">Privacy first</p>
                    <p class="text-gray-400 text-xs">Your data, your control</p>
                </div>
                <div class="custom-box rounded-3xl p-6 card-hover mt-6">
                    <i class="fas fa-infinity text-red-500 text-2xl mb-3"></i>
                    <p class="text-gray-900 text-sm mb-1">Always free</p>
                    <p class="text-gray-400 text-xs">Core features remain free forever</p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="section-divider"></div>

<section class="py-20 px-6">
    <div class="max-w-screen-xl mx-auto">
        <div class="text-center mb-14">
            <span class="chip mb-4 inline-flex">What drives us</span>
            <h2 class="text-4xl text-gray-900">Our core values</h2>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach([
                ['fa-eye', 'Transparency', 'We are open about what we do and how we use your data.'],
                ['fa-users', 'Community', 'Building meaningful connections between creators worldwide.'],
                ['fa-star', 'Quality', 'Every feature is crafted with care and attention to detail.'],
                ['fa-rocket', 'Innovation', 'Continuously improving to better serve our creative community.'],
            ] as [$icon, $title, $desc])
            <div class="custom-box rounded-3xl p-7 text-center card-hover">
                <div class="w-12 h-12 rounded-2xl bg-red-50 border border-red-100 flex items-center justify-center mx-auto mb-4">
                    <i class="fas {{ $icon }} text-red-500 text-lg"></i>
                </div>
                <h3 class="text-gray-900 text-sm mb-2">{{ $title }}</h3>
                <p class="text-gray-400 text-xs leading-relaxed">{{ $desc }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<div class="section-divider"></div>

<section class="py-20 px-6">
    <div class="max-w-screen-md mx-auto text-center">
        <h2 class="text-4xl text-gray-900 mb-4">Ready to join us?</h2>
        <p class="text-gray-400 text-sm mb-8">Create your LinkLoom profile today and start sharing your work with the world.</p>
        <div class="flex gap-4 justify-center">
            <a href="{{ route('register') }}" class="btn-primary text-sm px-8 py-3.5">Get started free</a>
            <a href="{{ route('contacts') }}" class="btn-outline text-sm px-8 py-3.5">Contact us</a>
        </div>
    </div>
</section>

@endsection
