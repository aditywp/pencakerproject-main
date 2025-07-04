<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'AntiNganggur')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-900 text-white">

    {{-- Tidak ada navbar di layout ini --}}

    <main class="w-full min-h-screen">
        @yield('content')
    </main>

</body>
</html>
