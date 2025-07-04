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
                <a href="{{ route('public.lowongan') }}" class="hover:text-purple-300">Lowongan</a>
                <a href="{{ route('public.magang') }}" class="hover:text-purple-300">Magang</a>
                <a href="{{ route('public.beasiswa') }}" class="hover:text-purple-300">Beasiswa</a>
            </div>

            {{-- AKSES LOGIN/REGISTER --}}
            <div class="space-x-3 text-sm md:text-base">
                @auth
                    <a href="{{ 
                        auth()->user()->role === 'admin' ? route('admin.dashboard') :
                        (auth()->user()->role === 'perusahaan' ? route('perusahaan.dashboard') :
                        route('pencaker.dashboard')) }}"
                       class="bg-purple-600 px-3 py-1 rounded text-white hover:bg-purple-700">
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

    {{-- CONTENT --}}
    <div class="min-h-screen bg-gradient-to-br from-purple-100 via-white to-blue-100 text-gray-900 p-10">
        <h1 class="text-3xl font-bold text-center mb-10">📄 Lowongan Terbaru</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($vacancies as $v)
                <div class="bg-white rounded-lg shadow-lg p-6 border-t-4 border-blue-500 hover:shadow-xl transition">
                    <h3 class="text-lg font-semibold">{{ $v->title }}</h3>
                    <p class="text-sm text-gray-600 mt-1">{{ Str::limit($v->description, 100) }}</p>
                    <p class="text-xs text-gray-400 mt-2">📍 {{ $v->location }}</p>
                    <p class="text-xs text-gray-400">⏰ Deadline: {{ $v->deadline ? \Carbon\Carbon::parse($v->deadline)->format('d M Y') : '-' }}</p>

                    <a href="{{ route('login') }}"
                       class="mt-4 inline-block bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700 text-sm">
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
