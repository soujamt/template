@props(['label', 'icon', 'active' => false])

@php
    // Auto-open if any child is active, but allow manual toggle
    // We can't easily detect child active state from here without passing it in.
    // For now, reliance on `active` prop is best.
    $isOpen = $active;
@endphp

<div x-data="{ open: @json($isOpen) }" class="relative">
    <!-- Parent Item -->
    <button type="button" @click="open = !open; sidebarExpanded = true"
        class="w-full flex items-center justify-between gap-x-3 rounded-md px-2 py-1 text-sm font-medium leading-6 transition-colors duration-200 text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-white/5 dark:hover:text-white group"
        :class="sidebarExpanded ? '' : 'md:justify-center md:px-2'">
        <div class="flex items-center gap-x-3 min-w-0">
            <i
                class="{{ $icon }} text-lg shrink-0 transition-colors text-zinc-400 group-hover:text-zinc-600 dark:text-zinc-500 dark:group-hover:text-zinc-300"></i>
            <span class="truncate sidebar-label" x-show="sidebarExpanded">{{ $label }}</span>
        </div>

        <!-- Chevron -->
        <i class="ph ph-caret-down text-xs transition-transform duration-200 sidebar-label"
            :class="open ? 'rotate-180 text-zinc-600 dark:text-zinc-300' : 'text-zinc-400'"
            x-show="sidebarExpanded"></i>
    </button>

    <!-- Children (Tree View) -->
    <div x-show="open && sidebarExpanded" x-collapse x-cloak class="relative pl-9 pr-2">
        <!-- Tree Line -->
        <div class="absolute left-[1.1rem] top-0 bottom-0 w-px bg-zinc-200 dark:bg-zinc-800"></div>

        <div class="space-y-1 pt-1 pb-2">
            {{ $slot }}
        </div>
    </div>
</div>
