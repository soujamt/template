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

<td
    {{ $attributes->merge([
        'class' => "px-4 py-3.5 text-sm text-zinc-500 dark:text-zinc-400 whitespace-nowrap $alignClass",
    ]) }}>
    {{ $slot }}
</td>
