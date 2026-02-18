@props([
    'title' => '',
    'subtitle' => null,
])

<div {{ $attributes->merge(['class' => 'flex flex-col sm:flex-row sm:items-center justify-between gap-3']) }}>
    <div class="min-w-0">
        <h1 class="text-lg font-semibold text-zinc-900 dark:text-white">{{ $title }}</h1>
        @if ($subtitle)
            <p class="text-sm text-zinc-500 dark:text-zinc-400 mt-0.5">{{ $subtitle }}</p>
        @endif
    </div>

    @if ($slot->isNotEmpty())
        <div class="flex items-center gap-2 shrink-0">
            {{ $slot }}
        </div>
    @endif
</div>
