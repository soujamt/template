@props([
    'align' => 'left',
    'sortable' => false,
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
        'class' =>
            "px-4 py-3 text-xs font-medium text-zinc-500 dark:text-zinc-400 whitespace-nowrap $alignClass" .
            ($sortable ? ' cursor-pointer select-none hover:text-zinc-700 dark:hover:text-zinc-200 transition-colors' : ''),
    ]) }}>
    @if ($sortable)
        <span class="inline-flex items-center gap-1 group">
            {{ $slot }}
            <svg class="w-3 h-3 text-zinc-400 group-hover:text-zinc-500 transition-colors" viewBox="0 0 16 16"
                fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 6L8 3L11 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M5 10L8 13L11 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </span>
    @else
        {{ $slot }}
    @endif
</th>
