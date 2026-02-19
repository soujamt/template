@props([
    'title' => null,
    'subtitle' => null,
    'padding' => true,
])

{{-- Outer border wrapper (Shadcn-style double-border inset) --}}
<div {{ $attributes->merge(['class' => 'rounded-xl border border-zinc-200 dark:border-zinc-700/70 p-1']) }}>

    {{-- Inner card surface --}}
    <div
        class="flex flex-col text-zinc-900 dark:text-zinc-100 border border-zinc-200 dark:border-zinc-700 shadow-sm rounded-lg bg-zinc-50/30 dark:bg-zinc-800/20 overflow-hidden">

        @if ($title || isset($headerActions))
            <div @class([
                'grid auto-rows-min items-center gap-x-4 gap-y-1 px-5 py-3.5 border-b border-zinc-100 dark:border-zinc-700/60',
                'grid-cols-[1fr_auto]' => isset($headerActions),
            ])>
                {{-- Title / Subtitle --}}
                <div class="min-w-0">
                    @if (isset($title) && is_object($title))
                        <div class="leading-none font-semibold text-sm">{{ $title }}</div>
                    @elseif ($title)
                        <h3 class="leading-none font-semibold text-sm text-zinc-900 dark:text-white truncate">
                            {{ $title }}</h3>
                        @if ($subtitle)
                            <p class="text-xs text-zinc-500 dark:text-zinc-400 mt-1">{{ $subtitle }}</p>
                        @endif
                    @endif
                </div>

                @if (isset($headerActions))
                    <div class="flex items-center gap-2 shrink-0">
                        {{ $headerActions }}
                    </div>
                @endif
            </div>
        @endif

        {{-- Card content --}}
        <div @class(['px-5 py-4' => $padding])>
            {{ $slot }}
        </div>

        @if (isset($footer))
            <div
                class="px-5 py-3 border-t border-zinc-100 dark:border-zinc-700/60 bg-zinc-50/50 dark:bg-zinc-800/30 rounded-b-lg">
                {{ $footer }}
            </div>
        @endif

    </div>
</div>
