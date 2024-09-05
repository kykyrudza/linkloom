@extends('layouts.layout')

@section('title')
    {{ $nickname }} - Settings
@endsection


@push('css')
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
@endpush

@push('js')
    <script src="{{ mix('js/app.js') }}"></script>
@endpush

@section('content')
    <div class="text-white w-full lg:flex gap-3 mx-auto max-w-screen-2xl">
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="custom-box p-7 w-full my-5 rounded-3xl max-w-xl">
            @csrf
            <!-- Avatar Upload -->
            <div class="custom-box px-5 py-2 rounded-3xl mb-10 w-full">
                <label for="avatar" class="w-2/4">Upload Avatar</label>
                <input type="file" name="avatar" id="avatar">
            </div>

            <!-- Nickname -->
            <div class="mb-4 w-full">
                <label for="nickname" class="w-2/4">Nickname</label>
                <input type="text" name="nickname" id="nickname" value="{{ old('nickname', $nickname) }}" class=" w-2/4 custom-box px-5 py-2 rounded-3xl">
                @error('nickname') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- First Name -->
            <div class="mb-4 w-full">
                <label for="first_name" class="w-2/4">First Name</label>
                <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $firstName) }}" class="w-2/4 custom-box px-5 py-2 rounded-3xl">
                @error('first_name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Last Name -->
            <div class="mb-4 w-full">
                <label for="last_name" class="w-2/4">Last Name</label>
                <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $lastName) }}" class="w-2/4 custom-box px-5 py-2 rounded-3xl">
                @error('last_name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Description -->
            <div class="mb-4 w-full">
                <label for="description">Description</label>
                <input id="description" type="hidden" name="description" value="{{ old('description', $description) }}">
                <trix-editor input="description" class="custom-box px-5 py-2 rounded-3xl"></trix-editor>
                @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

                    <!-- Email --><div class="mb-4 w-full">
                <label for="email" class="w-2/4">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $email) }}" class="custom-box w-2/4  px-5 py-2 rounded-3xl">
                @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="custom-box px-5 py-2 rounded-3xl">Update</button>
        </form>
        <div class="custom-box rounded-3xl p-7 w-full my-5 max-w-xl">
            <form action="{{ route('social-links.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="platform" class="block text-white">Social Network</label>
                    <select id="platform" name="platform" class="custom-box px-5 py-2 rounded-3xl w-full" required>
                        <option class="text-black" value="facebook">Facebook</option>
                        <option class="text-black" value="twitter">Twitter</option>
                        <option class="text-black" value="linkedin">LinkedIn</option>
                        <option class="text-black" value="instagram">Instagram</option>
                        <option class="text-black" value="youtube">YouTube</option>
                        <option class="text-black" value="github">GitHub</option>
                        <option class="text-black" value="pinterest">Pinterest</option>
                        <option class="text-black" value="snapchat">Snapchat</option>
                        <option class="text-black" value="telegram">Telegram</option>
                        <option class="text-black" value="reddit">Reddit</option>
                        <option class="text-black" value="tiktok">TikTok</option>
                        <option class="text-black" value="whatsapp">WhatsApp</option>
                        <option class="text-black" value="vimeo">Vimeo</option>
                        <option class="text-black" value="flickr">Flickr</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="url" class="block text-white">URL</label>
                    <input type="url" id="url" name="url" class="custom-box px-5 py-2 rounded-3xl w-full" required>
                </div>
                <button type="submit" class="custom-box px-5 py-2 rounded-3xl">Update</button>
            </form>

            <div class="mt-8">
                <h2 class="text-lg text-white">Your Social Links</h2>
                @if($socialLinks->isEmpty())
                    <p class="text-white opacity-50">No social links added yet.</p>
                @else
                    <ul class="mt-4">
                        @foreach($socialLinks as $link)
                            <li class="mb-2 flex items-center justify-between border-y py-3">
                                <a href="{{ $link->url }}" class="text-white hover:text-opacity-50" target="_blank">
                                    {{ ucfirst($link->platform) }}
                                </a>
                                <form action="{{ route('social-links.destroy', $link->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-opacity-50" onclick="return confirm('Are you sure you want to delete this social link?')">
                                        Delete
                                    </button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

        </div>
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="custom-box p-7 my-5 w-full rounded-3xl max-w-xl">
            <!-- Password -->
            @csrf
            <div class="mb-4">
                <label for="password">New Password</label>
                <input type="password" name="password" id="password" class="custom-box px-5 py-2 rounded-3xl">
                @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <label for="password_confirmation">Confirm New Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="custom-box px-5 py-2 rounded-3xl">
                @error('password_confirmation') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="custom-box px-5 py-2 rounded-3xl">Update Password</button>
        </form>

@endsection
