<section class="py-24 px-6">
    <div class="section-divider mb-24"></div>

    <div class="max-w-screen-xl mx-auto">

        <!-- Stats -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-5 mb-24">
            <div class="custom-box rounded-3xl p-6 text-center card-hover">
                <p class="text-4xl text-gray-900 mb-1">2K+</p>
                <p class="text-gray-400 text-sm">Creators</p>
            </div>
            <div class="custom-box rounded-3xl p-6 text-center card-hover">
                <p class="text-4xl text-gray-900 mb-1">12K+</p>
                <p class="text-gray-400 text-sm">Projects shared</p>
            </div>
            <div class="custom-box rounded-3xl p-6 text-center card-hover">
                <p class="text-4xl text-gray-900 mb-1">15+</p>
                <p class="text-gray-400 text-sm">Platforms supported</p>
            </div>
            <div class="custom-box rounded-3xl p-6 text-center card-hover">
                <p class="text-4xl text-gray-900 mb-1">100%</p>
                <p class="text-gray-400 text-sm">Free to start</p>
            </div>
        </div>

        <!-- CTA block -->
        <div class="relative rounded-3xl p-12 lg:p-20 text-center overflow-hidden"
             style="background: linear-gradient(135deg, #fef2f2 0%, #fff5f5 50%, #fef2f2 100%); border: 1px solid rgba(220,38,38,0.12);">
            <div class="absolute inset-0 dot-bg opacity-50"></div>
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[400px] h-[200px] opacity-20 blur-3xl pointer-events-none"
                 style="background: radial-gradient(ellipse, rgba(220,38,38,0.4) 0%, transparent 70%);"></div>
            <div class="relative z-10">
                <span class="chip mb-6 inline-flex">Start today — it's free</span>
                <h2 class="text-4xl sm:text-5xl text-gray-900 mb-5 leading-tight">
                    Ready to share your<br>work with the world?
                </h2>
                <p class="text-gray-500 text-sm max-w-md mx-auto mb-10 leading-relaxed">
                    Join thousands of creators who use LinkLoom to build their presence online.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('register') }}" class="btn-primary text-sm px-10 py-3.5 pulse-glow">
                        Create free account
                    </a>
                    <a href="{{ route('about') }}" class="btn-outline text-sm px-10 py-3.5">
                        Learn more
                    </a>
                </div>
            </div>
        </div>

    </div>
    <div class="h-8"></div>
</section>
