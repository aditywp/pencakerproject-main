<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lamar Lowongan - AntiNganggur</title>
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
                    Dashboard
                </a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-red-400 hover:underline">Keluar</button>
                </form>
            </div>
        </div>
    </nav>

    {{-- 📝 FORM LAMARAN --}}
    <section class="flex-grow py-16 px-6 bg-gradient-to-br from-purple-100 via-white to-blue-100">
        <div class="max-w-xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">📄 Lamar Lowongan</h2>

            <p class="text-center text-gray-600 mb-4">
                Kamu sedang melamar posisi: <strong>{{ $vacancy->title }}</strong>
            </p>

            <form method="POST" action="{{ route('lamaran.store') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <input type="hidden" name="vacancy_id" value="{{ $vacancy->id }}">

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Upload CV (PDF)</label>
                    <input type="file" name="cv_file" accept="application/pdf" required 
                           class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <button type="submit"
                        class="w-full bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition shadow">
                    Kirim Lamaran
                </button>
            </form>
        </div>
    </section>

</body>
</html>
