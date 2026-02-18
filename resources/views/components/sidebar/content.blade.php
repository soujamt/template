<div class="flex-1 overflow-y-auto py-4 space-y-4 sidebar-content transition-all duration-300 px-4"
    :class="sidebarExpanded ? '' : 'md:px-2'">
    {{ $slot }}
</div>
