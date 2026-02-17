<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div class="max-w-7xl mx-auto p-8 space-y-8">
    <div class="space-y-2">
        <h1 class="text-3xl font-bold tracking-tight">Buttons</h1>
        <p class="text-slate-500">Displays a button or a component that looks like a button.</p>
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
            <div class="flex flex-wrap gap-4" x-data="{ loading: false }">
                <x-button @click="loading = true; setTimeout(() => loading = false, 2000)" ::loading="loading ? 'save' : false" wire:loading.attr="disabled">
                    <span x-show="!loading">Click to Load</span>
                    <span x-show="loading">Loading...</span>
                </x-button>

                    <!-- Note: wire:loading requires a Livewire component context usually, but we can test the DOM structure here -->
                    <x-button loading="save">
                    Saving...
                    </x-button>
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
