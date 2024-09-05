<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playwrite+BE+VLG:wght@100..400&display=swap" rel="stylesheet">
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
        @stack('css')
        @vite('resources/css/app.css')
        @stack('js')
        @vite('resources/js/app.js')
    </head>
    <body>
        <div class="flex flex-col min-h-screen">
            <div class="flex-grow">
                <div class="mx-6">
                    <div x-data="{ mobileMenuOpen: false }" class="mb-10 mx-auto max-w-screen-2xl">
                        @php
                            $currentUserId = Auth::check() ? Auth::id() : null;
                            $currentUserNickname = Auth::check() ? Auth::user()->nickname : null;
                        @endphp
                        @include('components.header', [
                            'currentUserId' => $currentUserId,
                            'currentUserNickname' => $currentUserNickname
                        ])
                    </div>
                </div>
                <div>
                    @yield('content')
                </div>
            </div>
            @include('components.footer')
        </div>
    </body>
</html>
