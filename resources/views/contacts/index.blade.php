@extends('layouts.layout')

@section('title', 'Contact')

@section('content')

<section class="relative pt-20 pb-16 px-6 overflow-hidden">
    <div class="absolute inset-0 dot-bg"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[500px] h-[300px] opacity-20 blur-3xl rounded-full pointer-events-none"
         style="background: radial-gradient(ellipse, rgba(220,38,38,0.3) 0%, transparent 70%);"></div>
    <div class="relative z-10 max-w-screen-lg mx-auto text-center">
        <span class="chip mb-6 inline-flex">Get in touch</span>
        <h1 class="text-5xl sm:text-6xl text-gray-900 mb-5 leading-tight">
            We'd love to<br><span class="gradient-text">hear from you</span>
        </h1>
        <p class="text-gray-500 text-lg max-w-xl mx-auto">
            Have a question, feedback, or just want to say hello? We're here for you.
        </p>
    </div>
</section>

<div class="section-divider"></div>

<section class="py-16 px-6">
    <div class="max-w-screen-lg mx-auto">
        <div class="grid lg:grid-cols-5 gap-8">

            <!-- Contact info -->
            <div class="lg:col-span-2 space-y-3">
                <h2 class="text-gray-900 text-2xl mb-6">Contact info</h2>
                @foreach([
                    ['fa-envelope', 'Email', 'hello@linkloom.com'],
                    ['fab fa-telegram', 'Telegram', '@linkloom'],
                    ['fab fa-discord', 'Discord', 'LinkLoom Community'],
                ] as [$icon, $label, $value])
                <div class="custom-box rounded-2xl p-5 flex items-start gap-4 card-hover">
                    <div class="w-10 h-10 rounded-xl bg-red-50 border border-red-100 flex items-center justify-center flex-shrink-0">
                        <i class="{{ str_contains($icon, 'fab') ? $icon : 'fas '.$icon }} text-red-500 text-sm"></i>
                    </div>
                    <div>
                        <p class="text-gray-700 text-sm mb-0.5">{{ $label }}</p>
                        <p class="text-gray-400 text-xs">{{ $value }}</p>
                    </div>
                </div>
                @endforeach

                <div class="custom-box rounded-2xl p-5 mt-2">
                    <p class="text-gray-700 text-sm mb-3">Follow us</p>
                    <div class="flex gap-2">
                        @foreach(['instagram', 'twitter', 'github', 'discord'] as $soc)
                        <a href="#" class="icon__bounce w-9 h-9 custom-box rounded-full text-gray-400 hover:text-red-500 text-sm">
                            <i class="fab fa-{{ $soc }}"></i>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Contact form -->
            <div class="lg:col-span-3">
                <div class="custom-box rounded-3xl p-8">
                    <h2 class="text-gray-900 text-xl mb-6">Send a message</h2>
                    <form class="space-y-4">
                        @csrf
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs text-gray-400 mb-1.5">First Name</label>
                                <input type="text" placeholder="John" class="form-input-dark text-sm">
                            </div>
                            <div>
                                <label class="block text-xs text-gray-400 mb-1.5">Last Name</label>
                                <input type="text" placeholder="Doe" class="form-input-dark text-sm">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs text-gray-400 mb-1.5">Email</label>
                            <input type="email" placeholder="you@example.com" class="form-input-dark text-sm">
                        </div>
                        <div>
                            <label class="block text-xs text-gray-400 mb-1.5">Subject</label>
                            <input type="text" placeholder="How can we help?" class="form-input-dark text-sm">
                        </div>
                        <div>
                            <label class="block text-xs text-gray-400 mb-1.5">Message</label>
                            <textarea rows="5" placeholder="Tell us more..." class="form-input-dark text-sm" style="resize: none;"></textarea>
                        </div>
                        <button type="submit" class="btn-primary text-sm w-full py-3">
                            Send Message
                            <i class="fas fa-paper-plane ml-2 text-xs"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
