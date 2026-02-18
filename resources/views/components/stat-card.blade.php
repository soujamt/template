@props([
    'label' => '',
    'value' => '',
    'change' => null,
    'trend' => 'up',
    'icon' => null,
    'color' => 'primary',
])

@php
    $iconColors = [
        'primary' => 'bg-indigo-100 text-indigo-600 dark:bg-indigo-500/10 dark:text-indigo-400',
        'blue' => 'bg-blue-100 text-blue-600 dark:bg-blue-500/10 dark:text-blue-400',
        'green' => 'bg-emerald-100 text-emerald-600 dark:bg-emerald-500/10 dark:text-emerald-400',
        'yellow' => 'bg-amber-100 text-amber-600 dark:bg-amber-500/10 dark:text-amber-400',
        'red' => 'bg-red-100 text-red-600 dark:bg-red-500/10 dark:text-red-400',
        'purple' => 'bg-purple-100 text-purple-600 dark:bg-purple-500/10 dark:text-purple-400',
        'rose' => 'bg-rose-100 text-rose-600 dark:bg-rose-500/10 dark:text-rose-400',
    ];

    $iconColorClass = $iconColors[$color] ?? $iconColors['primary'];

    $trendColor = $trend === 'up' ? 'text-emerald-600 dark:text-emerald-400' : 'text-red-500 dark:text-red-400';

    $trendIcon = $trend === 'up' ? 'ph-trend-up' : 'ph-trend-down';
@endphp

<x-card {{ $attributes }}>
    <div class="flex items-start justify-between gap-4">
        <div class="flex items-center gap-3 min-w-0">
            @if ($icon)
                <div class="flex items-center justify-center w-9 h-9 rounded-md {{ $iconColorClass }} shrink-0">
                    <i class="{{ $icon }} text-lg"></i>
                </div>
            @endif
            <span class="text-sm font-medium text-zinc-500 dark:text-zinc-400 truncate">{{ $label }}</span>
        </div>

        @if (isset($actions))
            <div class="shrink-0">
                {{ $actions }}
            </div>
        @endif
    </div>

    <div class="mt-3">
        <span class="text-2xl font-semibold text-zinc-900 dark:text-white tracking-tight">{{ $value }}</span>
    </div>

    @if ($change)
        <div class="flex items-center gap-1.5 mt-2">
            <i class="ph-fill {{ $trendIcon }} text-sm {{ $trendColor }}"></i>
            <span class="text-xs font-medium {{ $trendColor }}">{{ $change }}</span>
            <span class="text-xs text-zinc-400 dark:text-zinc-500">vs last month</span>
        </div>
    @endif
</x-card>
