@extends('layouts.layout')

@section('title', 'Settings')

@section('content')
<div class="px-4 sm:px-6 py-8 mx-auto max-w-screen-xl" x-data="{ activeTab: 'profile' }">

    <div class="mb-8 flex items-center gap-4">
        <a href="{{ route('profile', $profile->user->profileRouteParameters()) }}"
           class="w-9 h-9 custom-box rounded-xl flex items-center justify-center text-gray-400 hover:text-gray-700 transition-colors">
            <i class="fas fa-arrow-left text-sm"></i>
        </a>
        <div>
            <h1 class="text-gray-900 text-2xl">Settings</h1>
            <p class="text-gray-400 text-sm">Manage your profile and account</p>
        </div>
    </div>

    <div class="flex gap-1 p-1 custom-box rounded-2xl w-fit mb-8 shadow-sm">
        <button @click="activeTab = 'profile'"
                :class="activeTab === 'profile' ? 'bg-red-600 text-white shadow-sm' : 'text-gray-500 hover:text-gray-900'"
                class="px-5 py-2 rounded-xl text-sm transition-all">
            Profile
        </button>
        <button @click="activeTab = 'social'"
                :class="activeTab === 'social' ? 'bg-red-600 text-white shadow-sm' : 'text-gray-500 hover:text-gray-900'"
                class="px-5 py-2 rounded-xl text-sm transition-all">
            Social Links
        </button>
        <button @click="activeTab = 'security'"
                :class="activeTab === 'security' ? 'bg-red-600 text-white shadow-sm' : 'text-gray-500 hover:text-gray-900'"
                class="px-5 py-2 rounded-xl text-sm transition-all">
            Security
        </button>
    </div>

    <div x-show="activeTab === 'profile'" x-transition>
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid lg:grid-cols-2 gap-5">

                <div class="custom-box rounded-3xl p-6">
                    <p class="text-gray-700 text-sm font-medium mb-4">Profile Photo</p>
                    <div class="flex items-center gap-5">
                        <div class="w-20 h-20 rounded-2xl flex-shrink-0 bg-gray-100 overflow-hidden"
                             style="background-image: url('{{ $profile->user->avatarUrl }}'); background-size: cover; background-position: center;">
                        </div>
                        <div>
                            <label for="avatar"
                                   class="btn-outline text-xs px-4 py-2 cursor-pointer rounded-full">
                                <i class="fas fa-upload mr-1.5 text-xs"></i>
                                Upload photo
                            </label>
                            <input type="file" name="avatar" id="avatar" class="hidden" accept="image/*">
                            <p class="text-gray-400 text-xs mt-2">JPG, PNG or GIF. Max 2MB.</p>
                        </div>
                    </div>
                </div>

                <div class="custom-box rounded-3xl p-6 space-y-4">
                    <p class="text-gray-700 text-sm font-medium mb-2">Account Details</p>
                    <div>
                        <label for="nickname" class="block text-xs text-gray-400 mb-1.5">Nickname</label>
                        <input type="text" name="nickname" id="nickname"
                               value="{{ old('nickname', $profile->user->nickname) }}"
                               class="form-input-dark text-sm">
                        @error('nickname') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="email" class="block text-xs text-gray-400 mb-1.5">Email</label>
                        <input type="email" name="email" id="email"
                               value="{{ old('email', $profile->user->email) }}"
                               class="form-input-dark text-sm">
                        @error('email') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="custom-box rounded-3xl p-6 space-y-4">
                    <p class="text-gray-700 text-sm font-medium mb-2">Full Name</p>
                    <div>
                        <label for="first_name" class="block text-xs text-gray-400 mb-1.5">First Name</label>
                        <input type="text" name="first_name" id="first_name"
                               value="{{ old('first_name', $profile->user->firstName) }}"
                               class="form-input-dark text-sm">
                        @error('first_name') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="last_name" class="block text-xs text-gray-400 mb-1.5">Last Name</label>
                        <input type="text" name="last_name" id="last_name"
                               value="{{ old('last_name', $profile->user->lastName) }}"
                               class="form-input-dark text-sm">
                        @error('last_name') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="custom-box rounded-3xl p-6">
                    <p class="text-gray-700 text-sm font-medium mb-4">Bio / Description</p>
                    <div class="bg-gray-50 border border-gray-200 rounded-xl overflow-hidden">
                        <input id="description" type="hidden" name="description"
                               value="{{ old('description', $profile->user->description) }}">
                        <trix-editor input="description"></trix-editor>
                    </div>
                    @error('description') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

            </div>

            <div class="mt-5 flex justify-end">
                <button type="submit" class="btn-primary text-sm px-8 py-3">
                    Save Changes
                </button>
            </div>
        </form>
    </div>

    <div x-show="activeTab === 'social'" x-transition>
        <div class="grid lg:grid-cols-2 gap-5">

            <div class="custom-box rounded-3xl p-6">
                <p class="text-gray-700 text-sm font-medium mb-5">Add Social Link</p>
                <form action="{{ route('social-links.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="platform" class="block text-xs text-gray-400 mb-1.5">Platform</label>
                        <select id="platform" name="platform" class="form-input-dark text-sm" required>
                            @foreach($socialPlatforms as $platform => $details)
                                <option value="{{ $platform }}" @selected(old('platform') === $platform)>
                                    {{ $details['label'] ?? ucfirst($platform) }}
                                </option>
                            @endforeach
                        </select>
                        @error('platform') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="url" class="block text-xs text-gray-400 mb-1.5">URL</label>
                        <input type="url" id="url" name="url"
                               value="{{ old('url') }}"
                               placeholder="https://..."
                               class="form-input-dark text-sm" required>
                        @error('url') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>
                    <button type="submit" class="btn-primary text-sm w-full py-3">
                        Add Link
                    </button>
                </form>
            </div>

            <div class="custom-box rounded-3xl p-6">
                <p class="text-gray-700 text-sm font-medium mb-5">Your Social Links</p>
                @if($profile->socialLinks->isEmpty())
                    <div class="flex flex-col items-center justify-center py-12 text-center">
                        <div class="w-12 h-12 rounded-2xl bg-gray-50 border border-gray-100 flex items-center justify-center mb-3">
                            <i class="fas fa-link text-gray-300 text-lg"></i>
                        </div>
                        <p class="text-gray-400 text-sm">No social links added yet.</p>
                    </div>
                @else
                    <ul class="space-y-2">
                        @foreach($profile->socialLinks as $link)
                            <li class="flex items-center justify-between p-3 bg-gray-50 border border-gray-100 rounded-xl">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-red-50 border border-red-100 flex items-center justify-center">
                                        <i class="fab fa-{{ $link->icon }} text-red-500 text-sm"></i>
                                    </div>
                                    <div>
                                        <p class="text-gray-700 text-sm">{{ $link->label }}</p>
                                        <a href="{{ $link->url }}" target="_blank"
                                           class="text-gray-400 text-xs hover:text-red-500 transition-colors truncate max-w-[180px] block">
                                            {{ $link->url }}
                                        </a>
                                    </div>
                                </div>
                                <form action="{{ route('social-links.destroy', $link->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="w-8 h-8 rounded-full flex items-center justify-center text-gray-300 hover:text-red-500 hover:bg-red-50 transition-all text-xs"
                                            onclick="return confirm('Delete this link?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>

    <div x-show="activeTab === 'security'" x-transition>
        <div class="max-w-md">
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="custom-box rounded-3xl p-6 space-y-4">
                    <p class="text-gray-700 text-sm font-medium mb-2">Change Password</p>
                    <div>
                        <label for="password" class="block text-xs text-gray-400 mb-1.5">New Password</label>
                        <input type="password" name="password" id="password"
                               placeholder="Min. 8 characters"
                               class="form-input-dark text-sm">
                        @error('password') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-xs text-gray-400 mb-1.5">Confirm New Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                               placeholder="Repeat password"
                               class="form-input-dark text-sm">
                    </div>
                    <button type="submit" class="btn-primary text-sm w-full py-3 mt-2">
                        Update Password
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
