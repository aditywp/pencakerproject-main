<div class="min-h-screen w-64 bg-gray-900 text-white flex flex-col py-6 px-4 shadow-md">
    <h1 class="text-2xl font-bold text-purple-400 mb-10 text-center">🔥 AntiNganggur</h1>

    <nav class="flex flex-col space-y-4 text-sm">
        <a href="{{ route('admin.dashboard') }}" class="hover:text-purple-400 transition">📊 Dashboard</a>
        <a href="#" class="hover:text-purple-400 transition">👤 Pengguna</a>
        <a href="{{ route('admin.company.index') }}" class="hover:text-purple-400 transition">🏢 Perusahaan</a>
        <a href="#" class="hover:text-purple-400 transition">📢 Iklan</a>
        <a href="#" class="hover:text-purple-400 transition">📩 Lamaran</a>
        <a href="{{ route('admin.magang.index') }}" class="hover:text-purple-400 transition">💼 Magang</a>
        <a href="{{ route('admin.beasiswa.index') }}" class="hover:text-purple-400 transition">🎓 Beasiswa</a>
    </nav>

    <div class="mt-auto pt-10 border-t border-gray-700 text-xs text-gray-400 space-x-4 text-center">
        <a href="#" class="hover:text-purple-300">About</a>
        <a href="#" class="hover:text-purple-300">Support</a>
        <a href="#" class="hover:text-purple-300">Contact Us</a>
    </div>
</div>
