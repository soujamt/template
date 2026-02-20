<?php

use Livewire\Component;

new class extends Component {
    public $tab = 'profile';

    // Profile Tab Dummy State
    public $name = 'Jane Doe';
    public $email = 'jane@example.com';
    public $username = 'janedoe';

    // Notification Tab Dummy State
    public $notify_new_messages = true;
    public $notify_new_events = true;
    public $notify_marketing = false;

    public function mount()
    {
        $this->tab = request()->query('tab', 'profile');
    }

    public function setTab($tab)
    {
        $this->tab = $tab;
    }

    public function saveProfile()
    {
        $this->dispatch('notify', 'Profile updated successfully.');
    }

    public function saveNotifications()
    {
        $this->dispatch('notify', 'Notification preferences saved.');
    }

    public function updatePassword()
    {
        $this->dispatch('notify', 'Password updated successfully.');
    }
};
?>

<div class="space-y-6 max-w-5xl mx-auto pb-10">
    {{-- Header --}}
    <div class="border-b border-zinc-200 dark:border-zinc-800 pb-5">
        <h2 class="text-2xl font-bold tracking-tight text-zinc-900 dark:text-white">Settings</h2>
        <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">Manage your account settings and preferences.</p>
    </div>

    <div class="flex flex-col md:flex-row gap-8">
        {{-- Custom Vertical Navigation --}}
        <aside class="md:w-64 shrink-0">
            <nav class="flex flex-col space-y-1">
                <button wire:click="setTab('profile')"
                    class="flex items-center gap-3 px-3 py-2 text-sm font-medium rounded-lg transition-colors text-left
                           {{ $tab === 'profile' ? 'bg-zinc-100 text-indigo-600 dark:bg-zinc-800 dark:text-indigo-400' : 'text-zinc-700 hover:bg-zinc-50 dark:text-zinc-300 dark:hover:bg-zinc-800/50' }}">
                    <i
                        class="ph ph-user-circle text-lg {{ $tab === 'profile' ? 'text-indigo-600 dark:text-indigo-400' : 'text-zinc-400 dark:text-zinc-500' }}"></i>
                    Profile
                </button>

                <button wire:click="setTab('account')"
                    class="flex items-center gap-3 px-3 py-2 text-sm font-medium rounded-lg transition-colors text-left
                           {{ $tab === 'account' ? 'bg-zinc-100 text-indigo-600 dark:bg-zinc-800 dark:text-indigo-400' : 'text-zinc-700 hover:bg-zinc-50 dark:text-zinc-300 dark:hover:bg-zinc-800/50' }}">
                    <i
                        class="ph ph-gear text-lg {{ $tab === 'account' ? 'text-indigo-600 dark:text-indigo-400' : 'text-zinc-400 dark:text-zinc-500' }}"></i>
                    Account
                </button>

                <button wire:click="setTab('security')"
                    class="flex items-center gap-3 px-3 py-2 text-sm font-medium rounded-lg transition-colors text-left
                           {{ $tab === 'security' ? 'bg-zinc-100 text-indigo-600 dark:bg-zinc-800 dark:text-indigo-400' : 'text-zinc-700 hover:bg-zinc-50 dark:text-zinc-300 dark:hover:bg-zinc-800/50' }}">
                    <i
                        class="ph ph-shield-check text-lg {{ $tab === 'security' ? 'text-indigo-600 dark:text-indigo-400' : 'text-zinc-400 dark:text-zinc-500' }}"></i>
                    Security
                </button>

                <button wire:click="setTab('notifications')"
                    class="flex items-center gap-3 px-3 py-2 text-sm font-medium rounded-lg transition-colors text-left
                           {{ $tab === 'notifications' ? 'bg-zinc-100 text-indigo-600 dark:bg-zinc-800 dark:text-indigo-400' : 'text-zinc-700 hover:bg-zinc-50 dark:text-zinc-300 dark:hover:bg-zinc-800/50' }}">
                    <i
                        class="ph ph-bell text-lg {{ $tab === 'notifications' ? 'text-indigo-600 dark:text-indigo-400' : 'text-zinc-400 dark:text-zinc-500' }}"></i>
                    Notifications
                </button>
            </nav>
        </aside>

        {{-- Main Content Area --}}
        <div class="flex-1">

            {{-- PROFILE TAB --}}
            <div class="{{ $tab === 'profile' ? 'block' : 'hidden' }}">
                <x-card class="space-y-6">
                    <div>
                        <h3 class="text-base font-semibold leading-6 text-zinc-900 dark:text-white">Profile</h3>
                        <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">This information will be displayed
                            publicly so be careful what you share.</p>
                    </div>

                    <hr class="border-zinc-200 dark:border-zinc-800">

                    <form wire:submit="saveProfile" class="space-y-6">
                        <div class="flex items-center gap-6">
                            <x-avatar src="https://ui-avatars.com/api/?name=Jane+Doe&background=random" alt="Jane Doe"
                                size="xl" />
                            <div class="space-y-2">
                                <x-button variant="secondary" size="sm">Change avatar</x-button>
                                <p class="text-xs text-zinc-500 dark:text-zinc-400">JPG, GIF or PNG. 1MB max.</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            <div class="space-y-2 md:col-span-2">
                                <x-flux::input label="Username" id="username" wire:model="username">
                                    <x-slot:icon>
                                        <i class="ph ph-link text-zinc-400 pb-0.5"></i>
                                    </x-slot:icon>
                                </x-flux::input>
                            </div>

                            <div class="space-y-2 md:col-span-2">
                                <x-flux::input label="Full Name" wire:model="name" />
                            </div>
                        </div>

                        <div class="flex justify-end pt-4">
                            <x-button type="submit" icon="ph ph-check">Save Profile</x-button>
                        </div>
                    </form>
                </x-card>
            </div>

            {{-- ACCOUNT TAB --}}
            <div class="{{ $tab === 'account' ? 'block' : 'hidden' }}">
                <x-card class="space-y-6">
                    <div>
                        <h3 class="text-base font-semibold leading-6 text-zinc-900 dark:text-white">Account Info</h3>
                        <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">Manage your private account details.
                        </p>
                    </div>

                    <hr class="border-zinc-200 dark:border-zinc-800">

                    <form wire:submit.prevent class="space-y-6">
                        <div class="space-y-2">
                            <x-flux::input type="email" label="Email Address" wire:model="email" />
                        </div>

                        <div
                            class="p-4 bg-red-50 dark:bg-red-500/10 border border-red-200 dark:border-red-500/20 rounded-lg">
                            <h4 class="text-sm font-semibold text-red-800 dark:text-red-400">Danger Zone</h4>
                            <p class="mt-1 text-sm text-red-600 dark:text-red-300">Once you delete your account, there
                                is no going back. Please be certain.</p>
                            <div class="mt-3">
                                <x-button variant="danger" size="sm">Delete Account</x-button>
                            </div>
                        </div>
                    </form>
                </x-card>
            </div>

            {{-- SECURITY TAB --}}
            <div class="{{ $tab === 'security' ? 'block' : 'hidden' }}">
                <x-card class="space-y-6">
                    <div>
                        <h3 class="text-base font-semibold leading-6 text-zinc-900 dark:text-white">Security</h3>
                        <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">Update your password and secure your
                            account.</p>
                    </div>

                    <hr class="border-zinc-200 dark:border-zinc-800">

                    <form wire:submit="updatePassword" class="space-y-6">
                        <div class="space-y-4">
                            <div class="space-y-2">
                                <x-flux::input type="password" label="Current Password" class="w-full lg:w-2/3" />
                            </div>

                            <div class="space-y-2">
                                <x-flux::input type="password" label="New Password" class="w-full lg:w-2/3" />
                            </div>

                            <div class="space-y-2">
                                <x-flux::input type="password" label="Confirm New Password" class="w-full lg:w-2/3" />
                            </div>
                        </div>

                        <div class="flex justify-end pt-4">
                            <x-button type="submit" icon="ph ph-key">Update Password</x-button>
                        </div>
                    </form>
                </x-card>

                {{-- Sessions --}}
                <x-card class="mt-6 space-y-6">
                    <div>
                        <h3 class="text-base font-semibold leading-6 text-zinc-900 dark:text-white">Active Sessions</h3>
                        <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">These devices are currently logged in
                            to your account.</p>
                    </div>

                    <hr class="border-zinc-200 dark:border-zinc-800">

                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-4">
                                <div
                                    class="shrink-0 w-10 h-10 rounded-full bg-indigo-50 dark:bg-indigo-500/10 flex items-center justify-center">
                                    <i class="ph ph-laptop text-indigo-600 dark:text-indigo-400 text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-zinc-900 dark:text-zinc-100">MacBook Pro 16"
                                        <x-badge color="green" size="sm" class="ml-2">Current
                                            session</x-badge>
                                    </p>
                                    <p class="text-xs text-zinc-500 dark:text-zinc-400">Mac OS • Chrome • USA</p>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-4">
                                <div
                                    class="shrink-0 w-10 h-10 rounded-full bg-zinc-50 dark:bg-zinc-800 flex items-center justify-center">
                                    <i class="ph ph-device-mobile text-zinc-600 dark:text-zinc-400 text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-zinc-900 dark:text-zinc-100">iPhone 13 Pro</p>
                                    <p class="text-xs text-zinc-500 dark:text-zinc-400">iOS • Safari • USA • Last
                                        active 2h ago</p>
                                </div>
                            </div>
                            <x-button variant="ghost" size="sm" class="text-zinc-500">Revoke</x-button>
                        </div>
                    </div>
                </x-card>
            </div>

            {{-- NOTIFICATIONS TAB --}}
            <div class="{{ $tab === 'notifications' ? 'block' : 'hidden' }}">
                <x-card class="space-y-6">
                    <div>
                        <h3 class="text-base font-semibold leading-6 text-zinc-900 dark:text-white">Notification
                            Preferences</h3>
                        <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">Choose what we notify you about.</p>
                    </div>

                    <hr class="border-zinc-200 dark:border-zinc-800">

                    <form wire:submit="saveNotifications" class="space-y-6">
                        <div class="space-y-4">
                            <x-flux::checkbox wire:model="notify_new_messages" label="New Messages"
                                description="Get notified when someone sends you a direct message." />

                            <x-flux::checkbox wire:model="notify_new_events" label="Event Reminders"
                                description="Get reminded 1 hour before scheduled events." />

                            <x-flux::checkbox wire:model="notify_marketing" label="News and Updates"
                                description="Receive occasional emails about new features." />
                        </div>

                        <div class="flex justify-end pt-4">
                            <x-button type="submit" icon="ph ph-check">Save Preferences</x-button>
                        </div>
                    </form>
                </x-card>
            </div>

        </div>
    </div>
</div>
