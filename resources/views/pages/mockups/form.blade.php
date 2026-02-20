<?php

use Livewire\Component;

new class extends Component {
    // Dummy properties for the form
    public $first_name = '';
    public $last_name = '';
    public $email = '';
    public $role = 'member';
    public $department = '';
    public $timezone = 'UTC';

    public $notifications_email = true;
    public $notifications_push = false;
    public $notifications_sms = true;

    public $bio = '';

    public function save()
    {
        // Dummy save action
        $this->dispatch('notify', 'User profile saved successfully.');
    }
};
?>

<div class="space-y-6 max-w-4xl mx-auto pb-10">
    {{-- Header --}}
    <div>
        <x-heading title="Create User Profile"
            subtitle="Fill in the information below to create a new user account in the system." />
    </div>

    <form wire:submit="save" class="space-y-8">
        {{-- Section 1: Personal Information --}}
        <x-card class="space-y-6">
            <div>
                <h3 class="text-base font-semibold leading-6 text-zinc-900 dark:text-white">Personal Information</h3>
                <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">Basic details about the user.</p>
            </div>

            <hr class="border-zinc-200 dark:border-zinc-800">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- First Name --}}
                <div class="space-y-2">
                    <x-flux::input label="First Name" id="first_name" wire:model="first_name" required
                        placeholder="Jane" badge="*" />
                </div>

                {{-- Last Name --}}
                <div class="space-y-2">
                    <x-flux::input label="Last Name" id="last_name" wire:model="last_name" required placeholder="Doe"
                        badge="*" />
                </div>

                {{-- Email Address --}}
                <div class="space-y-2 md:col-span-2">
                    <x-flux::input type="email" label="Email Address" id="email" wire:model="email" required
                        placeholder="jane.doe@example.com" badge="*">
                        <x-slot:icon>
                            <i class="ph ph-envelope-simple text-zinc-400 pb-0.5"></i>
                        </x-slot:icon>
                    </x-flux::input>
                </div>

                {{-- Bio/Description --}}
                <div class="space-y-2 md:col-span-2">
                    <x-flux::textarea label="Short Biography"
                        description="Brief description for their profile. URLs are hyperlinked." id="bio"
                        wire:model="bio" rows="4" placeholder="Write a few sentences about this user..." />
                </div>
            </div>
        </x-card>

        {{-- Section 2: Account Settings --}}
        <x-card class="space-y-6">
            <div>
                <h3 class="text-base font-semibold leading-6 text-zinc-900 dark:text-white">Account Settings</h3>
                <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">Role, department, and localization preferences.
                </p>
            </div>

            <hr class="border-zinc-200 dark:border-zinc-800">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Role Selection (Radio Cards) --}}
                <div class="space-y-3 md:col-span-2">
                    <x-flux::radio.group wire:model="role" label="Account Role" badge="*" variant="cards"
                        class="flex-col">
                        <x-flux::radio value="admin" label="Administrator"
                            description="Full access to all system features and settings.">
                            <x-slot:icon>
                                <i class="ph-fill ph-shield-check text-indigo-500 text-lg"></i>
                            </x-slot:icon>
                        </x-flux::radio>
                        <x-flux::radio value="editor" label="Editor"
                            description="Can create and modify content, but cannot manage users.">
                            <x-slot:icon>
                                <i class="ph-fill ph-pencil-simple text-amber-500 text-lg"></i>
                            </x-slot:icon>
                        </x-flux::radio>
                        <x-flux::radio value="member" label="Viewer"
                            description="Read-only access to standard application areas.">
                            <x-slot:icon>
                                <i class="ph-fill ph-user text-emerald-500 text-lg"></i>
                            </x-slot:icon>
                        </x-flux::radio>
                    </x-flux::radio.group>
                </div>

                {{-- Department --}}
                <div class="space-y-2">
                    <x-flux::select label="Department" id="department" wire:model="department"
                        placeholder="Select Department...">
                        <x-flux::select.option value="engineering">Engineering</x-flux::select.option>
                        <x-flux::select.option value="design">Design</x-flux::select.option>
                        <x-flux::select.option value="marketing">Marketing</x-flux::select.option>
                        <x-flux::select.option value="sales">Sales</x-flux::select.option>
                        <x-flux::select.option value="hr">Human Resources</x-flux::select.option>
                    </x-flux::select>
                </div>

                {{-- Timezone --}}
                <div class="space-y-2">
                    <x-flux::select label="Timezone" id="timezone" wire:model="timezone">
                        <x-flux::select.option value="UTC">UTC (Coordinated Universal Time)</x-flux::select.option>
                        <x-flux::select.option value="America/New_York">Eastern Time (US &
                            Canada)</x-flux::select.option>
                        <x-flux::select.option value="America/Chicago">Central Time (US &
                            Canada)</x-flux::select.option>
                        <x-flux::select.option value="America/Los_Angeles">Pacific Time (US &
                            Canada)</x-flux::select.option>
                        <x-flux::select.option value="Europe/London">London</x-flux::select.option>
                        <x-flux::select.option value="Europe/Paris">Paris</x-flux::select.option>
                    </x-flux::select>
                </div>
            </div>
        </x-card>

        {{-- Section 3: Notification Preferences --}}
        <x-card class="space-y-6">
            <div>
                <h3 class="text-base font-semibold leading-6 text-zinc-900 dark:text-white">Notifications</h3>
                <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">Manage how this user receives alerts.</p>
            </div>

            <hr class="border-zinc-200 dark:border-zinc-800">

            <div class="space-y-4">
                {{-- Toggle 1 --}}
                <x-flux::switch wire:model="notifications_email" label="Email Notifications"
                    description="Receive daily summaries and activity reports." />

                <hr class="border-zinc-100 dark:border-zinc-800/50">

                {{-- Toggle 2 --}}
                <x-flux::switch wire:model="notifications_push" label="Push Notifications"
                    description="Receive alerts on your desktop or mobile device." />

                <hr class="border-zinc-100 dark:border-zinc-800/50">

                {{-- Toggle 3 --}}
                <x-flux::switch wire:model="notifications_sms" label="SMS Alerts"
                    description="For critical security and billing alerts only." />
            </div>
        </x-card>

        {{-- Form Actions --}}
        <div class="flex items-center justify-end gap-3 pt-4 border-t border-zinc-200 dark:border-zinc-800">
            <x-button variant="secondary" type="button">Cancel</x-button>
            <x-button type="submit" icon="ph ph-check">Create User Profile</x-button>
        </div>
    </form>
</div>
