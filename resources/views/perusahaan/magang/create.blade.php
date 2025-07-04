<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Magang - Dashboard Perusahaan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen bg-gray-900 text-white font-sans">

<div class="flex min-h-screen">

    {{-- SIDEBAR --}}
    <aside class="w-64 bg-gray-950 text-white p-6 flex flex-col justify-between">
        <div>
            <h1 class="text-2xl font-bold text-purple-400 mb-8 text-center">AntiNganggur</h1>
            <nav class="space-y-3 text-sm">
                <a href="{{ route('perusahaan.dashboard') }}" class="block px-4 py-2 rounded hover:bg-purple-800">🏠 Dashboard</a>
                <a href="{{ route('vacancies.index') }}" class="block px-4 py-2 rounded hover:bg-purple-800">📢 Lowongan</a>
                <a href="{{ route('perusahaan.magang.index') }}" class="block px-4 py-2 rounded bg-purple-800">💼 Magang</a>
                <a href="#" class="block px-4 py-2 rounded hover:bg-purple-800">🎓 Beasiswa</a>
            </nav>
        </div>
    </aside>

    {{-- MAIN --}}
    <main class="flex-1 bg-gradient-to-br from-purple-100 via-white to-blue-100 text-gray-900">
        <div class="flex justify-between items-center bg-white px-8 py-4 shadow border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-800">Tambah Magang Baru</h2>
            <a href="{{ route('perusahaan.magang.index') }}" class="text-purple-700 hover:underline text-sm">← Kembali</a>
        </div>

        <div class="p-10 max-w-2xl mx-auto">
            {{-- Error --}}
            @if ($errors->any())
                <div class="bg-red-600 text-white p-4 rounded mb-4">
                    <strong>Terjadi kesalahan:</strong>
                    <ul class="list-disc pl-6 mt-2 text-sm">
                        @foreach ($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Form --}}
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <form action="{{ route('perusahaan.magang.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div>
                        <label class="block font-semibold mb-1">Keahlian yang Dibutuhkan</label>
                        <input type="text" name="keahlian" value="{{ old('keahlian') }}" class="w-full border px-4 py-2 rounded" required>
                    </div>

                    <div>
                        <label class="block font-semibold mb-1">Minimal Pendidikan</label>
                        <input type="text" name="min_pendidikan" value="{{ old('min_pendidikan') }}" class="w-full border px-4 py-2 rounded" required>
                    </div>

                    <div>
                        <label class="block font-semibold mb-1">Gaji / Uang Saku</label>
                        <input type="number" name="gaji" value="{{ old('gaji') }}" class="w-full border px-4 py-2 rounded" required>
                    </div>

                    <div>
                        <label class="block font-semibold mb-1">Deskripsi Magang</label>
                        <textarea name="deskripsi" rows="4" class="w-full border px-4 py-2 rounded" required>{{ old('deskripsi') }}</textarea>
                    </div>

                    <div>
                        <label class="block font-semibold mb-1">Email Kontak</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="w-full border px-4 py-2 rounded" required>
                    </div>

                    <div>
                        <label class="block font-semibold mb-1">No. Telepon</label>
                        <input type="text" name="no_telp" value="{{ old('no_telp') }}" class="w-full border px-4 py-2 rounded" required>
                    </div>

                    <div>
                        <label class="block font-semibold mb-1">Upload Gambar (opsional)</label>
                        <input type="file" name="foto" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    </div>

                    <div class="text-right">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded shadow">
                            Simpan Magang
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>

</body>
</html>
