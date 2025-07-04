<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Pengguna - AntiNganggur</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-900 text-white font-sans">

<div class="flex min-h-screen">

    {{-- SIDEBAR --}}
    <aside class="w-64 bg-gray-950 p-6 flex flex-col justify-between">
        <div>
            <h1 class="text-2xl font-bold text-purple-400 mb-8 text-center">AntiNganggur</h1>
            <nav class="space-y-3 text-sm">
                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded hover:bg-purple-800">📊 Dashboard</a>
                <a href="{{ route('admin.users.index') }}" class="block px-4 py-2 rounded bg-purple-800">👤 Pengguna</a>
                <a href="{{ route('admin.company.index') }}" class="block px-4 py-2 rounded hover:bg-purple-800">🏢 Perusahaan</a>
                <a href="#" class="block px-4 py-2 rounded hover:bg-purple-800">📢 Iklan</a>
                <a href="#" class="block px-4 py-2 rounded hover:bg-purple-800">📩 Lamaran</a>
                <a href="{{ route('admin.magang.index') }}" class="block px-4 py-2 rounded hover:bg-purple-800">💼 Magang</a>
                <a href="{{ route('admin.beasiswa.index') }}" class="block px-4 py-2 rounded hover:bg-purple-800">🎓 Beasiswa</a>
            </nav>
        </div>
    </aside>

    {{-- MAIN CONTENT --}}
    <main class="flex-1 p-10 bg-gradient-to-br from-purple-100 via-white to-blue-100 text-gray-900">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-3xl font-bold">Edit Pengguna</h2>
                <p class="text-sm text-gray-600">Ubah informasi pengguna sesuai kebutuhan.</p>
            </div>
            <a href="{{ route('admin.users.index') }}" class="text-purple-700 hover:underline">← Kembali</a>
        </div>

        {{-- FORM --}}
        <div class="bg-white rounded-lg shadow-lg p-8 max-w-2xl mx-auto">
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <strong>Oops!</strong> Ada beberapa error:
                    <ul class="list-disc pl-5 mt-2 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label class="block font-semibold mb-1">Nama</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}"
                           class="w-full border px-4 py-2 rounded focus:ring focus:ring-purple-300" required>
                </div>

                <div>
                    <label class="block font-semibold mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                           class="w-full border px-4 py-2 rounded focus:ring focus:ring-purple-300" required>
                </div>

                <div>
                    <label class="block font-semibold mb-1">Role</label>
                    <select name="role"
                            class="w-full border px-4 py-2 rounded focus:ring focus:ring-purple-300" required>
                        <option value="admin" @selected($user->role == 'admin')>Admin</option>
                        <option value="perusahaan" @selected($user->role == 'perusahaan')>Perusahaan</option>
                        <option value="pencaker" @selected($user->role == 'pencaker')>Pencaker</option>
                    </select>
                </div>

                <div class="text-right">
                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded shadow">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </main>
</div>

</body>
</html>
