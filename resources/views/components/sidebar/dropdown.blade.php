@props(['label', 'icon', 'active' => false])

@php
    $isOpen = $active;
    $isActive = $active;

    // Switch to filled icon variant when active
    $iconClass = $isActive ? str_replace('ph ', 'ph-fill ', $icon) : $icon;

    // Secondary button style for active parent (matches button variant=secondary)
    // Applied in both expanded and collapsed modes

@endphp

<div x-data="{
    open: @json($isOpen),
    popoverOpen: false,
    popoverRect: { top: 0, left: 0, height: 0 },
    updatePosition() {
        let rect = $refs.trigger.getBoundingClientRect();
        this.popoverRect = { top: rect.top, left: rect.right + 12, height: rect.height };
    }
}" class="relative" @mouseleave="popoverOpen = false">

    <!-- Parent Item Trigger -->
    <button type="button" x-ref="trigger"
        @click="if(sidebarExpanded) { open = !open } else { sidebarExpanded = true; open = true }"
        @mouseenter="if(!sidebarExpanded) { updatePosition(); popoverOpen = true }"
        @if ($isActive) :class="sidebarExpanded
                ? 'text-zinc-900 dark:text-white border-transparent bg-transparent shadow-none hover:bg-zinc-50 dark:hover:bg-white/5'
                : 'text-zinc-900 dark:text-white bg-white dark:bg-white/10 border-zinc-200 dark:border-white/10 shadow-sm md:justify-center md:px-0 md:w-8 md:mx-auto'"
        @else
            :class="sidebarExpanded
                ? 'border-transparent text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-white/5 dark:hover:text-white'
                : 'border-transparent text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-white/5 dark:hover:text-white md:justify-center md:px-0 md:w-8 md:mx-auto'" @endif
        class="w-full h-8 flex items-center gap-x-3 rounded-md px-2 text-sm font-medium transition-all duration-300 group border border-transparent">

        <!-- Icon -->
        <i
            class="{{ $iconClass }} text-lg shrink-0 transition-colors
            {{ $isActive ? 'text-zinc-700 dark:text-zinc-200' : 'text-zinc-400 group-hover:text-zinc-600 dark:text-zinc-500 dark:group-hover:text-zinc-300' }}"></i>

        <!-- Label (Expanded Only) -->
        <span class="flex-1 truncate text-left sidebar-label" x-show="sidebarExpanded">{{ $label }}</span>

        <!-- Chevron (Expanded Only) -->
        <i class="ph ph-caret-down text-xs shrink-0 transition-transform duration-200 sidebar-label
            {{ $isActive ? 'text-zinc-500 dark:text-zinc-400' : 'text-zinc-400' }}"
            :class="open ? '-rotate-180' : ''" x-show="sidebarExpanded" x-cloak></i>
    </button>

    <!-- Expanded State: Accordion Tree -->
    <div x-show="open && sidebarExpanded" x-collapse x-cloak class="relative mt-0.5">
        <!-- Left border line — only spans the items, not the padding -->
        <div class="absolute left-[1.35rem] top-0 bottom-2 w-px bg-zinc-200 dark:bg-zinc-700/60"></div>
        <div class="pl-9 pr-1 space-y-0.5 pb-1">
            {{ $slot }}
        </div>
    </div>

    <!-- Collapsed State: Floating Popover -->
    <template x-teleport="body">
        <div x-show="popoverOpen && !sidebarExpanded" x-cloak @mouseenter="popoverOpen = true"
            @mouseleave="popoverOpen = false" :style="`top: ${popoverRect.top}px; left: ${popoverRect.left}px;`"
            class="fixed z-50 w-48 rounded-lg border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900 shadow-xl py-1">

            <!-- Popover Header -->
            <div class="px-3 pb-1.5 border-b border-zinc-100 dark:border-zinc-800 mb-1">
                <span
                    class="text-xs font-semibold text-zinc-500 dark:text-zinc-400 uppercase tracking-wider">{{ $label }}</span>
            </div>

            <!-- Popover Items -->
            <div class="flex flex-col px-2 py-0.5 space-y-0.5" x-data="{ sidebarExpanded: true }">
                {{ $slot }}
            </div>
        </div>
    </template>
</div>
