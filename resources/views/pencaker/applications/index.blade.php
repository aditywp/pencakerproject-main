<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lamaran Saya - AntiNganggur</title>
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
                <a href="{{ route('home') }}" class="hover:text-purple-300">Beranda</a>
                <a href="{{ route('pencaker.lowongan.index') }}" class="hover:text-purple-300">Lowongan</a>
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

    {{-- 📨 LAMARAN LIST --}}
    <section class="flex-grow px-6 py-16 bg-gradient-to-br from-purple-100 via-white to-blue-100">
        <div class="max-w-5xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">📄 Lamaran Saya</h2>

            @if ($applications->isEmpty())
                <p class="text-gray-600">Belum ada lamaran yang dikirim.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full table-auto text-sm border border-gray-200">
                        <thead class="bg-purple-100 text-left">
                            <tr>
                                <th class="p-3">Posisi</th>
                                <th class="p-3">Perusahaan</th>
                                <th class="p-3">Lokasi</th>
                                <th class="p-3">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applications as $app)
                                <tr class="border-t border-gray-200 hover:bg-purple-50 transition">
                                    <td class="p-3">{{ $app->vacancy->title }}</td>
                                    <td class="p-3">{{ $app->vacancy->company->name ?? '-' }}</td>
                                    <td class="p-3">{{ $app->vacancy->location }}</td>
                                    <td class="p-3">
                                        <span class="px-2 py-1 rounded text-xs font-medium
                                            @if($app->status === 'pending') bg-yellow-200 text-yellow-800
                                            @elseif($app->status === 'accepted') bg-green-200 text-green-800
                                            @else bg-red-200 text-red-800 @endif">
                                            {{ ucfirst($app->status) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </section>

</body>
</html>
