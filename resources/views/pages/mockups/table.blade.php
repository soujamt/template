<?php

use Livewire\Component;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;

    // Dummy data for presentation purposes
    public $search = '';
    public $status = '';
    public $role = '';

    public function mount()
    {
        // No mount logic needed for static mockup
    }

    public function with(): array
    {
        $allUsers = collect([
            ['id' => 1, 'name' => 'Olivia Rhye', 'email' => 'olivia@untitledui.com', 'role' => 'Founder', 'status' => 'Active', 'last_active' => '2023-01-04'],
            ['id' => 2, 'name' => 'Phoenix Baker', 'email' => 'phoenix@untitledui.com', 'role' => 'Engineering', 'status' => 'Active', 'last_active' => '2023-01-04'],
            ['id' => 3, 'name' => 'Lana Steiner', 'email' => 'lana@untitledui.com', 'role' => 'Product', 'status' => 'Inactive', 'last_active' => '2023-01-02'],
            ['id' => 4, 'name' => 'Demi Wilkinson', 'email' => 'demi@untitledui.com', 'role' => 'Engineering', 'status' => 'Active', 'last_active' => '2023-01-03'],
            ['id' => 5, 'name' => 'Candice Wu', 'email' => 'candice@untitledui.com', 'role' => 'Design', 'status' => 'Active', 'last_active' => '2023-01-04'],
            ['id' => 6, 'name' => 'Natali Craig', 'email' => 'natali@untitledui.com', 'role' => 'Product', 'status' => 'Inactive', 'last_active' => '2023-01-02'],
            ['id' => 7, 'name' => 'Drew Cano', 'email' => 'drew@untitledui.com', 'role' => 'Customer Success', 'status' => 'Active', 'last_active' => '2023-01-01'],
            ['id' => 8, 'name' => 'Orlando Diggs', 'email' => 'orlando@untitledui.com', 'role' => 'Sales', 'status' => 'Active', 'last_active' => '2022-12-30'],
            ['id' => 9, 'name' => 'Andi Lane', 'email' => 'andi@untitledui.com', 'role' => 'Product', 'status' => 'Active', 'last_active' => '2023-01-03'],
            ['id' => 10, 'name' => 'Kate Morrison', 'email' => 'kate@untitledui.com', 'role' => 'Engineering', 'status' => 'Active', 'last_active' => '2023-01-04'],
        ]);

        $filteredUsers = $allUsers->filter(function ($user) {
            $matchesSearch = empty($this->search) || stripos($user['name'], $this->search) !== false || stripos($user['email'], $this->search) !== false;
            $matchesStatus = empty($this->status) || $user['status'] === $this->status;
            $matchesRole = empty($this->role) || $user['role'] === $this->role;

            return $matchesSearch && $matchesStatus && $matchesRole;
        });

        // Simulating pagination
        $perPage = 5;
        $page = $this->page ?? 1;
        $paginated = new \Illuminate\Pagination\LengthAwarePaginator($filteredUsers->forPage($page, $perPage), $filteredUsers->count(), $perPage, $page, ['path' => \Illuminate\Pagination\Paginator::resolveCurrentPath()]);

        return [
            'users' => $paginated,
        ];
    }
};
?>

<div class="space-y-6">
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <x-heading title="Team Members" subtitle="Manage your team members and their account permissions here." />
        </div>
        <div class="flex items-center gap-3">
            <x-button variant="secondary" icon="ph ph-cloud-arrow-down">Export</x-button>
            <x-button icon="ph ph-plus">Add User</x-button>
        </div>
    </div>

    {{-- Filters and Search --}}
    <div
        class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 p-4 rounded-xl">
        <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
            <div class="w-full sm:w-64">
                <x-flux::input wire:model.live.debounce.300ms="search" placeholder="Search by name or email...">
                    <x-slot:icon>
                        <i class="ph ph-magnifying-glass text-zinc-400 pb-0.5"></i>
                    </x-slot:icon>
                </x-flux::input>
            </div>

            <div class="w-full sm:w-48">
                <x-flux::select wire:model.live="role" placeholder="All Roles">
                    <x-flux::select.option value="Founder">Founder</x-flux::select.option>
                    <x-flux::select.option value="Engineering">Engineering</x-flux::select.option>
                    <x-flux::select.option value="Product">Product</x-flux::select.option>
                    <x-flux::select.option value="Design">Design</x-flux::select.option>
                    <x-flux::select.option value="Customer Success">Customer Success</x-flux::select.option>
                    <x-flux::select.option value="Sales">Sales</x-flux::select.option>
                </x-flux::select>
            </div>

            <div class="w-full sm:w-48">
                <x-flux::select wire:model.live="status" placeholder="All Statuses">
                    <x-flux::select.option value="Active">Active</x-flux::select.option>
                    <x-flux::select.option value="Inactive">Inactive</x-flux::select.option>
                </x-flux::select>
            </div>
        </div>

        <x-button variant="ghost" wire:click="$set('search', ''); $set('role', ''); $set('status', '')"
            class="text-zinc-500 w-full sm:w-auto mt-2 sm:mt-0">
            Clear Filters
        </x-button>
    </div>

    {{-- Main Table Area --}}
    <x-card :padding="false" class="overflow-hidden">
        <div class="overflow-x-auto">
            <x-table class="min-w-full">
                <x-table.header>
                    <x-table.heading class="w-10 px-4">
                        <x-flux::checkbox />
                    </x-table.heading>
                    <x-table.heading sortable direction="asc" class="pl-0">Member Info</x-table.heading>
                    <x-table.heading sortable>Role</x-table.heading>
                    <x-table.heading sortable>Status</x-table.heading>
                    <x-table.heading sortable>Last Active</x-table.heading>
                    <x-table.heading class="w-20 text-right">Actions</x-table.heading>
                </x-table.header>

                <x-table.body>
                    @forelse ($users as $user)
                        <x-table.row wire:key="user-{{ $user['id'] }}"
                            class="hover:bg-zinc-50/50 dark:hover:bg-zinc-800/50 transition-colors">
                            <x-table.cell class="w-10 px-4">
                                <x-flux::checkbox />
                            </x-table.cell>

                            {{-- Info Cell Component with Avatar --}}
                            <x-table.cell class="pl-0">
                                <div class="flex items-center gap-3">
                                    <x-avatar
                                        src="https://ui-avatars.com/api/?name={{ urlencode($user['name']) }}&background=random"
                                        alt="{{ $user['name'] }}" size="sm" />
                                    <div>
                                        <div class="font-medium text-zinc-900 dark:text-white">{{ $user['name'] }}</div>
                                        <div class="text-zinc-500 dark:text-zinc-400 text-xs">{{ $user['email'] }}</div>
                                    </div>
                                </div>
                            </x-table.cell>

                            <x-table.cell class="text-zinc-600 dark:text-zinc-300">
                                {{ $user['role'] }}
                            </x-table.cell>

                            <x-table.cell>
                                @if ($user['status'] === 'Active')
                                    <x-badge color="green" dot size="sm">Active</x-badge>
                                @else
                                    <x-badge color="zinc" dot size="sm">Inactive</x-badge>
                                @endif
                            </x-table.cell>

                            <x-table.cell class="text-zinc-500 dark:text-zinc-400 text-sm">
                                {{ \Carbon\Carbon::parse($user['last_active'])->diffForHumans() }}
                            </x-table.cell>

                            <x-table.cell class="text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <button
                                        class="text-zinc-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors p-1"
                                        title="Edit">
                                        <i class="ph ph-pencil-simple text-lg"></i>
                                    </button>
                                    <button
                                        class="text-zinc-400 hover:text-red-600 dark:hover:text-red-400 transition-colors p-1"
                                        title="Delete">
                                        <i class="ph ph-trash text-lg"></i>
                                    </button>
                                </div>
                            </x-table.cell>
                        </x-table.row>
                    @empty
                        <x-table.row>
                            <x-table.cell colspan="6" class="text-center py-10">
                                <div class="flex flex-col items-center justify-center text-zinc-500 dark:text-zinc-400">
                                    <i
                                        class="ph ph-magnifying-glass text-3xl mb-2 text-zinc-300 dark:text-zinc-600"></i>
                                    <p class="font-medium text-zinc-900 dark:text-zinc-200">No users found</p>
                                    <p class="text-sm">Try adjusting your search or filters to find what you're looking
                                        for.</p>
                                </div>
                            </x-table.cell>
                        </x-table.row>
                    @endforelse
                </x-table.body>
            </x-table>
        </div>

        {{-- Pagination Placeholder --}}
        <div
            class="px-5 py-3 border-t border-zinc-200 dark:border-zinc-800 bg-zinc-50 dark:bg-zinc-900/50 flex items-center justify-between">
            <span class="text-sm text-zinc-500 dark:text-zinc-400">
                Showing <span class="font-medium text-zinc-900 dark:text-white">1</span> to <span
                    class="font-medium text-zinc-900 dark:text-white">{{ $users->count() }}</span> of <span
                    class="font-medium text-zinc-900 dark:text-white">{{ $users->total() }}</span> results
            </span>
            <div class="flex items-center gap-1">
                <x-button variant="secondary" size="sm" :disabled="$users->onFirstPage()"
                    wire:click="previousPage">Previous</x-button>
                <div class="hidden sm:flex items-center gap-1 mx-2">
                    <button
                        class="w-8 h-8 flex items-center justify-center rounded-md bg-indigo-50 text-indigo-600 font-medium text-sm">1</button>
                    <button
                        class="w-8 h-8 flex items-center justify-center rounded-md hover:bg-zinc-100 dark:hover:bg-zinc-800 text-zinc-600 dark:text-zinc-400 text-sm transition-colors">2</button>
                </div>
                <x-button variant="secondary" size="sm" :disabled="!$users->hasMorePages()" wire:click="nextPage">Next</x-button>
            </div>
        </div>
    </x-card>
</div>
