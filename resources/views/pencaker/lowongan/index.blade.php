<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lowongan - AntiNganggur</title>
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
            <a href="{{ route('pencaker.lowongan.index') }}" class="text-purple-400 font-semibold">Lowongan</a>
            <a href="{{ route('public.magang') }}" class="hover:text-purple-300">Magang</a>
            <a href="{{ route('public.beasiswa') }}" class="hover:text-purple-300">Beasiswa</a>
        </div>

        {{-- KANAN: Auth --}}
        <div class="space-x-4 text-sm md:text-base flex items-center">
            <a href="{{ route('pencaker.dashboard') }}" class="bg-purple-600 px-3 py-1 rounded hover:bg-purple-700">
                Dashboard
            </a>
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="text-red-400 hover:underline">Keluar</button>
            </form>
        </div>
    </div>
</nav>

{{-- 📋 LOWONGAN LIST --}}
<div class="min-h-screen bg-gradient-to-br from-purple-100 via-white to-blue-100 text-gray-900 p-10">
    <h1 class="text-3xl font-bold text-center mb-10">🔍 Lowongan Tersedia</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($lowongans as $l)
            <div class="bg-white rounded-lg shadow-lg p-6 border-t-4 border-blue-500 hover:shadow-xl transition">
                <h3 class="text-lg font-semibold">{{ $l->title }}</h3>
                <p class="text-sm text-gray-600 mt-1">{{ Str::limit($l->description, 80) }}</p>
                <p class="text-xs text-gray-400 mt-2">📍 {{ $l->location }}</p>
                <p class="text-xs text-gray-400">⏰ Deadline: {{ $l->deadline->format('d M Y') }}</p>

                <a href="{{ route('pencaker.lowongan.show', $l->id) }}"
                   class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">
                    Lihat Detail
                </a>
            </div>
        @empty
            <div class="col-span-3 text-center text-gray-400">
                Belum ada lowongan tersedia.
            </div>
        @endforelse
    </div>
</div>

</body>
</html>
