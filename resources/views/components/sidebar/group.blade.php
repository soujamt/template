@props(['label' => null])

<div class="space-y-1">
    @if ($label)
        <h3
            class="px-2 text-xs font-semibold leading-6 text-zinc-400 uppercase tracking-wider sidebar-label overflow-hidden whitespace-nowrap">
            {{ $label }}
        </h3>
    @endif

    <div class="space-y-1">
        {{ $slot }}
    </div>
</div>
