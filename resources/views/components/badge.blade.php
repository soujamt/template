@props([
    'color' => 'zinc',
    'dot' => false,
    'icon' => null,
    'size' => 'md',
])

@php
    $colors = [
        'zinc' => 'bg-zinc-100 text-zinc-600 dark:bg-zinc-800 dark:text-zinc-400',
        'green' => 'bg-emerald-50 text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-400',
        'red' => 'bg-red-50 text-red-700 dark:bg-red-500/10 dark:text-red-400',
        'yellow' => 'bg-amber-50 text-amber-700 dark:bg-amber-500/10 dark:text-amber-400',
        'orange' => 'bg-orange-50 text-orange-700 dark:bg-orange-500/10 dark:text-orange-400',
        'blue' => 'bg-blue-50 text-blue-700 dark:bg-blue-500/10 dark:text-blue-400',
        'purple' => 'bg-purple-50 text-purple-700 dark:bg-purple-500/10 dark:text-purple-400',
        'primary' => 'bg-indigo-50 text-indigo-700 dark:bg-indigo-500/10 dark:text-indigo-400',
    ];

    $dots = [
        'zinc' => 'bg-zinc-500',
        'green' => 'bg-emerald-500',
        'red' => 'bg-red-500',
        'yellow' => 'bg-amber-500',
        'orange' => 'bg-orange-500',
        'blue' => 'bg-blue-500',
        'purple' => 'bg-purple-500',
        'primary' => 'bg-indigo-500',
    ];

    $sizes = [
        'sm' => 'px-2 py-0.5 text-[11px] gap-1',
        'md' => 'px-2.5 py-0.5 text-xs gap-1.5',
    ];

    $colorClass = $colors[$color] ?? $colors['zinc'];
    $dotClass = $dots[$color] ?? $dots['zinc'];
    $sizeClass = $sizes[$size] ?? $sizes['md'];
@endphp

<span
    {{ $attributes->merge([
        'class' => "inline-flex items-center rounded-full font-medium $sizeClass $colorClass",
    ]) }}>
    @if ($dot)
        <span class="h-1.5 w-1.5 rounded-full shrink-0 {{ $dotClass }}"></span>
    @elseif ($icon)
        <i class="{{ $icon }} text-[11px] shrink-0"></i>
    @endif
    {{ $slot }}
</span>
