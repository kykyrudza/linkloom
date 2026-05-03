@extends('layouts.layout')

@section('title', $profile->user->nickname)

@section('content')
<div class="px-4 sm:px-6 py-6 mx-auto max-w-screen-2xl">

    <div class="hidden lg:grid lg:grid-cols-12 gap-4">
        <div class="col-span-3">
            <div class="custom-box rounded-3xl p-5 sticky top-24 flex flex-col gap-4">
                <div class="w-full aspect-square rounded-2xl overflow-hidden bg-gray-100"
                     style="background-image: url('{{ $profile->user->avatarUrl }}'); background-size: cover; background-position: center;">
                </div>

                <div>
                    <p class="text-gray-900 text-xl">{{ $profile->user->nickname }}</p>
                    <p class="text-gray-400 text-sm mt-0.5">{{ $profile->user->fullName() }}</p>
                    <p id="email"
                       class="text-gray-400 text-xs mt-1 cursor-pointer hover:text-red-500 transition-colors truncate"
                       title="Click to copy">
                        {{ $profile->user->email }}
                    </p>
                </div>

                <div id="custom-alert"
                     class="fixed top-6 left-1/2 -translate-x-1/2 bg-white border border-teal-200 shadow-lg rounded-xl text-teal-700 px-4 py-3 opacity-0 transition-opacity duration-300 hidden z-50"
                     role="alert">
                    <p class="text-sm flex items-center gap-2">
                        <i class="fas fa-check text-teal-500"></i>
                        Email copied!
                    </p>
                </div>

                <div class="text-sm text-gray-500 leading-relaxed overflow-auto custom-scrollbar max-h-40 border-t border-gray-100 pt-4">
                    @if($profile->user->description)
                        {!! $profile->user->description !!}
                    @else
                        <p class="text-gray-300 italic text-xs">No description yet.</p>
                    @endif
                </div>

                @if($profile->socialLinks->isNotEmpty())
                    <div class="flex flex-wrap gap-2 border-t border-gray-100 pt-4">
                        @foreach($profile->socialLinks as $link)
                            <a href="{{ $link->url }}" target="_blank"
                               class="w-9 h-9 custom-box rounded-full flex items-center justify-center text-gray-400 hover:text-red-500 transition-colors text-sm">
                                <i class="fab fa-{{ $link->icon }}"></i>
                            </a>
                        @endforeach
                    </div>
                @endif

                @if ($profile->isOwner)
                    <div class="flex gap-2 border-t border-gray-100 pt-4">
                        <a href="{{ route('profile.settings', $profile->user->profileRouteParameters()) }}"
                           class="flex-1 py-2.5 text-center text-xs custom-box rounded-xl hover:shadow-md transition-all text-gray-600">
                            <i class="fas fa-cog mr-1.5"></i>Settings
                        </a>
                        <a href="{{ route('logout') }}"
                           class="py-2.5 px-3 custom-box rounded-xl text-gray-400 hover:text-red-500 hover:border-red-100 transition-all text-xs">
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <div class="col-span-9 flex flex-col gap-4">
            <div class="custom-box rounded-3xl px-7 py-5 flex items-center justify-between">
                <div>
                    <p class="text-gray-900 text-2xl">{{ $profile->user->nickname }}</p>
                    <p class="text-gray-400 text-sm mt-0.5">{{ $profile->user->fullName() }}</p>
                </div>
                <div class="flex items-center gap-4">
                    @if($profile->socialLinks->isNotEmpty())
                        <div class="flex gap-2">
                            @foreach($profile->socialLinks->take(5) as $link)
                                <a href="{{ $link->url }}" target="_blank"
                                   class="w-8 h-8 rounded-full bg-gray-50 border border-gray-100 flex items-center justify-center text-gray-400 hover:text-red-500 transition-colors text-sm">
                                    <i class="fab fa-{{ $link->icon }}"></i>
                                </a>
                            @endforeach
                        </div>
                    @endif
                    <a href="#" class="group">
                        <img class="h-11 w-11 transition-all group-hover:opacity-70"
                             src="{{ asset('images/achievement/achievement-1.png') }}" alt="achievement">
                    </a>
                </div>
            </div>

            <div class="custom-box rounded-3xl p-6 flex-1">
                <div class="flex items-center gap-3 mb-5 flex-wrap">
                    <div class="flex-1 min-w-[160px] relative">
                        <input type="text"
                               placeholder="Search projects..."
                               class="form-input-dark text-sm pl-9">
                        <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                    </div>
                    <div class="flex gap-2 flex-wrap">
                        <button class="chip px-4 py-2 cursor-pointer hover:bg-red-100 transition-colors">Figma</button>
                        <button class="chip px-4 py-2 cursor-pointer hover:bg-red-100 transition-colors">Web</button>
                        @if($profile->isOwner)
                            <button class="flex items-center gap-1.5 px-4 py-2 custom-box rounded-full text-sm text-gray-500 hover:text-gray-900 hover:shadow-md transition-all">
                                <i class="fas fa-plus text-xs"></i>
                                Add project
                            </button>
                        @endif
                    </div>
                </div>

                <div class="bg-gray-50 border border-gray-100 rounded-2xl overflow-hidden">
                    <div class="overflow-x-auto custom-scrollbar p-4">
                        <div class="flex gap-4" style="width: max-content;">
                            @for ($i = 0; $i < 10; $i++)
                                <div class="custom-box rounded-3xl w-64 h-64 flex-shrink-0 card-hover overflow-hidden group">
                                    <a href="#">
                                        <img src="{{ asset('images/test-project/default-project-image.png') }}"
                                             class="w-full h-full object-cover p-4 rounded-3xl group-hover:scale-105 transition-transform duration-500"
                                             alt="Project">
                                    </a>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="block lg:hidden space-y-4">
        <div class="custom-box rounded-3xl p-5">
            <div class="flex items-center gap-4 mb-4">
                <div class="w-16 h-16 rounded-2xl flex-shrink-0 bg-gray-100"
                     style="background-image: url('{{ $profile->user->avatarUrl }}'); background-size: cover; background-position: center;">
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-gray-900 text-lg truncate">{{ $profile->user->nickname }}</p>
                    <p class="text-gray-400 text-sm">{{ $profile->user->fullName() }}</p>
                    <p class="text-gray-400 text-xs mt-0.5 cursor-pointer hover:text-red-500 transition-colors truncate" id="email-mobile">
                        {{ $profile->user->email }}
                    </p>
                </div>
            </div>

            @if($profile->user->description)
                <div class="text-gray-500 text-sm leading-relaxed mb-4 pt-4 border-t border-gray-100">
                    {!! $profile->user->description !!}
                </div>
            @endif

            @if($profile->socialLinks->isNotEmpty())
                <div class="flex gap-2 flex-wrap mb-4">
                    @foreach($profile->socialLinks as $link)
                        <a href="{{ $link->url }}" target="_blank"
                           class="w-9 h-9 custom-box rounded-full flex items-center justify-center text-gray-400 hover:text-red-500 transition-colors text-sm">
                            <i class="fab fa-{{ $link->icon }}"></i>
                        </a>
                    @endforeach
                </div>
            @endif

            @if ($profile->isOwner)
                <div class="flex gap-2 pt-4 border-t border-gray-100">
                    <a href="{{ route('profile.settings', $profile->user->profileRouteParameters()) }}"
                       class="flex-1 py-2.5 text-center text-sm custom-box rounded-xl hover:shadow-md transition-all text-gray-600">
                        Settings
                    </a>
                    <a href="{{ route('logout') }}"
                       class="py-2.5 px-4 custom-box rounded-xl text-gray-400 hover:text-red-500 transition-all text-sm">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </div>
            @endif
        </div>

        <div class="custom-box rounded-3xl p-5">
            <div class="flex items-center justify-between mb-4">
                <p class="text-gray-900 text-sm font-medium">Projects</p>
                <div class="flex gap-2">
                    <button class="chip text-xs">Figma</button>
                    <button class="chip text-xs">Web</button>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-3">
                @for ($i = 0; $i < 6; $i++)
                    <div class="custom-box rounded-2xl aspect-square overflow-hidden card-hover group">
                        <a href="#">
                            <img src="{{ asset('images/test-project/default-project-image.png') }}"
                                 class="w-full h-full object-cover p-2 rounded-2xl group-hover:scale-105 transition-transform duration-500"
                                 alt="Project">
                        </a>
                    </div>
                @endfor
            </div>
        </div>
    </div>

</div>
@endsection
