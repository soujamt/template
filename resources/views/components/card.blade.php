@props([
    'title' => null,
    'subtitle' => null,
    'padding' => true,
])

<div
    {{ $attributes->merge([
        'class' => 'bg-white dark:bg-zinc-900 rounded-lg border border-zinc-200 dark:border-zinc-800 overflow-hidden',
    ]) }}>
    @if ($title || isset($headerActions))
        <div class="flex items-center justify-between gap-4 px-5 py-4 border-b border-zinc-100 dark:border-zinc-800">
            <div class="min-w-0">
                @if ($title)
                    <h3 class="text-sm font-semibold text-zinc-900 dark:text-white truncate">{{ $title }}</h3>
                @endif
                @if ($subtitle)
                    <p class="text-xs text-zinc-500 dark:text-zinc-400 mt-0.5">{{ $subtitle }}</p>
                @endif
            </div>
            @if (isset($headerActions))
                <div class="flex items-center gap-2 shrink-0">
                    {{ $headerActions }}
                </div>
            @endif
        </div>
    @endif

    <div @class([
        'px-5 py-4' => $padding,
    ])>
        {{ $slot }}
    </div>
</div>
