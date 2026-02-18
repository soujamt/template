<div
    class="flex h-16 shrink-0 items-center justify-between px-4 sidebar-icon-container border-b border-zinc-200 dark:border-zinc-800">
    <a href="/"
        class="flex items-center gap-2 font-bold text-xl text-zinc-900 dark:text-white overflow-hidden whitespace-nowrap sidebar-label">
        <div
            class="flex items-center justify-center w-8 h-8 rounded-lg bg-zinc-900 dark:bg-white text-white dark:text-zinc-900 shrink-0">
            <i class="ph-fill ph-lightning"></i>
        </div>
        <span>Template</span>
    </a>

    <!-- Mobile Close Button -->
    <button @click="sidebarOpen = false" class="md:hidden text-zinc-500 dark:text-zinc-400">
        <i class="ph ph-x text-2xl"></i>
    </button>

    <!-- Desktop Toggle Button -->
    <button @click="sidebarExpanded = !sidebarExpanded"
        class="hidden md:block text-zinc-400 hover:text-zinc-600 dark:hover:text-zinc-200">
        <i class="ph ph-sidebar-simple text-2xl transition-transform duration-300 rotate-icon"></i>
    </button>
</div>
