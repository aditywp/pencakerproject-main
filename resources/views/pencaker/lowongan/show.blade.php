<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Lowongan - AntiNganggur</title>
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

    {{-- 📋 DETAIL LOWONGAN --}}
    <section class="flex-grow px-6 py-16 bg-gradient-to-br from-purple-100 via-white to-blue-100">
        <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">{{ $lowongan->title }}</h2>

            <p class="text-gray-700 mb-2"><strong>📍 Lokasi:</strong> {{ $lowongan->location }}</p>
            <p class="text-gray-700 mb-2"><strong>⏳ Deadline:</strong> {{ $lowongan->deadline->format('d M Y') }}</p>

            <div class="text-gray-600 mt-6 mb-6 leading-relaxed">
                {{ $lowongan->description }}
            </div>

            <form action="{{ route('pencaker.lowongan.apply', $lowongan->id) }}" method="POST">
                @csrf
                    <button type="submit"
                    class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded shadow transition">
                    Apply Sekarang
                 </button>
            </form>
        </div>
    </section>

</body>
</html>
