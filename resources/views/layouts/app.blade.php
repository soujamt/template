<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? config('app.name') }}</title>

    <!-- Phosphor Icons -->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css" />

    <!-- Geist Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Geist+Mono:wght@100..900&family=Geist:wght@100..900&display=swap"
        rel="stylesheet">

    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>

    <style>
        [x-cloak] {
            display: none !important;
        }

        /* Critical CSS for Sidebar FOUC prevention */
        body.preload * {
            transition: none !important;
        }

        @media (min-width: 768px) {
            body.is-collapsed aside {
                width: 5rem !important;
                /* w-20 */
            }

            body.is-collapsed .sidebar-label {
                display: none !important;
            }

            body.is-collapsed .sidebar-content {
                padding-left: 0.5rem !important;
                padding-right: 0.5rem !important;
            }

            body.is-collapsed .sidebar-icon-container {
                justify-content: center !important;
                padding-left: 0 !important;
                padding-right: 0 !important;
            }

            /* Icon rotation fix for collapsed state */
            body.is-collapsed .rotate-icon {
                transform: rotate(180deg);
            }
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body
    class="bg-white dark:bg-zinc-950 text-zinc-900 dark:text-zinc-100 font-sans antialiased h-screen flex overflow-hidden preload"
    x-data="{
        sidebarOpen: false,
        sidebarExpanded: localStorage.getItem('sidebarExpanded') !== 'false',
        tooltip: '',
        tooltipRect: {}
    }" x-init="$watch('sidebarExpanded', value => {
        localStorage.setItem('sidebarExpanded', value);
        value ? document.body.classList.remove('is-collapsed') : document.body.classList.add('is-collapsed');
    });
    setTimeout(() => document.body.classList.remove('preload'), 150);">
    <script>
        // Blocking script to set initial state before render
        if (localStorage.getItem('sidebarExpanded') === 'false') {
            document.body.classList.add('is-collapsed');
        }
    </script>

    <!-- Mobile Sidebar Overlay -->
    <div x-show="sidebarOpen" @click="sidebarOpen = false" x-transition.opacity x-cloak
        class="fixed inset-0 z-20 bg-black/50 backdrop-blur-sm md:hidden"></div>

    <!-- Sidebar (Variable Width) -->
    <x-sidebar>
        <x-sidebar.header />

        <x-sidebar.content>
            <x-sidebar.group label="Overview">
                <x-sidebar.item href="{{ route('inicio') }}" icon="ph ph-house-simple">Home</x-sidebar.item>
                <x-sidebar.item href="{{ route('components.buttons') }}" icon="ph ph-radio-button">Buttons</x-sidebar.item>
                <x-sidebar.item href="#" icon="ph ph-wallet">Balances</x-sidebar.item>
                <x-sidebar.item href="#" icon="ph ph-arrows-left-right"
                    badge="17">Transactions</x-sidebar.item>
                <x-sidebar.item href="#" icon="ph ph-users" badge="8">Customers</x-sidebar.item>
                <x-sidebar.item href="#" icon="ph ph-cube">Catalogue</x-sidebar.item>
            </x-sidebar.group>

            <x-sidebar.group label="Management">
                <!-- Products Tree View -->
                <x-sidebar.dropdown label="Products" icon="ph ph-package" active>
                    <x-sidebar.item href="#" icon="ph ph-credit-card">Payments</x-sidebar.item>
                    <x-sidebar.item href="#" icon="ph ph-receipt" active>Orders</x-sidebar.item>
                    <x-sidebar.item href="#" icon="ph ph-file-text">Billings</x-sidebar.item>
                    <x-sidebar.item href="#" icon="ph ph-chart-bar">Reporting</x-sidebar.item>
                    <x-sidebar.item href="#" icon="ph ph-tag">Discounts</x-sidebar.item>
                    <x-sidebar.item href="#" icon="ph ph-seal-check" badge="2">Licenses</x-sidebar.item>
                </x-sidebar.dropdown>
            </x-sidebar.group>

            <x-sidebar.group label="Settings">
                <x-sidebar.item href="#" icon="ph ph-gear">Settings</x-sidebar.item>
                <x-sidebar.item href="#" icon="ph ph-code">Developers</x-sidebar.item>
            </x-sidebar.group>
        </x-sidebar.content>

        <x-sidebar.footer>
            <div class="flex items-center gap-3 w-full">
                <div class="h-8 w-8 rounded-full bg-zinc-200 dark:bg-zinc-700 shrink-0"></div>
                <div class="flex flex-col text-sm sidebar-label overflow-hidden whitespace-nowrap">
                    <span class="font-medium text-zinc-900 dark:text-white">Jane Doe</span>
                    <span class="text-xs text-zinc-500">jane@example.com</span>
                </div>
                <div class="ml-auto sidebar-label">
                    <x-theme-toggle />
                </div>
            </div>
        </x-sidebar.footer>
    </x-sidebar>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col min-w-0 overflow-hidden transition-all duration-300 ease-in-out">
        <!-- Mobile Header -->
        <div
            class="flex h-16 shrink-0 items-center justify-between gap-x-4 border-b border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900 px-4 shadow-sm md:hidden">
            <div class="flex items-center gap-4">
                <button type="button" class="-m-2.5 p-2.5 text-zinc-700 dark:text-zinc-200"
                    @click="sidebarOpen = true">
                    <span class="sr-only">Open sidebar</span>
                    <i class="ph ph-list text-2xl"></i>
                </button>
                <div class="text-sm font-semibold leading-6 text-zinc-900 dark:text-white">Dashboard</div>
            </div>
        </div>

        <div class="flex-1 overflow-y-auto p-5 bg-white dark:bg-zinc-950">
            {{ $slot }}
        </div>
    </main>

    <!-- Global Tooltip -->
    <div x-show="tooltip && !sidebarExpanded" x-cloak
        class="fixed z-50 px-2 py-1 bg-zinc-900 text-white text-xs rounded pointer-events-none whitespace-nowrap opacity-0 transition-opacity duration-200"
        :class="{ 'opacity-100': tooltip }"
        :style="'top: ' + (tooltipRect.top + tooltipRect.height / 2) + 'px; left: ' + (tooltipRect.right + 10) +
        'px; transform: translateY(-50%);'">
        <span x-text="tooltip"></span>
    </div>

    @livewireScripts
</body>

</html>
