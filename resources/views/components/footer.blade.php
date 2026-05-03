<footer class="py-14 px-6">
    <div class="mx-auto max-w-screen-2xl">
        <div class="flex flex-col items-center gap-8">

            <a href="{{ route('main') }}" class="opacity-70 hover:opacity-100 transition-opacity">
                <img src="{{ asset('images/linkloom.png') }}" alt="LinkLoom" class="h-5 w-auto">
            </a>

            <nav class="flex flex-wrap justify-center gap-x-8 gap-y-3">
                <a href="{{ route('main') }}"
                   class="text-sm transition-colors {{ request()->routeIs('main') ? 'text-gray-900' : 'text-gray-400 hover:text-gray-700' }}">
                    Home
                </a>
                <a href="{{ route('projects') }}"
                   class="text-sm transition-colors {{ request()->routeIs('projects') ? 'text-gray-900' : 'text-gray-400 hover:text-gray-700' }}">
                    Projects
                </a>
                <a href="{{ route('education') }}"
                   class="text-sm transition-colors {{ request()->routeIs('education') ? 'text-gray-900' : 'text-gray-400 hover:text-gray-700' }}">
                    Education
                </a>
                <a href="{{ route('about') }}"
                   class="text-sm transition-colors {{ request()->routeIs('about') ? 'text-gray-900' : 'text-gray-400 hover:text-gray-700' }}">
                    About
                </a>
                <a href="{{ route('contacts') }}"
                   class="text-sm transition-colors {{ request()->routeIs('contacts') ? 'text-gray-900' : 'text-gray-400 hover:text-gray-700' }}">
                    Contact
                </a>
            </nav>

            <div class="flex items-center gap-3">
                <a href="#" class="icon__bounce w-9 h-9 custom-box rounded-full text-gray-400 hover:text-gray-700 text-sm">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="icon__bounce w-9 h-9 custom-box rounded-full text-gray-400 hover:text-gray-700 text-sm">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="icon__bounce w-9 h-9 custom-box rounded-full text-gray-400 hover:text-gray-700 text-sm">
                    <i class="fab fa-telegram"></i>
                </a>
                <a href="#" class="icon__bounce w-9 h-9 custom-box rounded-full text-gray-400 hover:text-gray-700 text-sm">
                    <i class="fab fa-discord"></i>
                </a>
            </div>

            <div class="section-divider w-full max-w-xs"></div>

            <p class="text-xs text-gray-400">© 2025 LinkLoom. All rights reserved.</p>
        </div>
    </div>
</footer>
