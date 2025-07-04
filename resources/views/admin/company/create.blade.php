<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Perusahaan - AntiNganggur</title>
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
                <a href="{{ route('admin.company.index') }}" class="block px-4 py-2 rounded bg-purple-800">🏢 Perusahaan</a>
                <a href="{{ route('admin.magang.index') }}" class="block px-4 py-2 rounded hover:bg-purple-800">💼 Magang</a>
                <a href="{{ route('admin.beasiswa.index') }}" class="block px-4 py-2 rounded hover:bg-purple-800">🎓 Beasiswa</a>
            </nav>
        </div>
    </aside>

    {{-- MAIN --}}
    <main class="flex-1 p-10 bg-gradient-to-br from-purple-100 via-white to-blue-100 text-gray-900">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-3xl font-bold">Tambah Perusahaan</h2>
                <p class="text-sm text-gray-600">Masukkan data perusahaan baru untuk listing platform.</p>
            </div>
            <a href="{{ route('admin.company.index') }}" class="text-purple-700 hover:underline">← Kembali</a>
        </div>

        {{-- FORM --}}
        <div class="bg-white rounded-lg shadow-lg p-8 max-w-2xl mx-auto">
            <form action="{{ route('admin.company.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label class="block font-semibold mb-1">Nama Perusahaan</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="w-full border px-4 py-2 rounded focus:ring focus:ring-purple-300" required>
                </div>

                <div>
                    <label class="block font-semibold mb-1">Alamat</label>
                    <input type="text" name="address" value="{{ old('address') }}"
                        class="w-full border px-4 py-2 rounded focus:ring focus:ring-purple-300" required>
                </div>

                <div>
                    <label class="block font-semibold mb-1">Nomor Telepon</label>
                    <input type="text" name="phone" value="{{ old('phone') }}"
                        class="w-full border px-4 py-2 rounded focus:ring focus:ring-purple-300" required>
                </div>

                <div>
                    <label class="block font-semibold mb-1">Pilih Akun User Perusahaan</label>
                    <select name="user_id" class="w-full border px-4 py-2 rounded bg-white text-gray-800" required>
                        <option value="">-- Pilih User --</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">
                                {{ $user->name }} ({{ $user->email }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="text-right">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded shadow">
                        Simpan Perusahaan
                    </button>
                </div>
            </form>
        </div>
    </main>
</div>

</body>
</html>
