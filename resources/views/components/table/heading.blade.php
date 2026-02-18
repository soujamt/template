@props([
    'align' => 'left',
])

@php
    $alignClass = match ($align) {
        'center' => 'text-center',
        'right' => 'text-right',
        default => 'text-left',
    };
@endphp

<th
    {{ $attributes->merge([
        'class' => "px-4 py-3 text-xs font-medium text-zinc-500 dark:text-zinc-400 uppercase tracking-wider whitespace-nowrap $alignClass",
    ]) }}>
    {{ $slot }}
</th>
