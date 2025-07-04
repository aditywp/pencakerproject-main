<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AntiNganggur</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-900 text-white">

    {{-- Navbar --}}
    <nav class="bg-gray-800 py-4 px-8 flex justify-between items-center shadow">
        <div class="text-xl font-bold text-white flex items-center gap-2">
            🔥 <span>AntiNganggur</span>
        </div>
        <div class="flex gap-6">
            <a href="{{ url('/') }}" class="hover:text-purple-400">Beranda</a>
            <a href="#" class="hover:text-purple-400">Cari Perusahaan</a>
            <a href="{{ route('pencaker.lowongan.index') }}" class="hover:text-purple-400">Cari Lowongan Kerja</a>
            <a href="{{ route('admin.magang.index') }}" class="hover:text-purple-400">Magang</a>
            <a href="{{ route('admin.beasiswa.index') }}" class="hover:text-purple-400">Beasiswa</a>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('login') }}" class="bg-purple-600 hover:bg-purple-700 px-4 py-1 rounded text-sm">Login</a>
            <a href="{{ route('register') }}" class="bg-purple-500 hover:bg-purple-600 px-4 py-1 rounded text-sm">Register</a>
        </div>
    </nav>

    {{-- Main content --}}
    <main class="w-full min-h-screen">
        @yield('content')
    </main>

</body>
</html>
