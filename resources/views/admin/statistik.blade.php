@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-8 text-white">
    <h1 class="text-2xl font-bold mb-6">📊 Statistik Platform</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-blue-600 p-5 rounded-lg shadow">
            <h2 class="text-lg font-semibold">👤 Total Pengguna</h2>
            <p class="text-3xl mt-2">{{ $totalUser }}</p>
        </div>

        <div class="bg-green-600 p-5 rounded-lg shadow">
            <h2 class="text-lg font-semibold">💼 Total Lowongan</h2>
            <p class="text-3xl mt-2">{{ $totalLowongan }}</p>
        </div>

        <div class="bg-purple-600 p-5 rounded-lg shadow">
            <h2 class="text-lg font-semibold">📥 Total Lamaran</h2>
            <p class="text-3xl mt-2">{{ $totalLamaran }}</p>
        </div>
    </div>
</div>
@endsection
