@extends('layouts.app') {{-- Asumsikan layout utama bernama app.blade.php --}}

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-900">
    <div class="bg-gray-800 p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold text-purple-400 mb-6 text-center">Register</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm text-gray-200 mb-1">Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                       class="w-full px-4 py-2 bg-gray-700 text-white rounded border border-purple-500 focus:outline-none focus:ring-2 focus:ring-purple-600">
                @error('name')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm text-gray-200 mb-1">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                       class="w-full px-4 py-2 bg-gray-700 text-white rounded border border-purple-500 focus:outline-none focus:ring-2 focus:ring-purple-600">
                @error('email')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm text-gray-200 mb-1">Password</label>
                <input id="password" type="password" name="password" required
                       class="w-full px-4 py-2 bg-gray-700 text-white rounded border border-purple-500 focus:outline-none focus:ring-2 focus:ring-purple-600">
                @error('password')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm text-gray-200 mb-1">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                       class="w-full px-4 py-2 bg-gray-700 text-white rounded border border-purple-500 focus:outline-none focus:ring-2 focus:ring-purple-600">
            </div>

            <button type="submit"
                    class="w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-4 rounded">
                Register
            </button>
        </form>

        <p class="text-sm text-gray-400 mt-4 text-center">
            Already have an account?
            <a href="{{ route('login') }}" class="text-purple-400 hover:underline">Login</a>
        </p>
    </div>
</div>
@endsection
