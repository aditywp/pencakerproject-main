<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - AntiNganggur</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen bg-gray-900 text-white font-sans">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-gray-950 text-white p-6 space-y-4 flex flex-col justify-between">
        <div>
            <h1 class="text-2xl font-bold text-purple-400 mb-8 text-center">AntiNganggur</h1>
            <nav class="space-y-3 text-sm">
                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded hover:bg-purple-800">📊 Dashboard</a>
                <a href="{{ route('admin.users.index') }}" class="block px-4 py-2 rounded hover:bg-purple-800">👤 Pengguna</a>
                <a href="{{ route('admin.company.index') }}" class="block px-4 py-2 rounded hover:bg-purple-800">🏢 Perusahaan</a>
                <a href="{{ route('admin.comercial.index') }}" class="block px-4 py-2 rounded hover:bg-purple-800">📢 Iklan</a>
                <a href="{{ route('admin.lamaran.index') }}" class="block px-4 py-2 rounded hover:bg-purple-800">📩 Lamaran</a>
                <a href="{{ route('admin.magang.index') }}" class="block px-4 py-2 rounded hover:bg-purple-800">💼 Magang</a>
                <a href="{{ route('admin.beasiswa.index') }}" class="block px-4 py-2 rounded hover:bg-purple-800">🎓 Beasiswa</a>
            </nav>
        </div>
        <div class="text-xs text-gray-400 text-center space-x-4 border-t border-gray-700 pt-6">
            <a href="#" class="hover:text-purple-300">About</a>
            <a href="#" class="hover:text-purple-300">Support</a>
            <a href="#" class="hover:text-purple-300">Contact</a>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 bg-gradient-to-br from-purple-100 via-white to-blue-100 text-gray-900 flex flex-col">
        <!-- NAVBAR -->
        <div class="flex justify-between items-center bg-white px-8 py-4 shadow border-b border-gray-200">
            <div>
                <h2 class="text-lg font-semibold text-gray-800">
                    👋 Hai, {{ auth()->user()->name }} ({{ ucfirst(auth()->user()->role) }})
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

        <!-- CONTENT -->
        <div class="p-10 flex-1">
            <h2 class="text-3xl font-bold mb-4">Admin Dashboard</h2>
            <p class="mb-8 text-gray-700">Selamat datang kembali, Admin! Kelola platform AntiNganggur dengan bijak.</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ([
                    ['Total Pengguna', '6'],
                    ['Total Perusahaan', '4'],
                    ['Iklan Aktif', '3'],
                    ['Total Lamaran', '2'],
                    ['Informasi Magang', '0'],
                    ['Informasi Beasiswa', '0'],
                ] as [$title, $value])
                <div class="bg-white rounded-lg shadow-lg p-6 border-t-4 border-purple-600">
                    <h3 class="text-lg font-semibold text-gray-700">{{ $title }}</h3>
                    <p class="mt-4 text-3xl font-bold text-purple-700">{{ $value }}</p>
                </div>
                @endforeach
            </div>
        </div>

        <!-- FOOTER -->
        <div class="py-6 bg-white text-center text-sm text-gray-500 border-t border-gray-300">
            &copy; {{ date('Y') }} AntiNganggur. All rights reserved.
        </div>
    </main>
</div>

</body>
</html>
