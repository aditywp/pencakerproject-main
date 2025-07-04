<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lowongan Saya - Dashboard Perusahaan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen bg-gray-900 text-white font-sans">

<div class="flex min-h-screen">

    {{-- SIDEBAR --}}
    <aside class="w-64 bg-gray-950 text-white p-6 space-y-4 flex flex-col justify-between">
        <div>
            <h1 class="text-2xl font-bold text-purple-400 mb-8 text-center">AntiNganggur</h1>
            <nav class="space-y-3 text-sm">
                <a href="{{ route('perusahaan.dashboard') }}" class="block px-4 py-2 rounded hover:bg-purple-800">🏠 Dashboard</a>
                <a href="{{ route('vacancies.index') }}" class="block px-4 py-2 rounded bg-purple-800">📄 Lowongan</a>
                <a href="{{ route('perusahaan.magang.index') }}" class="block px-4 py-2 rounded hover:bg-purple-800">💼 Magang</a>
                <a href="{{ route('perusahaan.beasiswa.index') }}" class="block px-4 py-2 rounded hover:bg-purple-800">🎓 Beasiswa</a>
            </nav>
        </div>
        <div class="text-xs text-gray-400 text-center border-t border-gray-700 pt-6 space-x-4">
            <a href="#" class="hover:text-purple-300">Support</a>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="hover:text-purple-300">Logout</button>
            </form>
        </div>
    </aside>

    {{-- MAIN CONTENT --}}
    <main class="flex-1 bg-gradient-to-br from-purple-100 via-white to-blue-100 text-gray-900 flex flex-col">

        {{-- NAVBAR --}}
        <div class="flex justify-between items-center bg-white px-8 py-4 shadow border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-800">
                👋 Hai, {{ auth()->user()->name }} (Perusahaan)
            </h2>
            <div class="flex items-center space-x-4">
                <a href="{{ route('profile.edit') }}" class="text-sm text-gray-700 hover:text-purple-700 transition">Profil</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-1 rounded text-sm shadow transition">
                        Keluar
                    </button>
                </form>
            </div>
        </div>

        {{-- CONTENT --}}
        <div class="p-10 flex-1">
            @if(session('success'))
                <div class="mb-4 bg-green-600 text-white px-4 py-2 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">Lowongan Terdaftar</h1>
                <a href="{{ route('vacancies.create') }}" class="bg-green-600 px-4 py-2 rounded text-white hover:bg-green-700 text-sm">
                    + Tambah Lowongan
                </a>
            </div>

            <div class="overflow-x-auto rounded shadow-lg">
                <table class="w-full table-auto border border-gray-200 bg-white text-sm text-gray-800">
                    <thead>
                        <tr class="bg-purple-100 text-left">
                            <th class="p-3">Judul</th>
                            <th class="p-3">Lokasi</th>
                            <th class="p-3">Deadline</th>
                            <th class="p-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($vacancies as $v)
                            <tr class="border-t border-gray-200 hover:bg-purple-50 transition">
                                <td class="p-3">{{ $v->title }}</td>
                                <td class="p-3">{{ $v->location }}</td>
                                <td class="p-3">{{ $v->deadline ? $v->deadline->format('d M Y') : '-' }}</td>
                                <td class="p-3 text-center space-x-2">
                                    <a href="{{ route('vacancies.edit', $v->id) }}" class="text-blue-500 hover:underline">Edit</a>
                                    <a href="{{ route('vacancies.applicants', $v->id) }}" class="text-indigo-500 hover:underline">Pelamar</a>
                                    <form action="{{ route('vacancies.destroy', $v->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Hapus lowongan ini?')" class="text-red-500 hover:underline">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="p-4 text-center text-gray-400">Belum ada lowongan yang dibuat.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
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
