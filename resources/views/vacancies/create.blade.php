@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Lowongan</h2>
    <form method="POST" action="{{ route('vacancies.store') }}">
        @csrf
        <input name="title" placeholder="Judul" required><br>
        <textarea name="description" placeholder="Deskripsi" required></textarea><br>
        <input name="location" placeholder="Lokasi" required><br>
        <input type="date" name="deadline" required><br>
        <button type="submit">Simpan</button>
    </form>
</div>
@endsection