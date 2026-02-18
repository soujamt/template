<aside
    class="fixed inset-y-0 left-0 z-30 flex flex-col bg-white dark:bg-zinc-900 border-r border-zinc-200 dark:border-zinc-800 transition-all duration-300 md:static md:inset-auto w-64"
    :class="{
        'translate-x-0': sidebarOpen,
        '-translate-x-full': !sidebarOpen,
        'md:w-64': sidebarExpanded,
        'md:w-20': !sidebarExpanded,
        'md:translate-x-0': true
    }">
    {{ $slot }}
</aside>
