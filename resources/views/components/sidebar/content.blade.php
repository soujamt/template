<div class="flex-1 overflow-y-auto py-3 space-y-3 sidebar-content transition-all duration-300"
    :class="sidebarExpanded ? 'px-3' : 'px-0 scrollbar-hide'">
    {{ $slot }}
</div>
