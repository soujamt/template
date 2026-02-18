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

<div class="max-w-7xl mx-auto p-8 space-y-8">
    <div class="space-y-2">
        <h1 class="text-3xl font-bold tracking-tight">Buttons</h1>
        <p class="text-zinc-500">Displays a button or a component that looks like a button.</p>
    </div>

    <div class="grid gap-8">
        <!-- Variants -->
        <div class="space-y-4">
            <h2 class="text-xl font-semibold">Variants</h2>
            <div class="flex flex-wrap gap-4">
                <x-button variant="primary">Primary</x-button>
                <x-button variant="secondary">Secondary</x-button>
                <x-button variant="outline">Outline</x-button>
                <x-button variant="ghost">Ghost</x-button>
                <x-button variant="danger">Danger</x-button>
                <x-button variant="link">Link</x-button>
            </div>
        </div>

        <!-- Sizes -->
        <div class="space-y-4">
            <h2 class="text-xl font-semibold">Sizes</h2>
            <div class="flex flex-wrap items-center gap-4">
                <x-button size="sm">Small</x-button>
                <x-button size="md">Medium</x-button>
                <x-button size="lg">Large</x-button>
            </div>
        </div>

        <!-- Colors -->
        <div class="space-y-4">
            <h2 class="text-xl font-semibold">Colors</h2>
            <div class="flex flex-wrap gap-4">
                <x-button variant="primary" color="primary">Primary</x-button>
                <x-button variant="primary" color="green">Green</x-button>
                <x-button variant="primary" color="blue">Blue</x-button>
                <x-button variant="primary" color="indigo">Indigo</x-button>
                <x-button variant="primary" color="purple">Purple</x-button>
                <x-button variant="primary" color="pink">Pink</x-button>
            </div>
        </div>

        <!-- Icons -->
        <div class="space-y-4">
            <h2 class="text-xl font-semibold">Icons (Phosphor)</h2>
            <div class="flex flex-wrap gap-4">
                <x-button icon="ph-fill ph-paper-plane-right">Send</x-button>
                <x-button variant="secondary" icon="ph-fill ph-trash">Delete</x-button>
                <x-button variant="outline" icon="ph-fill ph-download" iconPosition="right">Download</x-button>
                <x-button variant="ghost" size="icon" icon="ph-fill ph-heart"></x-button>
            </div>
        </div>

        <!-- Loading State -->
        <div class="space-y-4">
            <h2 class="text-xl font-semibold">Loading State (Simulated)</h2>
            <div class="p-4 border border-zinc-200 rounded-lg space-y-4">
                <p class="text-sm text-zinc-500">Each button simulates a 1-second delay.</p>

                <form class="flex flex-wrap gap-4 items-center" wire:submit="submit">
                    <!-- Basic Submit with Text -->
                    <x-button type="submit">
                        Save Changes
                    </x-button>

                    <!-- Icon Swap -->
                    <x-button type="submit" variant="secondary" icon="ph-fill ph-floppy-disk">
                        Save with Icon
                    </x-button>

                    <!-- Different Color -->
                    <x-button type="submit" color="green" icon="ph ph-check">
                        Confirm
                    </x-button>

                    <!-- Only Icon -->
                    <x-button wire:click="submitSleep2s" size="icon" icon="ph-fill ph-paper-plane-right" />
                </form>
            </div>
        </div>

        <!-- As Links -->
        <div class="space-y-4">
            <h2 class="text-xl font-semibold">As Links</h2>
            <div class="flex flex-wrap gap-4">
                <x-button href="#" variant="primary">Link Button</x-button>
                <x-button href="#" variant="outline">Outline Link</x-button>
            </div>
        </div>
        <!-- States -->
        <div class="space-y-4">
            <h2 class="text-xl font-semibold">States</h2>
            <div class="flex flex-wrap gap-4">
                <x-button disabled>Disabled</x-button>
            </div>
        </div>
    </div>
</div>
