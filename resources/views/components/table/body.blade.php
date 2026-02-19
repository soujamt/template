@props([])

<tbody
    {{ $attributes->merge([
        'class' => 'divide-y divide-zinc-100 dark:divide-zinc-800 bg-white dark:bg-zinc-900',
    ]) }}>
    {{ $slot }}
</tbody>
