@props([])

<tr
    {{ $attributes->merge([
        'class' => 'hover:bg-zinc-50/70 dark:hover:bg-zinc-800/40 transition-colors duration-100',
    ]) }}>
    {{ $slot }}
</tr>
