<header class="pt-5">
    <nav class="mx-auto flex items-center justify-between" aria-label="Global">
        <!-- Logo -->
        <div class="flex lg:flex-1">
            <a href="{{ route('main') }}" class="block">
                <img class="h-5 md:h-6 w-auto" src="{{ asset('images/linkloom.png') }}" alt="logo">
            </a>
        </div>

        <!-- Mobile Menu Button -->
        <div class="flex xl:hidden">
            <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-white" @click="mobileMenuOpen = true">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 h-8 w-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5M12 17.25h8.25" />
                </svg>
            </button>
        </div>

        <!-- Desktop Navigation Links -->
        <div class="hidden xl:flex lg:gap-x-12">
            <a href="{{ route('main') }}" class="text-2xl font-normal {{ Route::is('main') ? 'active' : '' }} hover:text-white text-slate-500">{{ __('Главная') }}</a>
            <a href="{{ route('main') }}" class="text-2xl font-normal {{ Route::is('contacts') ? 'active' : '' }} hover:text-white text-slate-500">{{ __('Контакты') }}</a>
            <a href="{{ route('main') }}" class="text-2xl font-normal {{ Route::is('projects') ? 'active' : '' }} hover:text-white text-slate-500">{{ __('Проекты') }}</a>
            <a href="{{ route('main') }}" class="text-2xl font-normal {{ Route::is('about') ? 'active' : '' }} hover:text-white text-slate-500">{{ __('Про нас') }}</a>
            <a href="{{ route('main') }}" class="text-2xl font-normal {{ Route::is('education') ? 'active' : '' }} hover:text-white text-slate-500">{{ __('Обучение') }}</a>
        </div>

        <!-- User Profile or Login -->
        <div class="hidden xl:flex lg:flex-1 lg:justify-end">
            @auth
                <a href="{{ route('profile', ['id' => $userId, 'nickname' => $nickname]) }}">
                    <img src="{{ auth()->user()->avatar_url }}"
                         class="h-[60px] w-[60px] rounded-2xl object-cover overflow-hidden {{ Route::is('profile') ? 'border-red-600 border-2' : 'border-0' }}"
                         alt="avatar">
                </a>
            @else
                <a href="{{ route('login') }}" class="text-2xl font-normal leading-6 rounded-full bg-red-600 px-16 py-2 text-white animbtn">{{ __('Login') }}</a>
            @endauth
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div class="xl:hidden" role="dialog" aria-modal="true" x-show="mobileMenuOpen" @click.away="mobileMenuOpen = false">
        <div class="fixed inset-0 z-10 bg-black opacity-50"></div>
        <div class="fixed inset-y-0 right-0 z-20 w-full px-6 bg-neutral-900 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
            <div class="flex items-center justify-between">
                <a href="{{ route('main') }}" class="-m-1.5 p-1.5">
                    <span class="sr-only">Your Company</span>
                    <img class="h-5 w-auto" src="{{ asset('images/linkloom.png') }}" alt="logo">
                </a>
                <button type="button" class="-m-2.5 rounded-md p-2.5 text-white" @click="mobileMenuOpen = false">
                    <span class="sr-only">Close menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="mt-6 flow-root">
                <div class="-my-6 divide-y divide-gray-500/10">
                    <div class="space-y-2 py-6">
                        <a href="{{ route('profile', ['id' => $userId, 'nickname' => $nickname]) }}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-light leading-7 text-slate-300 hover:bg-gray-50 hover:text-black {{ Route::is('profile') ? 'active' : '' }}">
                            {{ __('Личный кабинет') }}
                        </a>
                        <a href="{{ route('main') }}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-light leading-7 text-slate-300 hover:bg-gray-50 hover:text-black {{ Route::is('main') ? 'active' : '' }}">
                            {{ __('Главная') }}
                        </a>
                        <a href="{{ route('main') }}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-light leading-7 text-slate-300 hover:bg-gray-50 hover:text-black {{ Route::is('contacts') ? 'active' : '' }}">
                            {{ __('Контакты') }}
                        </a>
                        <a href="{{ route('main') }}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-light leading-7 text-slate-300 hover:bg-gray-50 hover:text-black {{ Route::is('projects') ? 'active' : '' }}">
                            {{ __('Проекты') }}
                        </a>
                        <a href="{{ route('main') }}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-light leading-7 text-slate-300 hover:bg-gray-50 hover:text-black {{ Route::is('about') ? 'active' : '' }}">
                            {{ __('Про нас') }}
                        </a>
                        <a href="{{ route('main') }}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-light leading-7 text-slate-300 hover:bg-gray-50 hover:text-black {{ Route::is('education') ? 'active' : '' }}">
                            {{ __('Обучение') }}
                        </a>
                    </div>
                    <div class="py-6">
                        @auth
                            <a href="{{ route('logout') }}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-light leading-7 text-slate-300 hover:bg-gray-50 hover:text-black">
                                {{ __('Выйти из системы') }}
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="flex items-center space-x-2 -mx-3 rounded-lg px-3 py-2 text-base font-light leading-7 text-slate-300 hover:bg-gray-50 hover:text-black">
                                {{ __('Login') }}
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 ml-2 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                                </svg>
                            </a>
                            <a href="{{ route('register') }}" class="flex items-center space-x-2 -mx-3 rounded-lg px-3 py-2 text-base font-light leading-7 text-slate-300 hover:bg-gray-50 hover:text-black">
                                {{ __('Registration') }}
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 ml-2 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                                </svg>
                            </a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

