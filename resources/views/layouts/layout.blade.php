<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | LinkLoom</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" referrerpolicy="no-referrer">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
    @stack('css')
    @vite('resources/css/app.css')
    @stack('js')
    @vite('resources/js/app.js')
</head>
<body>
    <div x-data="{ mobileMenuOpen: false }" class="flex flex-col min-h-screen">
        @include('components.header')
        <main class="flex-grow">
            @yield('content')
        </main>
        @include('components.footer')
    </div>
</body>
</html>
