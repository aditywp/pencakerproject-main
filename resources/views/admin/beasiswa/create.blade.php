<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Beasiswa - AntiNganggur</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="//unpkg.com/alpinejs" defer></script>
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
                <a href="{{ route('admin.magang.index') }}" class="block px-4 py-2 rounded hover:bg-purple-800">💼 Magang</a>
                <a href="{{ route('admin.beasiswa.index') }}" class="block px-4 py-2 rounded bg-purple-800">🎓 Beasiswa</a>
            </nav>
        </div>
    </aside>

    {{-- MAIN --}}
    <main class="flex-1 p-10 bg-gradient-to-br from-purple-100 via-white to-blue-100 text-gray-900">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-3xl font-bold">🎓 Tambah Beasiswa</h2>
                <p class="text-sm text-gray-600">Masukkan data beasiswa baru dengan lengkap.</p>
            </div>
            <a href="{{ route('admin.beasiswa.index') }}" class="text-purple-700 hover:underline">← Kembali</a>
        </div>

        {{-- ALERT VALIDASI --}}
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <strong>Waduh!</strong> Ada kesalahan input:
                <ul class="mt-2 list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- ALERT SUCCESS --}}
        @if (session('success'))
            <div 
                x-data="{ show: true }" 
                x-show="show" 
                x-init="setTimeout(() => show = false, 3000)"
                class="bg-green-500 text-white px-4 py-2 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        {{-- FORM --}}
        <div class="bg-white rounded-lg shadow-lg p-8 max-w-3xl mx-auto">
            <form action="{{ route('admin.beasiswa.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block font-semibold mb-1">Judul</label>
                        <input type="text" name="judul" value="{{ old('judul') }}"
                            class="w-full border px-4 py-2 rounded focus:ring focus:ring-purple-300" required>
                    </div>

                    <div>
                        <label class="block font-semibold mb-1">Min. Pendidikan</label>
                        <input type="text" name="min_pendidikan" value="{{ old('min_pendidikan') }}"
                            class="w-full border px-4 py-2 rounded focus:ring focus:ring-purple-300" required>
                    </div>

                    <div>
                        <label class="block font-semibold mb-1">Email Kontak</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="w-full border px-4 py-2 rounded focus:ring focus:ring-purple-300" required>
                    </div>

                    <div>
                        <label class="block font-semibold mb-1">Nomor Telepon</label>
                        <input type="text" name="no_telp" value="{{ old('no_telp') }}"
                            class="w-full border px-4 py-2 rounded focus:ring focus:ring-purple-300" required>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block font-semibold mb-1">Upload Foto</label>
                        <input type="file" name="foto" class="text-sm w-full">
                    </div>
                </div>

                <div>
                    <label class="block font-semibold mb-1">Deskripsi</label>
                    <textarea name="deskripsi" rows="4"
                        class="w-full border px-4 py-2 rounded focus:ring focus:ring-purple-300" required>{{ old('deskripsi') }}</textarea>
                </div>

                <div class="text-right">
                    <button type="submit"
                        class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-2 rounded shadow">
                        Simpan Beasiswa
                    </button>
                </div>
            </form>
        </div>
    </main>
</div>

</body>
</html>
