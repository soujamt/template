@props([
    'icon' => 'ph-fill ph-lightning',
    'name' => 'Acme Inc.',
    'color' => 'bg-indigo-600',
])

<div
    class="flex h-14 shrink-0 items-center justify-between px-3 border-b border-zinc-200 dark:border-zinc-800 transition-all duration-300">

    <!-- Expanded State: Logo + App Name + Collapse Toggle -->
    <template x-if="sidebarExpanded">
        <div class="flex items-center justify-between w-full">
            <!-- Logo + App Name -->
            <div class="flex items-center gap-2.5 min-w-0">
                <div
                    class="flex items-center justify-center w-8 h-8 rounded-lg {{ $color }} text-white shrink-0 shadow-sm ring-1 ring-inset ring-black/5 dark:ring-white/10">
                    <i class="{{ $icon }} text-lg"></i>
                </div>
                <span
                    class="text-sm font-semibold text-zinc-900 dark:text-zinc-100 truncate sidebar-label">{{ $name }}</span>
            </div>

            <!-- Collapse / Close Button -->
            <button @click="window.innerWidth >= 768 ? sidebarExpanded = false : sidebarOpen = false"
                class="flex items-center justify-center w-7 h-7 text-zinc-400 hover:text-zinc-600 dark:hover:text-zinc-200 rounded-md hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors focus:outline-none shrink-0"
                title="Collapse Sidebar">
                <i class="ph-fill ph-sidebar-simple text-lg hidden md:block"></i>
                <i class="ph ph-x text-lg md:hidden"></i>
            </button>
        </div>
    </template>

    <!-- Collapsed State: Logo (Hover to Expand) -->
    <template x-if="!sidebarExpanded">
        <div class="group/header relative flex items-center justify-center w-full h-full cursor-pointer"
            @click="sidebarExpanded = true">

            <!-- Logo (default) -->
            <div
                class="absolute inset-0 flex items-center justify-center transition-opacity duration-200 group-hover/header:opacity-0">
                <div
                    class="flex items-center justify-center w-8 h-8 rounded-lg {{ $color }} text-white shadow-sm ring-1 ring-inset ring-black/5 dark:ring-white/10">
                    <i class="{{ $icon }} text-lg"></i>
                </div>
            </div>

            <!-- Expand icon (on hover) -->
            <div
                class="absolute inset-0 flex items-center justify-center opacity-0 transition-opacity duration-200 group-hover/header:opacity-100">
                <div
                    class="flex items-center justify-center w-8 h-8 rounded-lg bg-zinc-100 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-300">
                    <i class="ph-fill ph-sidebar-simple text-xl transform rotate-180"></i>
                </div>
            </div>
        </div>
    </template>
</div>
