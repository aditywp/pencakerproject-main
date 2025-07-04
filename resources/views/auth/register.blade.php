<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register - AntiNganggur</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen bg-gradient-to-br from-purple-100 via-white to-blue-100 flex items-center justify-center">

    <div class="bg-white shadow-lg rounded-xl w-full max-w-md p-8">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Daftar Akun</h2>

        @if ($errors->any())
            <div class="mb-4 text-sm text-red-600">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <div>
                <label class="block mb-1 text-gray-700 font-medium">Nama</label>
                <input type="text" name="name" value="{{ old('name') }}" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400">
            </div>

            <div>
                <label class="block mb-1 text-gray-700 font-medium">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400">
            </div>

            <div>
                <label class="block mb-1 text-gray-700 font-medium">Password</label>
                <input type="password" name="password" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400">
            </div>

            <div>
                <label class="block mb-1 text-gray-700 font-medium">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400">
            </div>

            <div class="text-center">
                <button type="submit"
                        class="w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-4 rounded-lg transition">
                    Daftar
                </button>
            </div>
        </form>

        <div class="mt-6 text-center text-sm text-gray-600">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-purple-600 hover:underline">Masuk di sini</a>
        </div>
    </div>

</body>
</html>