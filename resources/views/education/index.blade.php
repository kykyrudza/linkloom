@extends('layouts.layout')

@section('title', 'Education')

@section('content')

<section class="relative pt-20 pb-16 px-6 overflow-hidden">
    <div class="absolute inset-0 dot-bg"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[600px] h-[350px] opacity-20 blur-3xl rounded-full pointer-events-none"
         style="background: radial-gradient(ellipse, rgba(220,38,38,0.3) 0%, transparent 70%);"></div>
    <div class="relative z-10 max-w-screen-lg mx-auto text-center">
        <span class="chip mb-6 inline-flex">
            <i class="fas fa-graduation-cap mr-1.5 text-xs"></i>
            Learn & grow
        </span>
        <h1 class="text-5xl sm:text-6xl text-gray-900 mb-5 leading-tight">
            Level up your<br><span class="gradient-text">creative skills</span>
        </h1>
        <p class="text-gray-500 text-lg max-w-xl mx-auto">
            Curated resources, tutorials, and guides to help you grow as a creator.
        </p>
    </div>
</section>

<div class="section-divider"></div>

<!-- Filter bar -->
<section class="py-5 px-6 sticky top-[65px] z-40 bg-[#f5f5f7]/90 backdrop-blur-md border-b border-black/5"
         x-data="{ active: 'all' }">
    <div class="max-w-screen-xl mx-auto">
        <div class="flex gap-2 overflow-x-auto custom-scrollbar pb-1">
            @foreach([['all', 'All'], ['design', 'Design'], ['development', 'Development'], ['marketing', 'Marketing'], ['photography', 'Photography'], ['video', 'Video']] as [$id, $label])
                <button @click="active = '{{ $id }}'"
                        :class="active === '{{ $id }}' ? 'bg-red-600 text-white border-transparent' : 'text-gray-500 hover:text-gray-900 border-gray-200'"
                        class="flex-shrink-0 px-5 py-2 rounded-full text-sm border bg-white transition-all shadow-sm">
                    {{ $label }}
                </button>
            @endforeach
        </div>
    </div>
</section>

<!-- Featured -->
<section class="py-12 px-6">
    <div class="max-w-screen-xl mx-auto">
        <div class="custom-box rounded-3xl overflow-hidden">
            <div class="grid lg:grid-cols-2">
                <div class="p-10 flex flex-col justify-center">
                    <span class="chip mb-4 inline-flex w-fit">
                        <i class="fas fa-fire mr-1.5 text-xs"></i>
                        Featured
                    </span>
                    <h2 class="text-gray-900 text-3xl mb-4 leading-tight">Building Your Creative Portfolio from Scratch</h2>
                    <p class="text-gray-500 text-sm leading-relaxed mb-6">
                        A comprehensive guide to creating a portfolio that stands out — covering strategy, presentation, and the tools you need.
                    </p>
                    <div class="flex items-center gap-4 mb-8">
                        <div class="flex items-center gap-2">
                            <div class="w-7 h-7 rounded-full bg-red-50 border border-red-100 flex items-center justify-center text-red-500 text-xs">A</div>
                            <span class="text-gray-400 text-xs">By Alex Morgan</span>
                        </div>
                        <span class="text-gray-200 text-xs">•</span>
                        <span class="text-gray-400 text-xs"><i class="fas fa-clock mr-1"></i>15 min read</span>
                    </div>
                    <a href="#" class="btn-primary text-sm px-6 py-3 w-fit">
                        Read guide <i class="fas fa-arrow-right ml-2 text-xs"></i>
                    </a>
                </div>
                <div class="hidden lg:flex items-center justify-center p-10 bg-gray-50 border-l border-gray-100">
                    <div class="w-48 h-48 bg-white border border-gray-100 rounded-3xl flex items-center justify-center shadow-sm float-anim">
                        <i class="fas fa-book-open text-red-400 text-6xl opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Resources grid -->
<section class="pb-20 px-6">
    <div class="max-w-screen-xl mx-auto">
        <h3 class="text-gray-900 text-xl mb-6">All resources</h3>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @php
            $resources = [
                ['fa-figma', 'Design', 'Figma Fundamentals', 'Master the essential tools and techniques for professional UI design.', '8 min', 'Beginner'],
                ['fa-code', 'Development', 'Front-end Basics', 'Learn HTML, CSS, and JavaScript to bring your designs to life.', '20 min', 'Beginner'],
                ['fa-camera', 'Photography', 'Composition Secrets', 'The rules of composition that will make every shot compelling.', '10 min', 'Intermediate'],
                ['fa-video', 'Video', 'Video Storytelling', 'Tell powerful stories through video editing and cinematography.', '12 min', 'Intermediate'],
                ['fa-bullhorn', 'Marketing', 'Personal Branding', 'Build a recognizable brand that attracts opportunities.', '7 min', 'All levels'],
                ['fa-pen-nib', 'Design', 'Typography Mastery', 'How to choose and combine fonts for maximum impact.', '9 min', 'Intermediate'],
            ];
            @endphp
            @foreach($resources as $r)
            <div class="custom-box rounded-3xl p-6 card-hover flex flex-col">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-11 h-11 rounded-2xl bg-red-50 border border-red-100 flex items-center justify-center">
                        <i class="{{ str_starts_with($r[0], 'fa-') ? 'fab '.$r[0] : 'fas '.$r[0] }} text-red-500 text-lg"></i>
                    </div>
                    <span class="chip text-xs">{{ $r[1] }}</span>
                </div>
                <h3 class="text-gray-900 text-base mb-2">{{ $r[2] }}</h3>
                <p class="text-gray-400 text-xs leading-relaxed flex-1 mb-5">{{ $r[3] }}</p>
                <div class="flex items-center justify-between">
                    <div class="flex gap-3 text-xs text-gray-300">
                        <span><i class="fas fa-clock mr-1"></i>{{ $r[4] }}</span>
                        <span><i class="fas fa-signal mr-1"></i>{{ $r[5] }}</span>
                    </div>
                    <a href="#" class="text-red-500 text-xs hover:text-red-700 transition-colors">
                        Read <i class="fas fa-arrow-right text-xs ml-1"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="pb-20 px-6">
    <div class="section-divider mb-16"></div>
    <div class="max-w-screen-md mx-auto text-center custom-box rounded-3xl p-12">
        <i class="fas fa-graduation-cap text-red-500 text-3xl mb-5"></i>
        <h2 class="text-gray-900 text-3xl mb-3">Want to contribute?</h2>
        <p class="text-gray-400 text-sm mb-8">Share your knowledge with the LinkLoom community.</p>
        <a href="{{ route('contacts') }}" class="btn-primary text-sm px-8 py-3">Submit a resource</a>
    </div>
</section>

@endsection
