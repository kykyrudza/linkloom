<section class="relative min-h-[92vh] flex items-center justify-center overflow-hidden px-6">

    <!-- Background effects -->
    <div class="absolute inset-0 dot-bg"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[700px] h-[500px] rounded-full opacity-30 blur-3xl pointer-events-none"
         style="background: radial-gradient(ellipse, rgba(220,38,38,0.18) 0%, transparent 70%);"></div>

    <div class="relative z-10 max-w-screen-xl mx-auto w-full">
        <div class="grid lg:grid-cols-2 gap-16 items-center">

            <!-- Text content -->
            <div class="text-center lg:text-left">
                <div class="inline-flex mb-6 fade-in-up fade-in-up-delay-1">
                    <span class="chip">
                        <i class="fas fa-star mr-1.5 text-xs"></i>
                        Creative platform for everyone
                    </span>
                </div>

                <h1 class="text-5xl sm:text-6xl lg:text-7xl text-gray-900 leading-tight mb-6 fade-in-up fade-in-up-delay-2">
                    Connect your<br>
                    <span class="gradient-text">creative world</span>
                </h1>

                <p class="text-gray-500 text-lg sm:text-xl leading-relaxed mb-10 max-w-lg mx-auto lg:mx-0 fade-in-up fade-in-up-delay-3">
                    Share your projects, build your portfolio, and connect with thousands of creators — all in one place.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start fade-in-up fade-in-up-delay-4">
                    <a href="{{ route('register') }}" class="btn-primary text-sm px-8 py-3.5">
                        Get started free
                    </a>
                    <a href="{{ route('projects') }}" class="btn-outline text-sm px-8 py-3.5">
                        Browse projects
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>

                <div class="mt-12 flex items-center gap-6 justify-center lg:justify-start fade-in-up fade-in-up-delay-4">
                    <div class="flex -space-x-2">
                        @for ($i = 0; $i < 4; $i++)
                            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-red-500 to-red-700 border-2 border-[#f5f5f7] flex items-center justify-center text-white text-xs">
                                {{ chr(65 + $i) }}
                            </div>
                        @endfor
                    </div>
                    <p class="text-gray-400 text-sm">
                        <span class="text-gray-900 font-medium">2,000+</span> creators joined
                    </p>
                </div>
            </div>

            <!-- Visual mockup -->
            <div class="hidden lg:flex justify-center items-center relative">
                <div class="relative w-72">
                    <!-- Main profile card -->
                    <div class="custom-box rounded-3xl p-6 float-anim red-glow-sm">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-red-500 to-red-700 flex items-center justify-center text-white text-sm">D</div>
                            <div>
                                <p class="text-gray-900 text-sm">designer_nova</p>
                                <p class="text-gray-400 text-xs">UI/UX Designer</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <div class="bg-gray-50 border border-gray-100 rounded-xl h-20 flex items-center justify-center">
                                <i class="fas fa-cube text-red-500 text-xl"></i>
                            </div>
                            <div class="bg-gray-50 border border-gray-100 rounded-xl h-20 flex items-center justify-center">
                                <i class="fas fa-palette text-red-500 text-xl"></i>
                            </div>
                        </div>
                        <div class="flex gap-2 mt-3">
                            <div class="chip text-xs px-3 py-1">Figma</div>
                            <div class="chip text-xs px-3 py-1">React</div>
                            <div class="chip text-xs px-3 py-1">UI/UX</div>
                        </div>
                    </div>

                    <!-- Floating stats -->
                    <div class="absolute -right-16 top-4 custom-box rounded-2xl p-3 w-32 float-anim shadow-md" style="animation-delay: 0.6s;">
                        <p class="text-xs text-gray-400 mb-1">Projects</p>
                        <p class="text-gray-900 text-2xl">48</p>
                        <p class="text-green-600 text-xs mt-1"><i class="fas fa-arrow-up text-xs"></i> 12% this month</p>
                    </div>

                    <!-- Floating social -->
                    <div class="absolute -left-12 bottom-4 custom-box rounded-2xl p-3 w-28 float-anim shadow-md" style="animation-delay: 1.2s;">
                        <p class="text-xs text-gray-400 mb-2">Socials</p>
                        <div class="flex gap-1.5">
                            <div class="w-6 h-6 rounded-full bg-red-50 border border-red-100 flex items-center justify-center">
                                <i class="fab fa-github text-red-500" style="font-size: 9px;"></i>
                            </div>
                            <div class="w-6 h-6 rounded-full bg-red-50 border border-red-100 flex items-center justify-center">
                                <i class="fab fa-instagram text-red-500" style="font-size: 9px;"></i>
                            </div>
                            <div class="w-6 h-6 rounded-full bg-red-50 border border-red-100 flex items-center justify-center">
                                <i class="fab fa-telegram text-red-500" style="font-size: 9px;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Scroll indicator -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 text-gray-300">
        <span class="text-xs tracking-widest uppercase">Scroll</span>
        <div class="w-px h-10 bg-gradient-to-b from-gray-300 to-transparent"></div>
    </div>
</section>
