@props([])

<tbody {{ $attributes->merge([
    'class' => 'divide-y divide-zinc-100 dark:divide-zinc-800',
]) }}>
    {{ $slot }}
</tbody>
