<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perusahaan - Admin AntiNganggur</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen bg-gray-900 text-white font-sans">

<div class="flex min-h-screen">

    {{-- SIDEBAR --}}
    <aside class="w-64 bg-gray-950 text-white p-6 space-y-4 flex flex-col justify-between">
        <div>
            <h1 class="text-2xl font-bold text-purple-400 mb-8 text-center">AntiNganggur</h1>
            <nav class="space-y-3 text-sm">
                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded hover:bg-purple-800">📊 Dashboard</a>
                <a href="{{ route('admin.users.index') }}" class="block px-4 py-2 rounded hover:bg-purple-800">👤 Pengguna</a>
                <a href="{{ route('admin.company.index') }}" class="block px-4 py-2 rounded bg-purple-800">🏢 Perusahaan</a>
                <a href="{{ route('admin.iklan.index') }}" class="block px-4 py-2 rounded hover:bg-purple-800">📢 Iklan</a>
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

    {{-- MAIN CONTENT --}}
    <main class="flex-1 bg-gradient-to-br from-purple-100 via-white to-blue-100 text-gray-900 flex flex-col">
        {{-- NAVBAR --}}
        <div class="flex justify-between items-center bg-white px-8 py-4 shadow border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-800">Daftar Perusahaan</h2>
            <div class="flex items-center space-x-4">
                <a href="{{ route('profile.edit') }}" class="text-sm text-gray-700 hover:text-purple-700">Profil</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-1 rounded text-sm shadow">
                        Keluar
                    </button>
                </form>
            </div>
        </div>

        <div class="p-10">
            {{-- Tombol Tambah --}}
            <div class="mb-6 flex justify-end">
                <a href="{{ route('admin.company.create') }}"
                   class="bg-green-600 px-4 py-2 rounded text-white hover:bg-green-700 text-sm">
                    + Tambah Perusahaan
                </a>
            </div>

            {{-- Table --}}
            <div class="overflow-x-auto bg-white shadow rounded-lg">
                <table class="w-full text-sm text-gray-800">
                    <thead class="bg-purple-100 border-b border-gray-300 text-left">
                        <tr>
                            <th class="p-4">Nama</th>
                            <th class="p-4">Alamat</th>
                            <th class="p-4">Telepon</th>
                            <th class="p-4">Email User</th>
                            <th class="p-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($companies as $company)
                            <tr class="hover:bg-purple-50 transition border-b border-gray-200">
                                <td class="p-4">{{ $company->name }}</td>
                                <td class="p-4">{{ $company->address }}</td>
                                <td class="p-4">{{ $company->phone }}</td>
                                <td class="p-4">{{ $company->user->email }}</td>
                                <td class="p-4 text-center space-x-2">
                                    <a href="{{ route('admin.company.edit', $company->id) }}" class="text-blue-600 hover:underline">Edit</a>
                                    <form action="{{ route('admin.company.destroy', $company->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Yakin ingin hapus perusahaan ini?')"
                                                class="text-red-600 hover:underline">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-4 text-center text-gray-400">Belum ada perusahaan terdaftar.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>

</body>
</html>
