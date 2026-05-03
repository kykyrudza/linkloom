@extends('layouts.layout')

@section('title', 'Projects')

@section('content')

<section class="relative pt-20 pb-16 px-6 overflow-hidden">
    <div class="absolute inset-0 dot-bg"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[600px] h-[350px] opacity-20 blur-3xl rounded-full pointer-events-none"
         style="background: radial-gradient(ellipse, rgba(220,38,38,0.3) 0%, transparent 70%);"></div>
    <div class="relative z-10 max-w-screen-lg mx-auto text-center">
        <span class="chip mb-6 inline-flex">
            <i class="fas fa-border-all mr-1.5 text-xs"></i>
            Community showcase
        </span>
        <h1 class="text-5xl sm:text-6xl text-gray-900 mb-5 leading-tight">
            Explore amazing<br><span class="gradient-text">creative work</span>
        </h1>
        <p class="text-gray-500 text-lg max-w-xl mx-auto">
            Discover projects from talented creators across design, development, photography, and more.
        </p>
    </div>
</section>

<div class="section-divider"></div>

<!-- Filters + Search -->
<section class="py-5 px-6 sticky top-[65px] z-40 bg-[#f5f5f7]/90 backdrop-blur-md border-b border-black/5"
         x-data="{ active: 'all' }">
    <div class="max-w-screen-xl mx-auto flex flex-col sm:flex-row gap-4 items-start sm:items-center justify-between">
        <div class="relative w-full sm:w-72">
            <input type="text" placeholder="Search projects..." class="form-input-dark text-sm pl-9">
            <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
        </div>
        <div class="flex gap-2 overflow-x-auto custom-scrollbar pb-1">
            @foreach([['all', 'All'], ['design', 'Design'], ['dev', 'Dev'], ['photo', 'Photo'], ['video', 'Video'], ['art', 'Art']] as [$id, $label])
                <button @click="active = '{{ $id }}'"
                        :class="active === '{{ $id }}' ? 'bg-red-600 text-white border-transparent' : 'text-gray-500 hover:text-gray-900 border-gray-200'"
                        class="flex-shrink-0 px-4 py-1.5 rounded-full text-xs border bg-white transition-all shadow-sm">
                    {{ $label }}
                </button>
            @endforeach
        </div>
    </div>
</section>

<!-- Projects grid -->
<section class="py-12 px-6">
    <div class="max-w-screen-xl mx-auto">
        @php
        $projects = [
            ['Dashboard UI Kit', 'nova_design', 'Design', 142],
            ['E-commerce App', 'code_wizard', 'Development', 89],
            ['Urban Photography', 'lens_artist', 'Photography', 234],
            ['Brand Identity', 'pixel_craft', 'Design', 67],
            ['Mobile Wallet', 'dev_studio', 'Development', 112],
            ['Music Video', 'motion_lab', 'Video', 198],
            ['Icon Set', 'vecto_art', 'Design', 55],
            ['Travel Blog', 'world_lens', 'Photography', 301],
            ['SaaS Landing', 'ux_forge', 'Design', 88],
        ];
        @endphp
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($projects as $project)
            <div class="custom-box rounded-3xl overflow-hidden card-hover group">
                <div class="relative h-52 overflow-hidden">
                    <img src="{{ asset('images/test-project/default-project-image.png') }}"
                         class="w-full h-full object-cover p-3 rounded-3xl group-hover:scale-105 transition-transform duration-500"
                         alt="{{ $project[0] }}">
                    <div class="absolute top-4 right-4">
                        <span class="chip text-xs">{{ $project[2] }}</span>
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="text-gray-900 text-base mb-2">{{ $project[0] }}</h3>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 rounded-full bg-red-50 border border-red-100 flex items-center justify-center text-red-500 text-xs">
                                {{ strtoupper($project[1][0]) }}
                            </div>
                            <span class="text-gray-400 text-xs">{{ $project[1] }}</span>
                        </div>
                        <div class="flex items-center gap-1.5 text-gray-300 text-xs">
                            <i class="fas fa-heart text-red-400"></i>
                            <span>{{ $project[3] }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="flex justify-center mt-10">
            <button class="btn-outline text-sm px-10 py-3">
                Load more <i class="fas fa-chevron-down ml-2 text-xs"></i>
            </button>
        </div>
    </div>
</section>

<section class="pb-20 px-6">
    <div class="section-divider mb-16"></div>
    <div class="max-w-screen-md mx-auto text-center">
        <h2 class="text-gray-900 text-3xl mb-3">Have something to share?</h2>
        <p class="text-gray-400 text-sm mb-8">Create your free account and add your projects to the showcase.</p>
        <a href="{{ route('register') }}" class="btn-primary text-sm px-8 py-3.5">Join LinkLoom</a>
    </div>
</section>

@endsection
