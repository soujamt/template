@props([
    'src' => null,
    'alt' => 'Avatar',
    'size' => 'md',
    'ring' => false,
    'status' => null, // 'online', 'away', 'offline', null
])

@php
    $sizes = [
        'xs' => ['wrapper' => 'h-6 w-6', 'status' => 'h-1.5 w-1.5'],
        'sm' => ['wrapper' => 'h-7 w-7', 'status' => 'h-2 w-2'],
        'md' => ['wrapper' => 'h-8 w-8', 'status' => 'h-2.5 w-2.5'],
        'lg' => ['wrapper' => 'h-9 w-9', 'status' => 'h-2.5 w-2.5'],
        'xl' => ['wrapper' => 'h-10 w-10', 'status' => 'h-3 w-3'],
    ];

    $sizeMap = $sizes[$size] ?? $sizes['md'];
    $wrapperSize = $sizeMap['wrapper'];
    $statusSize = $sizeMap['status'];
    $ringClass = $ring ? 'ring-2 ring-zinc-200 dark:ring-zinc-700' : '';

    $statusColors = [
        'online' => 'bg-emerald-400',
        'away' => 'bg-amber-400',
        'offline' => 'bg-zinc-400',
    ];

    $statusColor = $statusColors[$status] ?? null;

    // Generate initials fallback from alt text
    $words = explode(' ', trim($alt));
    $initials = strtoupper(substr($words[0], 0, 1) . (isset($words[1]) ? substr($words[1], 0, 1) : ''));
@endphp

<div class="relative shrink-0 inline-flex" {{ $attributes }}>
    <div class="{{ $wrapperSize }} rounded-md bg-zinc-200 dark:bg-zinc-700 overflow-hidden {{ $ringClass }}">
        @if ($src)
            <img src="{{ $src }}" alt="{{ $alt }}" class="h-full w-full object-cover">
        @else
            <div
                class="h-full w-full flex items-center justify-center text-zinc-500 dark:text-zinc-400 font-semibold text-[10px]">
                {{ $initials }}
            </div>
        @endif
    </div>
    @if ($statusColor)
        <span
            class="absolute bottom-0 right-0 block {{ $statusSize }} rounded-full ring-2 ring-white dark:ring-zinc-900 {{ $statusColor }}"></span>
    @endif
</div>
