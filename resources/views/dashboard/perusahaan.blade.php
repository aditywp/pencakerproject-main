<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Perusahaan - AntiNganggur</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen bg-gray-900 text-white font-sans">

<div class="flex min-h-screen">
    {{-- SIDEBAR --}}
    <aside class="w-64 bg-gray-950 text-white p-6 flex flex-col justify-between">
        <div>
            <h1 class="text-2xl font-bold text-purple-400 mb-8 text-center">AntiNganggur</h1>
            <nav class="space-y-3 text-sm">
                <a href="{{ route('perusahaan.dashboard') }}" class="block px-4 py-2 rounded bg-purple-800">🏢 Dashboard</a>
                <a href="{{ route('vacancies.index') }}" class="block px-4 py-2 rounded hover:bg-purple-800">📄 Lowongan</a>
                <a href="{{ route('perusahaan.magang.index') }}" class="block px-4 py-2 rounded hover:bg-purple-800">💼 Magang</a>
                <a href="{{ route('perusahaan.beasiswa.index') }}" class="block px-4 py-2 rounded hover:bg-purple-800">🎓 Beasiswa</a>
            </nav>
        </div>
        <div class="text-xs text-gray-400 text-center border-t border-gray-700 pt-6">
            <a href="#" class="hover:text-purple-300">Support</a> • 
            <a href="#" class="hover:text-purple-300">Kontak</a>
        </div>
    </aside>

    {{-- MAIN CONTENT --}}
    <main class="flex-1 bg-gradient-to-br from-purple-100 via-white to-blue-100 text-gray-900 flex flex-col">
        {{-- NAVBAR --}}
        <div class="flex justify-between items-center bg-white px-8 py-4 shadow border-b border-gray-200">
            <div>
                <h2 class="text-lg font-semibold text-gray-800">
                    👋 Hai, {{ auth()->user()->name }} (Perusahaan)
                </h2>
            </div>
            <div class="flex items-center space-x-4">
                <a href="{{ route('profile.edit') }}"
                   class="text-sm text-gray-700 hover:text-purple-700 transition">Profil</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-1 rounded text-sm shadow transition">
                        Keluar
                    </button>
                </form>
            </div>
        </div>

        {{-- CONTENT --}}
        <div class="p-10 flex-1">
            <h2 class="text-3xl font-bold mb-4">Dashboard Perusahaan</h2>
            <p class="mb-8 text-gray-700">Selamat datang, {{ auth()->user()->name }}! Kelola lowongan, magang, dan beasiswa perusahaan kamu di sini.</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <a href="{{ route('vacancies.index') }}" class="bg-white rounded-lg shadow-lg p-6 border-t-4 border-blue-500 hover:shadow-xl transition">
                    <h3 class="text-lg font-semibold text-gray-700">Lowongan</h3>
                    <p class="mt-2 text-sm text-gray-500">Kelola info pekerjaan yang kamu buka.</p>
                </a>
                <a href="{{ route('perusahaan.magang.index') }}" class="bg-white rounded-lg shadow-lg p-6 border-t-4 border-green-500 hover:shadow-xl transition">
                    <h3 class="text-lg font-semibold text-gray-700">Magang</h3>
                    <p class="mt-2 text-sm text-gray-500">Buka peluang magang untuk mahasiswa atau pencari pengalaman.</p>
                </a>
                <a href="{{ route('perusahaan.beasiswa.index') }}" class="bg-white rounded-lg shadow-lg p-6 border-t-4 border-purple-500 hover:shadow-xl transition">
                    <h3 class="text-lg font-semibold text-gray-700">Beasiswa</h3>
                    <p class="mt-2 text-sm text-gray-500">Tawarkan beasiswa pendidikan dari perusahaanmu.</p>
                </a>
            </div>
        </div>

        {{-- FOOTER --}}
        <div class="py-6 bg-white text-center text-sm text-gray-500 border-t border-gray-300">
            &copy; {{ date('Y') }} AntiNganggur. Platform rekrutmen cerdas.
        </div>
    </main>
</div>

</body>
</html>