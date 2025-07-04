<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Magang - AntiNganggur</title>
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
                <a href="{{ route('admin.company.index') }}" class="block px-4 py-2 rounded hover:bg-purple-800">🏢 Perusahaan</a>
                <a href="{{ route('admin.magang.index') }}" class="block px-4 py-2 rounded bg-purple-800">💼 Magang</a>
                <a href="{{ route('admin.beasiswa.index') }}" class="block px-4 py-2 rounded hover:bg-purple-800">🎓 Beasiswa</a>
            </nav>
        </div>
    </aside>

    {{-- MAIN --}}
    <main class="flex-1 bg-gradient-to-br from-purple-100 via-white to-blue-100 text-gray-900 p-10">
        {{-- Header --}}
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-3xl font-bold">Tambah Magang</h2>
                <p class="text-sm text-gray-600">Isi data magang baru dengan lengkap dan jelas.</p>
            </div>
            <a href="{{ route('admin.magang.index') }}" class="text-purple-700 hover:underline">← Kembali</a>
        </div>

        {{-- Form --}}
        <div class="bg-white rounded-lg shadow-lg p-8 max-w-4xl mx-auto">
            <form action="{{ route('admin.magang.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="keahlian" class="block font-semibold mb-1">Keahlian</label>
                        <input type="text" id="keahlian" name="keahlian" required
                            class="w-full border px-4 py-2 rounded focus:ring focus:ring-purple-300">
                    </div>

                    <div>
                        <label for="min_pendidikan" class="block font-semibold mb-1">Minimal Pendidikan</label>
                        <input type="text" id="min_pendidikan" name="min_pendidikan" required
                            class="w-full border px-4 py-2 rounded focus:ring focus:ring-purple-300">
                    </div>

                    <div>
                        <label for="gaji" class="block font-semibold mb-1">Gaji (Opsional)</label>
                        <input type="number" step="0.01" id="gaji" name="gaji"
                            class="w-full border px-4 py-2 rounded focus:ring focus:ring-purple-300">
                    </div>

                    <div>
                        <label for="no_telp" class="block font-semibold mb-1">Nomor Telepon</label>
                        <input type="text" id="no_telp" name="no_telp" required
                            class="w-full border px-4 py-2 rounded focus:ring focus:ring-purple-300">
                    </div>

                    <div>
                        <label for="email" class="block font-semibold mb-1">Email Kontak</label>
                        <input type="email" id="email" name="email" required
                            class="w-full border px-4 py-2 rounded focus:ring focus:ring-purple-300">
                    </div>

                    <div>
                        <label for="foto" class="block font-semibold mb-1">Upload Foto (Opsional)</label>
                        <input type="file" id="foto" name="foto" class="w-full text-sm">
                    </div>
                </div>

                <div>
                    <label for="deskripsi" class="block font-semibold mb-1">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" rows="4" required
                        class="w-full border px-4 py-2 rounded focus:ring focus:ring-purple-300"></textarea>
                </div>

                <div class="text-right">
                    <button type="submit"
                        class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-2 rounded shadow">
                        Simpan Magang
                    </button>
                </div>
            </form>
        </div>
    </main>
</div>

</body>
</html>
