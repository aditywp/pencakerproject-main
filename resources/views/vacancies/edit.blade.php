@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Lowongan</h2>
    <form method="POST" action="{{ route('vacancies.update', $vacancy->id) }}">
        @csrf
        @method('PUT')
        <input name="title" value="{{ $vacancy->title }}" required><br>
        <textarea name="description" required>{{ $vacancy->description }}</textarea><br>
        <input name="location" value="{{ $vacancy->location }}" required><br>
        <input type="date" name="deadline" value="{{ $vacancy->deadline->format('Y-m-d') }}" required><br>
        <button type="submit">Update</button>
    </form>
</div>
@endsection