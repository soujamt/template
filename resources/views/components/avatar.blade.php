@props([
    'src' => 'https://avatars.laravel.cloud/',
    'alt' => 'Avatar',
    'size' => 'md',
    'ring' => false,
])

@php
    $sizes = [
        'xs' => 'h-6 w-6',
        'sm' => 'h-7 w-7',
        'md' => 'h-8 w-8',
        'lg' => 'h-9 w-9',
        'xl' => 'h-10 w-10',
    ];

    $sizeClass = $sizes[$size] ?? $sizes['md'];

    $ringClass = $ring ? 'ring-2 ring-zinc-200 dark:ring-zinc-700' : '';
@endphp

<div
    {{ $attributes->merge([
        'class' => "$sizeClass rounded-md bg-zinc-200 dark:bg-zinc-700 shrink-0 overflow-hidden $ringClass",
    ]) }}>
    <img src="{{ $src }}" alt="{{ $alt }}" class="h-full w-full object-cover">
</div>
