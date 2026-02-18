<button x-data="{
    theme: localStorage.theme || 'system',
    init() {
        this.applyTheme(this.theme);

        // Watch for system changes if in system mode
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
            if (this.theme === 'system') {
                this.applyTheme('system');
            }
        });
    },
    toggle() {
        this.theme = this.theme === 'dark' ? 'light' : 'dark';
        localStorage.theme = this.theme;
        this.applyTheme(this.theme);
    },
    applyTheme(theme) {
        if (theme === 'dark' || (theme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    }
}" @click="toggle()" type="button"
    class="relative inline-flex h-6 w-11 shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-zinc-600 focus:ring-offset-2 dark:focus:ring-offset-zinc-900"
    :class="theme === 'dark' ? 'bg-zinc-600' : 'bg-zinc-200'" role="switch" aria-checked="false"
    :aria-checked="theme === 'dark'">
    <span class="sr-only">Toggle Dark Mode</span>
    <span
        class="pointer-events-none relative inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"
        :class="theme === 'dark' ? 'translate-x-5' : 'translate-x-0'">
        <span
            class="absolute inset-0 flex h-full w-full items-center justify-center transition-opacity duration-200 ease-in"
            :class="theme === 'dark' ? 'opacity-0 duration-100 ease-out' : 'opacity-100 duration-200 ease-in'"
            aria-hidden="true">
            <i class="ph-fill ph-sun text-zinc-400 text-[10px]"></i>
        </span>
        <span
            class="absolute inset-0 flex h-full w-full items-center justify-center transition-opacity duration-200 ease-out"
            :class="theme === 'dark' ? 'opacity-100 duration-200 ease-in' : 'opacity-0 duration-100 ease-out'"
            aria-hidden="true">
            <i class="ph-fill ph-moon text-zinc-600 text-[10px]"></i>
        </span>
    </span>
</button>
