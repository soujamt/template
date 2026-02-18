@props([
    'avatar' => 'https://avatars.laravel.cloud/taylor@laravel.com',
    'name' => 'John Doe',
    'email' => 'jhon@example.com'
])

@php
    $activeStyle = "
        --btn-bg-start: var(--color-zinc-500);
        --btn-bg-end: var(--color-zinc-600);
        --btn-border: var(--color-zinc-700);
        background: linear-gradient(180deg, var(--btn-bg-start) 0%, var(--btn-bg-end) 100%);
    ";
    $activeStyleLine = str_replace(["\n", '  '], '', $activeStyle);
    $activeClasses =
        'text-white shadow-[0px_2px_4px_0px_rgba(0,0,0,0.10),0px_0px_0px_1px_var(--btn-border),0px_1px_0px_0px_rgba(255,255,255,0.1)_inset]';
@endphp

<div class="flex flex-col shrink-0 border-t border-zinc-200 dark:border-zinc-800 transition-all duration-300"
    x-data="{
        isDark: localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches),
        isSystem: !('theme' in localStorage),
        smoothThemeSwitch(callback) {
            const style = document.createElement('style');
            style.textContent = '*, *::before, *::after { transition: color 150ms ease, background-color 150ms ease, background 150ms ease, border-color 150ms ease, box-shadow 150ms ease, opacity 150ms ease, fill 150ms ease, stroke 150ms ease !important; }';
            document.head.appendChild(style);
            callback();
            setTimeout(() => { style.remove(); }, 200);
        },
        setLight() {
            this.smoothThemeSwitch(() => {
                localStorage.theme = 'light';
                document.documentElement.classList.remove('dark');
            });
            this.isDark = false;
            this.isSystem = false;
        },
        setDark() {
            this.smoothThemeSwitch(() => {
                localStorage.theme = 'dark';
                document.documentElement.classList.add('dark');
            });
            this.isDark = true;
            this.isSystem = false;
        },
        setSystem() {
            this.smoothThemeSwitch(() => {
                localStorage.removeItem('theme');
                this.isSystem = true;
                if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                    document.documentElement.classList.add('dark');
                    this.isDark = true;
                } else {
                    document.documentElement.classList.remove('dark');
                    this.isDark = false;
                }
            });
        },
        cycleTheme() {
            if (this.isDark) { this.setLight(); } else { this.setDark(); }
        }
    }">

    {{-- ==================== EXPANDED STATE ==================== --}}
    <template x-if="sidebarExpanded">
        <div class="flex flex-col gap-2 py-2 px-2">
            {{-- Segmented Theme Toggle --}}
            <div class="w-full grid grid-cols-3 bg-zinc-100 dark:bg-zinc-800 rounded-lg p-1 gap-0.5">
                <button @click="setLight()"
                    class="flex items-center justify-center rounded-md py-1.5 text-sm font-medium transition-all focus:outline-none cursor-pointer"
                    :class="!isDark && !isSystem ? 'relative z-10 {{ $activeClasses }}' :
                        'hover:bg-white/80 dark:hover:bg-zinc-700 text-zinc-500 dark:text-zinc-400'"
                    :style="!isDark && !isSystem ? '{{ $activeStyleLine }}' : ''">
                    <i class="ph-fill ph-sun text-lg"></i>
                </button>
                <button @click="setDark()"
                    class="flex items-center justify-center rounded-md py-1.5 text-sm font-medium transition-all focus:outline-none cursor-pointer"
                    :class="isDark && !isSystem ? 'relative z-10 {{ $activeClasses }}' :
                        'hover:bg-white/80 dark:hover:bg-zinc-700 text-zinc-500 dark:text-zinc-400'"
                    :style="isDark && !isSystem ? '{{ $activeStyleLine }}' : ''">
                    <i class="ph-fill ph-moon text-lg"></i>
                </button>
                <button @click="setSystem()"
                    class="flex items-center justify-center rounded-md py-1.5 text-sm font-medium transition-all focus:outline-none cursor-pointer"
                    :class="isSystem ? 'relative z-10 {{ $activeClasses }}' :
                        'hover:bg-white/80 dark:hover:bg-zinc-700 text-zinc-500 dark:text-zinc-400'"
                    :style="isSystem ? '{{ $activeStyleLine }}' : ''">
                    <i class="ph-fill ph-desktop text-lg"></i>
                </button>
            </div>

            {{-- User Profile --}}
            <div
                class="group hidden md:flex items-center gap-3 rounded-lg p-2 -mx-1 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors cursor-pointer">
                <div
                    class="h-8 w-8 rounded-lg bg-zinc-200 dark:bg-zinc-700 shrink-0 overflow-hidden ring-2 ring-zinc-200 dark:ring-zinc-700">
                    <img src="{{ $avatar }}" alt="Avatar" class="h-full w-full object-cover">
                </div>
                <div class="flex flex-col min-w-0 flex-1">
                    <span class="text-sm font-semibold text-zinc-900 dark:text-white truncate leading-tight">{{ $name }}</span>
                    <span
                        class="text-xs text-zinc-500 dark:text-zinc-400 truncate leading-tight">{{ $email }}</span>
                </div>
                <i class="ph ph-caret-up-down text-zinc-400 group-hover:text-zinc-600 dark:group-hover:text-zinc-300 shrink-0"></i>
            </div>
        </div>
    </template>

    {{-- ==================== COLLAPSED STATE ==================== --}}
    <template x-if="!sidebarExpanded">
        <div class="flex flex-col items-center gap-3 py-3">
            {{-- Theme Cycle Button --}}
            <button @click="cycleTheme()"
                class="flex items-center justify-center rounded-lg w-8 h-8 transition-all focus:outline-none {{ $activeClasses }}"
                style="{{ $activeStyleLine }}">
                <i class="ph-fill text-lg" :class="isDark ? 'ph-moon' : 'ph-sun'"></i>
            </button>

            {{-- Avatar Only --}}
            <div class="h-8 w-8 rounded-lg bg-zinc-200 dark:bg-zinc-700 shrink-0 overflow-hidden">
                <img src="{{ $avatar }}" alt="Avatar" class="h-full w-full object-cover">
            </div>
        </div>
    </template>
</div>
