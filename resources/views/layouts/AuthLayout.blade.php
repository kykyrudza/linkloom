<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkLoom - @yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+BE+VLG:wght@100..400&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
    <!-- Vite CSS -->
    @vite('resources/css/app.css')
</head>
<body>

<div class="mx-auto text-white  flex items-center justify-center min-h-screen">

    @yield('auth_content')
    <div class="absolute  inset-0 w-full h-full bg-[url('/public/images/backroundmain1.png')] bg-cover bg-center -z-10"></div>
</div>

</body>
</html>
