<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Pencaker - AntiNganggur</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen bg-white text-gray-800 flex flex-col">

{{-- 🔗 NAVBAR --}}
<nav class="bg-gray-900 text-white px-6 py-4 shadow">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        {{-- KIRI: Logo --}}
        <div class="text-2xl font-bold text-purple-300">AntiNganggur</div>

        {{-- MENU TENGAH --}}
        <div class="space-x-6 text-sm md:text-base flex justify-center">
            <a href="{{ route('pencaker.dashboard') }}" class="hover:text-purple-300">Dashboard</a>
            <a href="{{ route('pencaker.lowongan.index') }}" class="hover:text-purple-300">Lowongan</a>
            <a href="{{ route('public.magang') }}" class="hover:text-purple-300">Magang</a>
            <a href="{{ route('public.beasiswa') }}" class="hover:text-purple-300">Beasiswa</a>
        </div>

        {{-- KANAN: Auth --}}
        <div class="space-x-4 text-sm md:text-base flex items-center">
            <a href="{{ route('pencaker.dashboard') }}" class="bg-purple-600 px-3 py-1 rounded hover:bg-purple-700">
                Profil
            </a>
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="text-red-400 hover:underline">Keluar</button>
            </form>
        </div>
    </div>
</nav>

{{-- 🏠 DASHBOARD PENECAKER --}}
<section class="flex-grow flex flex-col items-center justify-center text-center px-6 py-20 bg-gradient-to-br from-purple-100 via-white to-blue-100">
    <h1 class="text-4xl md:text-5xl font-bold mb-6 text-gray-800 leading-tight">
        Selamat Datang, {{ auth()->user()->name }} 👋<br>
        Siap Cari Kerja?
    </h1>
    <p class="text-gray-700 mb-8">Yuk mulai jelajahi lowongan kerja, magang, dan beasiswa yang cocok buat kamu.</p>
    <div class="space-x-4">
        <a href="{{ route('pencaker.lowongan.index') }}" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">🔍 Cari Lowongan</a>
        <a href="{{ route('public.magang') }}" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">💼 Lihat Magang</a>
        <a href="{{ route('public.beasiswa') }}" class="bg-purple-600 text-white px-6 py-2 rounded hover:bg-purple-700">🎓 Lihat Beasiswa</a>
    </div>
</section>

</body>
</html>