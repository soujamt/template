@props([
    'color' => 'zinc',
    'dot' => false,
    'size' => 'md',
])

@php
    $colors = [
        'zinc' => 'bg-zinc-100 text-zinc-600 dark:bg-zinc-800 dark:text-zinc-400',
        'green' => 'bg-emerald-50 text-emerald-600 dark:bg-emerald-500/10 dark:text-emerald-400',
        'red' => 'bg-red-50 text-red-600 dark:bg-red-500/10 dark:text-red-400',
        'yellow' => 'bg-amber-50 text-amber-600 dark:bg-amber-500/10 dark:text-amber-400',
        'blue' => 'bg-blue-50 text-blue-600 dark:bg-blue-500/10 dark:text-blue-400',
        'purple' => 'bg-purple-50 text-purple-600 dark:bg-purple-500/10 dark:text-purple-400',
        'primary' => 'bg-indigo-50 text-indigo-600 dark:bg-indigo-500/10 dark:text-indigo-400',
    ];

    $dots = [
        'zinc' => 'bg-zinc-500',
        'green' => 'bg-emerald-500',
        'red' => 'bg-red-500',
        'yellow' => 'bg-amber-500',
        'blue' => 'bg-blue-500',
        'purple' => 'bg-purple-500',
        'primary' => 'bg-indigo-500',
    ];

    $sizes = [
        'sm' => 'px-1.5 py-0.5 text-[11px]',
        'md' => 'px-2 py-0.5 text-xs',
    ];

    $colorClass = $colors[$color] ?? $colors['zinc'];
    $dotClass = $dots[$color] ?? $dots['zinc'];
    $sizeClass = $sizes[$size] ?? $sizes['md'];
@endphp

<span
    {{ $attributes->merge([
        'class' => "inline-flex items-center gap-1.5 rounded-md font-medium $sizeClass $colorClass",
    ]) }}>
    @if ($dot)
        <span class="h-1.5 w-1.5 rounded-full {{ $dotClass }}"></span>
    @endif
    {{ $slot }}
</span>
