<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Beasiswa - AntiNganggur</title>
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
                <a href="{{ route('admin.beasiswa.index') }}" class="block px-4 py-2 rounded bg-purple-800">🎓 Beasiswa</a>
                <a href="{{ route('admin.magang.index') }}" class="block px-4 py-2 rounded hover:bg-purple-800">💼 Magang</a>
                <a href="{{ route('admin.company.index') }}" class="block px-4 py-2 rounded hover:bg-purple-800">🏢 Perusahaan</a>
            </nav>
        </div>
    </aside>

    {{-- MAIN --}}
    <main class="flex-1 p-10 bg-gradient-to-br from-purple-100 via-white to-blue-100 text-gray-900">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-3xl font-bold">Edit Beasiswa</h2>
                <p class="text-sm text-gray-600">Update informasi beasiswa di bawah ini.</p>
            </div>
            <a href="{{ route('admin.beasiswa.index') }}" class="text-purple-700 hover:underline">← Kembali</a>
        </div>

        {{-- FORM --}}
        <div class="bg-white rounded-lg shadow-lg p-8 max-w-2xl mx-auto">
            <form action="{{ route('admin.beasiswa.update', $beasiswa->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label class="block font-semibold mb-1">Judul</label>
                    <input type="text" name="judul" value="{{ old('judul', $beasiswa->judul) }}"
                        class="w-full border px-4 py-2 rounded focus:ring focus:ring-purple-300" required>
                </div>

                <div>
                    <label class="block font-semibold mb-1">Deskripsi</label>
                    <textarea name="deskripsi" rows="4"
                        class="w-full border px-4 py-2 rounded focus:ring focus:ring-purple-300"
                        required>{{ old('deskripsi', $beasiswa->deskripsi) }}</textarea>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block font-semibold mb-1">Email Kontak</label>
                        <input type="email" name="email" value="{{ old('email', $beasiswa->email) }}"
                            class="w-full border px-4 py-2 rounded focus:ring focus:ring-purple-300" required>
                    </div>

                    <div>
                        <label class="block font-semibold mb-1">No. Telepon</label>
                        <input type="text" name="no_telp" value="{{ old('no_telp', $beasiswa->no_telp) }}"
                            class="w-full border px-4 py-2 rounded focus:ring focus:ring-purple-300" required>
                    </div>
                </div>

                <div>
                    <label class="block font-semibold mb-1">Minimal Pendidikan</label>
                    <input type="text" name="min_pendidikan" value="{{ old('min_pendidikan', $beasiswa->min_pendidikan) }}"
                        class="w-full border px-4 py-2 rounded focus:ring focus:ring-purple-300" required>
                </div>

                <div>
                    <label class="block font-semibold mb-1">Upload Foto Baru (opsional)</label>
                    <input type="file" name="foto"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                        file:rounded-full file:border-0 file:text-sm file:font-semibold
                        file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                </div>

                <div class="text-right">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded shadow">
                        Update Beasiswa
                    </button>
                </div>
            </form>
        </div>
    </main>
</div>

</body>
</html>
