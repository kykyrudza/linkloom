<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkLoom — @yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" referrerpolicy="no-referrer">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
</head>
<body>
<div class="min-h-screen flex">

    <!-- Left panel — branding -->
    <div class="hidden lg:flex lg:w-1/2 relative flex-col items-center justify-center p-12 overflow-hidden"
         style="background: linear-gradient(135deg, #fef2f2 0%, #fff 50%, #fef2f2 100%);">
        <div class="absolute inset-0 dot-bg opacity-60"></div>
        <div class="absolute top-0 right-0 w-[400px] h-[400px] rounded-full opacity-20 blur-3xl pointer-events-none"
             style="background: radial-gradient(ellipse, rgba(220,38,38,0.3) 0%, transparent 70%);"></div>

        <!-- Floating cards decoration -->
        <div class="absolute top-24 left-12 w-52 h-32 custom-box rounded-3xl float-anim" style="animation-delay: 0s;"></div>
        <div class="absolute top-40 left-32 w-40 h-24 custom-box rounded-3xl float-anim opacity-60" style="animation-delay: 0.8s;"></div>
        <div class="absolute bottom-32 right-16 w-44 h-28 custom-box rounded-3xl float-anim" style="animation-delay: 1.4s;"></div>
        <div class="absolute bottom-48 right-36 w-32 h-20 custom-box rounded-3xl float-anim opacity-70" style="animation-delay: 0.4s;"></div>

        <div class="relative z-10 text-center max-w-md">
            <a href="{{ route('main') }}" class="inline-block mb-10">
                <img src="{{ asset('images/linkloom.png') }}" alt="LinkLoom" class="h-7 w-auto mx-auto">
            </a>
            <h2 class="text-4xl text-gray-900 mb-4 leading-tight">Your creative hub for the world</h2>
            <p class="text-gray-500 text-sm leading-relaxed">
                Share your projects, connect with creators, and grow your presence — all in one place.
            </p>

            <div class="mt-10 flex flex-col gap-4">
                <div class="flex items-center gap-3 text-left">
                    <div class="w-8 h-8 rounded-full bg-red-50 border border-red-100 flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-link text-red-500 text-xs"></i>
                    </div>
                    <span class="text-gray-500 text-sm">One link for all your work</span>
                </div>
                <div class="flex items-center gap-3 text-left">
                    <div class="w-8 h-8 rounded-full bg-red-50 border border-red-100 flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-users text-red-500 text-xs"></i>
                    </div>
                    <span class="text-gray-500 text-sm">Connect with thousands of creators</span>
                </div>
                <div class="flex items-center gap-3 text-left">
                    <div class="w-8 h-8 rounded-full bg-red-50 border border-red-100 flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-rocket text-red-500 text-xs"></i>
                    </div>
                    <span class="text-gray-500 text-sm">Grow your creative portfolio</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Right panel — form -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-6 lg:p-12 bg-white">
        <div class="w-full max-w-md">
            <!-- Mobile logo -->
            <div class="flex justify-center mb-8 lg:hidden">
                <a href="{{ route('main') }}">
                    <img src="{{ asset('images/linkloom.png') }}" alt="LinkLoom" class="h-6 w-auto">
                </a>
            </div>

            @yield('auth_content')
        </div>
    </div>

</div>
</body>
</html>
