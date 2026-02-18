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
                width: 4rem !important;
                /* w-16 */
            }

            body.is-collapsed aside .sidebar-label {
                display: none !important;
            }

            /* Icon rotation fix for collapsed state */
            body.is-collapsed .rotate-icon {
                transform: rotate(180deg);
            }
        }

        /* Hide Scrollbar */
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
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
        <x-sidebar.header icon="ph-fill ph-lightning" name="Acme Inc." color="bg-rose-400" />

        <x-sidebar.content>
            <x-sidebar.group label="Overview">
                <x-sidebar.item href="{{ route('inicio') }}" icon="ph ph-house-simple" :active="request()->routeIs('inicio')">
                    Inicio
                </x-sidebar.item>
                <x-sidebar.item href="#" icon="ph ph-chart-line-up">Analytics</x-sidebar.item>
            </x-sidebar.group>

            <x-sidebar.group label="UI Components">
                <x-sidebar.dropdown label="Elements" icon="ph ph-squares-four" :active="request()->routeIs('components.*')">
                    <x-sidebar.item href="{{ route('components.buttons') }}" :active="request()->routeIs('components.buttons')">Buttons</x-sidebar.item>
                    <x-sidebar.item href="#">Inputs</x-sidebar.item>
                    <x-sidebar.item href="#">Cards</x-sidebar.item>
                    <x-sidebar.item href="#">Badges</x-sidebar.item>
                </x-sidebar.dropdown>
                <x-sidebar.dropdown label="Overlay" icon="ph ph-browsers">
                    <x-sidebar.item href="#">Modals</x-sidebar.item>
                    <x-sidebar.item href="#">Tooltips</x-sidebar.item>
                </x-sidebar.dropdown>
            </x-sidebar.group>

            <x-sidebar.group label="Settings">
                <x-sidebar.item href="#" icon="ph ph-users">Team</x-sidebar.item>
                <x-sidebar.item href="#" icon="ph ph-scroll">Audit Logs</x-sidebar.item>
                <x-sidebar.item href="#" icon="ph ph-credit-card">Billing</x-sidebar.item>
                <x-sidebar.item href="#" icon="ph ph-gear">Settings</x-sidebar.item>
            </x-sidebar.group>
        </x-sidebar.content>

        <x-sidebar.footer avatar="https://avatars.laravel.cloud/taylor@laravel.com" name="John Doe"
            email="jhon@example.com" />
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

    <script>
        // Re-apply theme after Livewire wire:navigate page transitions
        document.addEventListener('livewire:navigated', () => {
            if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia(
                    '(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        });
    </script>
</body>

</html>
