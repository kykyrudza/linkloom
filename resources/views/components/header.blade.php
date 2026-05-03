<header class="sticky-header px-6 py-4">
    <nav class="mx-auto flex items-center justify-between max-w-screen-2xl" aria-label="Global">

        <!-- Logo -->
        <div class="flex lg:flex-1">
            <a href="{{ route('main') }}" class="inline-block">
                <img class="h-5 md:h-6 w-auto" src="{{ asset('images/linkloom.png') }}" alt="LinkLoom">
            </a>
        </div>

        <!-- Mobile menu button -->
        <div class="flex xl:hidden">
            <button type="button"
                class="p-2 text-gray-500 hover:text-gray-900 transition-colors rounded-lg"
                @click="mobileMenuOpen = true">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5M12 17.25h8.25" />
                </svg>
            </button>
        </div>

        <!-- Desktop nav links -->
        <div class="hidden xl:flex items-center gap-x-8">
            <a href="{{ route('main') }}"
               class="nav-link text-sm tracking-wide transition-colors {{ Route::is('main') ? 'text-gray-900 active' : 'text-gray-400 hover:text-gray-900' }}">
                Home
            </a>
            <a href="{{ route('projects') }}"
               class="nav-link text-sm tracking-wide transition-colors {{ Route::is('projects') ? 'text-gray-900 active' : 'text-gray-400 hover:text-gray-900' }}">
                Projects
            </a>
            <a href="{{ route('education') }}"
               class="nav-link text-sm tracking-wide transition-colors {{ Route::is('education') ? 'text-gray-900 active' : 'text-gray-400 hover:text-gray-900' }}">
                Education
            </a>
            <a href="{{ route('about') }}"
               class="nav-link text-sm tracking-wide transition-colors {{ Route::is('about') ? 'text-gray-900 active' : 'text-gray-400 hover:text-gray-900' }}">
                About
            </a>
            <a href="{{ route('contacts') }}"
               class="nav-link text-sm tracking-wide transition-colors {{ Route::is('contacts') ? 'text-gray-900 active' : 'text-gray-400 hover:text-gray-900' }}">
                Contact
            </a>
        </div>

        <!-- Desktop user / auth -->
        <div class="hidden xl:flex lg:flex-1 lg:justify-end items-center gap-5">
            @if($currentUser)
                <a href="{{ route('profile', $currentUser->profileRouteParameters()) }}"
                   class="flex items-center gap-2.5 px-3 py-1.5 custom-box rounded-full hover:shadow-md transition-all">
                    <img src="{{ $currentUser->avatarUrl }}"
                         class="h-7 w-7 rounded-full object-cover"
                         alt="avatar">
                    <span class="text-sm text-gray-600">{{ $currentUser->nickname }}</span>
                </a>
                <a href="{{ route('logout') }}" class="text-xs text-gray-400 hover:text-gray-700 transition-colors">
                    Logout
                </a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-500 hover:text-gray-900 transition-colors">
                    Sign In
                </a>
                <a href="{{ route('register') }}" class="btn-primary text-sm px-6 py-2.5">
                    Get Started
                </a>
            @endif
        </div>
    </nav>

    <!-- Mobile menu overlay + drawer -->
    <div x-show="mobileMenuOpen"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         style="display: none;"
         class="xl:hidden fixed inset-0 z-50">

        <!-- Backdrop -->
        <div class="fixed inset-0 bg-black/25 backdrop-blur-sm" @click="mobileMenuOpen = false"></div>

        <!-- Drawer -->
        <div x-show="mobileMenuOpen"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="transform translate-x-full"
             x-transition:enter-end="transform translate-x-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="transform translate-x-0"
             x-transition:leave-end="transform translate-x-full"
             style="display: none;"
             class="transform fixed inset-y-0 right-0 z-50 w-72 bg-white border-l border-gray-100 shadow-xl flex flex-col overflow-y-auto">

            <div class="flex items-center justify-between px-6 py-5 border-b border-gray-100">
                <img class="h-5 w-auto" src="{{ asset('images/linkloom.png') }}" alt="LinkLoom">
                <button type="button"
                        class="p-1.5 text-gray-400 hover:text-gray-700 transition-colors rounded-lg"
                        @click="mobileMenuOpen = false">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="flex-1 px-4 py-5 space-y-1">
                @if($currentUser)
                    <a href="{{ route('profile', $currentUser->profileRouteParameters()) }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-gray-50 transition-all mb-2">
                        <img src="{{ $currentUser->avatarUrl }}" class="h-8 w-8 rounded-full object-cover" alt="avatar">
                        <span class="text-sm">{{ $currentUser->nickname }}</span>
                    </a>
                    <div class="h-px bg-gray-100 mb-2"></div>
                @endif

                <a href="{{ route('main') }}"
                   class="block px-4 py-2.5 rounded-xl text-sm transition-all {{ Route::is('main') ? 'bg-red-50 text-red-600' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }}">
                    Home
                </a>
                <a href="{{ route('projects') }}"
                   class="block px-4 py-2.5 rounded-xl text-sm transition-all {{ Route::is('projects') ? 'bg-red-50 text-red-600' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }}">
                    Projects
                </a>
                <a href="{{ route('education') }}"
                   class="block px-4 py-2.5 rounded-xl text-sm transition-all {{ Route::is('education') ? 'bg-red-50 text-red-600' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }}">
                    Education
                </a>
                <a href="{{ route('about') }}"
                   class="block px-4 py-2.5 rounded-xl text-sm transition-all {{ Route::is('about') ? 'bg-red-50 text-red-600' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }}">
                    About
                </a>
                <a href="{{ route('contacts') }}"
                   class="block px-4 py-2.5 rounded-xl text-sm transition-all {{ Route::is('contacts') ? 'bg-red-50 text-red-600' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }}">
                    Contact
                </a>
            </div>

            <div class="px-4 pb-8 pt-4 border-t border-gray-100 space-y-2">
                @if($currentUser)
                    <a href="{{ route('logout') }}"
                       class="block px-4 py-2.5 rounded-xl text-sm text-red-500 hover:bg-red-50 transition-all">
                        Logout
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="block px-4 py-2.5 rounded-xl text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-900 transition-all">
                        Sign In
                    </a>
                    <a href="{{ route('register') }}"
                       class="block px-4 py-2.5 rounded-xl text-sm bg-red-600 text-white text-center btn-primary">
                        Get Started
                    </a>
                @endif
            </div>
        </div>
    </div>
</header>
