<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>AntiNganggur</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen bg-white text-gray-800 flex flex-col">

    {{-- 🔗 NAVBAR --}}
    <nav class="bg-gray-900 text-white px-6 py-4 shadow">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        {{-- KIRI: Logo --}}
        <div class="text-2xl font-bold text-purple-300">AntiNganggur</div>

        {{-- TENGAH: Menu --}}
        <div class="space-x-6 text-sm md:text-base flex justify-center">
            <a href="{{ route('home') }}" class="hover:text-purple-300">Beranda</a>
            <a href="{{ route('public.lowongan') }}" class="hover:text-purple-300">Lowongan</a>
            <a href="{{ route('public.magang') }}" class="hover:text-purple-300">Magang</a>
            <a href="{{ route('public.beasiswa') }}" class="hover:text-purple-300">Beasiswa</a>
        </div>

        {{-- KANAN: Auth --}}
        <div class="space-x-4 text-sm md:text-base flex items-center">
            @auth
                <a href="{{
                    auth()->user()->role === 'admin' ? route('admin.dashboard') :
                    (auth()->user()->role === 'perusahaan' ? route('perusahaan.dashboard') :
                    (auth()->user()->role === 'pencaker' ? route('pencaker.dashboard') : '#'))
                }}" class="bg-purple-600 px-3 py-1 rounded hover:bg-purple-700">
                    Profil
                </a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-red-400 hover:underline">Keluar</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="bg-purple-600 px-3 py-1 rounded hover:bg-purple-700">Login</a>
                <a href="{{ route('register') }}" class="bg-purple-800 px-3 py-1 rounded hover:bg-purple-900">Register</a>
            @endauth
        </div>
    </div>
</nav>

    {{-- 🏠 HERO SECTION --}}
    <section class="flex-grow flex flex-col items-center justify-center text-center px-6 py-20 bg-gradient-to-br from-purple-100 via-white to-blue-100">
        <h1 class="text-4xl md:text-5xl font-bold mb-6 text-gray-800 leading-tight">
            You Open Jobs Quickly. <br>
            Get Job Needed.
        </h1>
        <div class="space-x-4">
            <a href="{{ route('register') }}" class="bg-purple-600 text-white px-6 py-2 rounded hover:bg-purple-700">Mempekerjakan Sekarang</a>
            <a href="{{ route('login') }}" class="bg-purple-400 text-white px-6 py-2 rounded hover:bg-purple-500">Melamar Pekerjaan</a>
        </div>
    </section>

</body>
</html>
