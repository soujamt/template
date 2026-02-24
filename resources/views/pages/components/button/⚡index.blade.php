<?php

use Livewire\Component;

new class extends Component {
    public function submit()
    {
        sleep(1);
    }

    public function submitSleep2s()
    {
        sleep(2);
    }
};
?>

<div class="space-y-5">
    <div class="space-y-2">
        <h1 class="text-3xl font-bold tracking-tight text-zinc-900 dark:text-white">Buttons</h1>
        <p class="text-zinc-500 dark:text-zinc-400">Displays a button or a component that looks like a button.</p>
    </div>

    <div class="grid gap-8">
        <!-- Variants -->
        <div class="space-y-4">
            <h2 class="text-xl font-semibold text-zinc-900 dark:text-white">Variants</h2>
            <div class="flex flex-wrap gap-4">
                <x-ui.button variant="primary">Primary</x-ui.button>
                <x-ui.button variant="secondary">Secondary</x-ui.button>
                <x-ui.button variant="outline">Outline</x-ui.button>
                <x-ui.button variant="ghost">Ghost</x-ui.button>
                <x-ui.button variant="danger">Danger</x-ui.button>
                <x-ui.button variant="link">Link</x-ui.button>
            </div>
        </div>

        <!-- Sizes -->
        <div class="space-y-4">
            <h2 class="text-xl font-semibold text-zinc-900 dark:text-white">Sizes</h2>
            <div class="flex flex-wrap items-center gap-4">
                <x-ui.button size="sm">Small</x-ui.button>
                <x-ui.button size="md">Medium</x-ui.button>
                <x-ui.button size="lg">Large</x-ui.button>
            </div>
        </div>

        <!-- Colors -->
        <div class="space-y-4">
            <h2 class="text-xl font-semibold text-zinc-900 dark:text-white">Colors</h2>
            <div class="flex flex-wrap gap-4">
                <x-ui.button variant="primary" color="primary">Primary</x-ui.button>
                <x-ui.button variant="primary" color="green">Green</x-ui.button>
                <x-ui.button variant="primary" color="blue">Blue</x-ui.button>
                <x-ui.button variant="primary" color="indigo">Indigo</x-ui.button>
                <x-ui.button variant="primary" color="purple">Purple</x-ui.button>
                <x-ui.button variant="primary" color="pink">Pink</x-ui.button>
            </div>
        </div>

        <!-- Icons -->
        <div class="space-y-4">
            <h2 class="text-xl font-semibold text-zinc-900 dark:text-white">Icons (Phosphor)</h2>
            <div class="flex flex-wrap gap-4">
                <x-ui.button icon="ph-fill ph-paper-plane-right">Send</x-ui.button>
                <x-ui.button variant="secondary" icon="ph-fill ph-trash">Delete</x-ui.button>
                <x-ui.button variant="outline" icon="ph-fill ph-download" iconPosition="right">Download</x-ui.button>
                <x-ui.button variant="ghost" size="icon" icon="ph-fill ph-heart"></x-ui.button>
            </div>
        </div>

        <!-- Loading State -->
        <div class="space-y-4">
            <h2 class="text-xl font-semibold text-zinc-900 dark:text-white">Loading State (Simulated)</h2>
            <div class="p-4 border border-zinc-200 dark:border-zinc-800 rounded-lg space-y-4">
                <p class="text-sm text-zinc-500 dark:text-zinc-400">Each button simulates a 1-second delay.</p>

                <form class="flex flex-wrap gap-4 items-center" wire:submit="submit">
                    <!-- Basic Submit with Text -->
                    <x-ui.button type="submit">
                        Save Changes
                    </x-ui.button>

                    <!-- Icon Swap -->
                    <x-ui.button type="submit" variant="secondary" icon="ph-fill ph-floppy-disk">
                        Save with Icon
                    </x-ui.button>

                    <!-- Different Color -->
                    <x-ui.button type="submit" color="green" icon="ph ph-check">
                        Confirm
                    </x-ui.button>

                    <!-- Only Icon -->
                    @island()
                        <x-ui.button wire:click="submitSleep2s" size="icon" icon="ph-fill ph-paper-plane-right" />
                    @endisland
                </form>
            </div>
        </div>

        <!-- As Links -->
        <div class="space-y-4">
            <h2 class="text-xl font-semibold text-zinc-900 dark:text-white">As Links</h2>
            <div class="flex flex-wrap gap-4">
                <x-ui.button href="#" variant="primary">Link Button</x-ui.button>
                <x-ui.button href="#" variant="outline">Outline Link</x-ui.button>
            </div>
        </div>
        <!-- States -->
        <div class="space-y-4">
            <h2 class="text-xl font-semibold text-zinc-900 dark:text-white">States</h2>
            <div class="flex flex-wrap gap-4">
                <x-ui.button disabled>Disabled</x-ui.button>
            </div>
        </div>
    </div>
</div>
