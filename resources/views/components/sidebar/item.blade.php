@props(['href' => '#', 'icon' => null, 'active' => false, 'badge' => null])

@php
    $isActive = $active || ($href !== '#' && request()->fullUrlIs($href . '*'));

    // Icon Parsing (handling "ph " prefix)
    $iconClass = $icon;
    if ($icon) {
        if ($isActive) {
            $iconClass = str_replace('ph ', 'ph-fill ', $icon);
        } else {
            $iconClass = str_replace('ph-fill ', 'ph ', $icon);
        }
    }

    $classes =
        'group flex items-center gap-x-3 rounded-md px-2 py-1 text-sm font-medium leading-6 transition-all duration-200 ';

    // Style variables for Primary Active State (matching Button component)
    $activeStyle = "
        --btn-bg-start: var(--color-primary-500);
        --btn-bg-end: var(--color-primary-600);
        --btn-border: var(--color-primary-700);
        background: linear-gradient(180deg, var(--btn-bg-start) 0%, var(--btn-bg-end) 100%);
    ";

    // Active: Primary Button Style
    $activeClasses = "
        text-white
        shadow-[0px_2px_4px_0px_rgba(0,0,0,0.10),0px_0px_0px_1px_var(--btn-border),0px_1px_0px_0px_rgba(255,255,255,0.1)_inset]
    ";

    // Inactive: Transparent BG, Zinc text. Hover: Zinc-50.
    $inactiveClasses = "
        text-zinc-500 dark:text-zinc-400 
        hover:bg-zinc-50 dark:hover:bg-white/5 
        hover:text-zinc-900 dark:hover:text-white
        border border-transparent
    ";

    $classes .= $isActive ? $activeClasses : $inactiveClasses;
@endphp

<a href="{{ $href }}" @if ($isActive) style="{{ $activeStyle }}" @endif
    {{ $attributes->merge(['class' => $classes]) }} :class="sidebarExpanded ? '' : 'md:justify-center md:px-2'"
    @mouseenter="tooltip = '{{ $slot }}'; tooltipRect = $el.getBoundingClientRect()" @mouseleave="tooltip = ''" wire:navigate>

    @if ($icon)
        <i
            class="{{ $iconClass }} text-lg shrink-0 transition-colors {{ $isActive ? 'text-white' : 'text-zinc-400 group-hover:text-zinc-600 dark:text-zinc-500 dark:group-hover:text-zinc-300' }}"></i>
    @endif

    <span class="flex-1 truncate sidebar-label">{{ $slot }}</span>

    @if ($badge)
        <!-- Red Pill Badge -->
        <span
            class="ml-auto w-auto min-w-max whitespace-nowrap rounded-full bg-red-500 px-1.5 py-0.5 text-center text-[10px] font-bold leading-none text-white sidebar-label"
            aria-hidden="true">{{ $badge }}</span>
    @endif
</a>
