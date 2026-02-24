@props([
    'avatar' => 'https://avatars.laravel.cloud/',
    'name' => '',
    'email' => '',
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
            <flux:radio.group x-data variant="segmented" x-model="$flux.appearance">
                <flux:radio value="light" icon="sun" />
                <flux:radio value="dark" icon="moon" />
                <flux:radio value="system" icon="computer-desktop" />
            </flux:radio.group>

            {{-- User Profile --}}
            <flux:profile
                icon:trailing="chevron-up-down"
                :avatar="$avatar"
                :name="$name"
            />
        </div>
    </template>

    {{-- ==================== COLLAPSED STATE ==================== --}}
    <template x-if="!sidebarExpanded">
        <div class="flex flex-col items-center gap-2 py-3">
            {{-- Theme Cycle Button --}}
            <x-ui.button variant="primary" size="icon" color="zinc" @click="cycleTheme()">
                <i class="ph-fill text-lg" :class="isDark ? 'ph-moon' : 'ph-sun'"></i>
            </x-ui.button>

            {{-- Avatar Only --}}
            <flux:profile :chevron="false" :avatar="$avatar" />
        </div>
    </template>
</div>
