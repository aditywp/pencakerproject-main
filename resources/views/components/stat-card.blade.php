@props(['title', 'value', 'color' => 'purple'])

@php
    $borderClass = match($color) {
        'purple' => 'border-purple-600',
        default => 'border-gray-300',
    };
@endphp

<div class="bg-white rounded shadow p-6 border-t-4 {{ $borderClass }}">
    <div class="text-sm text-gray-500 font-semibold">{{ $title }}</div>
    <div class="text-3xl font-bold mt-2 text-gray-900">{{ $value }}</div>
</div>
