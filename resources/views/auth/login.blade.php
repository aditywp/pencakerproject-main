<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - AntiNganggur</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-900 text-white min-h-screen flex items-center justify-center">

    <div class="bg-gray-800 p-6 rounded shadow w-full max-w-md">
        <h1 class="text-xl font-bold text-purple-400 mb-4">Login</h1>

        @if(session('status'))
            <div class="text-green-400 mb-4">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium">Email</label>
                <input id="email" type="email" name="email" required autofocus
                    class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-purple-500">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium">Password</label>
                <input id="password" type="password" name="password" required
                    class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-purple-500">
            </div>

            <div class="flex items-center justify-between mb-4">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="mr-1">
                    <span class="text-sm">Remember me</span>
                </label>
                <a href="{{ route('password.request') }}" class="text-sm text-purple-400 hover:underline">Forgot password?</a>
            </div>

            <button type="submit"
                class="w-full bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded">
                Login
            </button>
        </form>

        <p class="mt-4 text-sm text-center">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-purple-400 hover:underline">Daftar di sini</a>
        </p>
    </div>

</body>
</html>
