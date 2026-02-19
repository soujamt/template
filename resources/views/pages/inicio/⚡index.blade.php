<?php

use Livewire\Component;

new class extends Component {
    //
};
?>

<div class="space-y-6">
    {{-- Page Heading --}}
    <x-heading title="Overview" subtitle="Real-time insights and activity across your properties">
        <x-button variant="secondary" size="sm">
            <i class="ph ph-calendar-blank text-base mr-1.5"></i>
            Sep 07 – Sep 21, 2023
        </x-button>
    </x-heading>

    {{-- Stat Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <x-stat-card label="Total Properties" value="284" change="-5.2%" trend="down" icon="ph-fill ph-buildings"
            color="blue" />
        <x-stat-card label="Total Tenants" value="213" change="+4.4%" trend="up" icon="ph-fill ph-users"
            color="yellow" />
        <x-stat-card label="Total Rental Income" value="$159,746.39" change="-5.2%" trend="down"
            icon="ph-fill ph-currency-dollar" color="green" />
        <x-stat-card label="Total Revenue" value="$200,642.28" change="-2%" trend="down"
            icon="ph-fill ph-chart-line-up" color="rose" />
    </div>

    {{-- Main Content Grid --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">

        {{-- Left Column (2/3) --}}
        <div class="lg:col-span-2 space-y-4">

            {{-- Selling Report --}}
            <x-card title="Selling Report">
                <x-slot:headerActions>
                    <div class="flex items-center gap-1 bg-zinc-100 dark:bg-zinc-800 rounded-md p-0.5">
                        <button
                            class="px-3 py-1 text-xs font-medium text-zinc-500 dark:text-zinc-400 rounded hover:text-zinc-700 dark:hover:text-zinc-200 transition-colors cursor-pointer">
                            Weekly
                        </button>
                        <button
                            class="px-3 py-1 text-xs font-medium text-zinc-900 dark:text-white bg-white dark:bg-zinc-700 rounded shadow-sm cursor-pointer">
                            Monthly
                        </button>
                        <button
                            class="px-3 py-1 text-xs font-medium text-zinc-500 dark:text-zinc-400 rounded hover:text-zinc-700 dark:hover:text-zinc-200 transition-colors cursor-pointer">
                            Yearly
                        </button>
                    </div>
                    <x-button variant="ghost" size="icon">
                        <i class="ph ph-dots-three text-lg"></i>
                    </x-button>
                </x-slot:headerActions>

                {{-- Chart Placeholder (Bar Chart) --}}
                <div class="h-64 flex items-end justify-between gap-2 px-2">
                    @php
                        $salesData = [45, 55, 60, 58, 65, 78, 72, 68, 55, 50, 42, 38];
                        $paymentsData = [30, 35, 40, 45, 42, 50, 48, 45, 38, 35, 30, 28];
                        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                        $maxVal = max(array_merge($salesData, $paymentsData));
                    @endphp
                    @foreach ($months as $i => $month)
                        <div class="flex-1 flex flex-col items-center gap-1">
                            <div class="w-full flex gap-0.5 items-end" style="height: 200px;">
                                <div class="flex-1 bg-indigo-400/80 dark:bg-indigo-500/60 rounded-t-sm transition-all"
                                    style="height: {{ ($salesData[$i] / $maxVal) * 100 }}%"></div>
                                <div class="flex-1 bg-amber-400/80 dark:bg-amber-500/60 rounded-t-sm transition-all"
                                    style="height: {{ ($paymentsData[$i] / $maxVal) * 100 }}%"></div>
                            </div>
                            <span class="text-[10px] text-zinc-400 dark:text-zinc-500">{{ $month }}</span>
                        </div>
                    @endforeach
                </div>

                {{-- Legend --}}
                <div class="flex items-center gap-4 mt-4 pt-3 border-t border-zinc-100 dark:border-zinc-800">
                    <div class="flex items-center gap-1.5">
                        <span class="h-2 w-2 rounded-full bg-indigo-400 dark:bg-indigo-500"></span>
                        <span class="text-xs text-zinc-500 dark:text-zinc-400">Sales recorded</span>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <span class="h-2 w-2 rounded-full bg-amber-400 dark:bg-amber-500"></span>
                        <span class="text-xs text-zinc-500 dark:text-zinc-400">Payments completed</span>
                    </div>
                </div>
            </x-card>

            {{-- SLA Monitoring --}}
            <x-card :padding="false">
                <x-slot:title>
                    <div class="flex items-center gap-2">
                        <div class="flex items-center justify-center w-6 h-6 rounded-full bg-zinc-100 dark:bg-zinc-800">
                            <i class="ph ph-target text-sm text-zinc-500 dark:text-zinc-400"></i>
                        </div>
                        <span class="text-sm font-semibold text-zinc-900 dark:text-white">SLA Monitoring</span>
                    </div>
                </x-slot:title>
                <x-slot:headerActions>
                    <div class="flex items-center gap-2">
                        <div class="relative hidden sm:flex items-center">
                            <i
                                class="ph ph-magnifying-glass absolute left-3 text-zinc-400 pointer-events-none text-sm"></i>
                            <input type="text" placeholder="Ticket"
                                class="pl-8 pr-3 py-1.5 text-sm bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 rounded-lg text-zinc-700 dark:text-zinc-300 placeholder-zinc-400 focus:outline-none focus:ring-1 focus:ring-zinc-300 dark:focus:ring-zinc-600 w-52 transition">
                        </div>
                        <button
                            class="inline-flex items-center gap-1.5 px-3 py-1.5 text-sm font-medium text-zinc-600 dark:text-zinc-300 bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 rounded-lg hover:bg-zinc-50 dark:hover:bg-zinc-700/60 transition-colors">
                            <i class="ph ph-funnel text-zinc-500"></i>
                            <span>Filter</span>
                        </button>
                        <button
                            class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-zinc-500 dark:text-zinc-400 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                            <i class="ph ph-dots-three-vertical text-base"></i>
                        </button>
                    </div>
                </x-slot:headerActions>

                <x-table>
                    <x-table.header>
                        {{-- Checkbox column --}}
                        <x-table.heading class="w-10 px-4">
                            <input type="checkbox"
                                class="h-4 w-4 rounded border-zinc-300 dark:border-zinc-600 text-indigo-600 focus:ring-indigo-500 focus:ring-offset-0 bg-white dark:bg-zinc-800 transition cursor-pointer">
                        </x-table.heading>
                        <x-table.heading sortable class="pl-0">Ticket ID</x-table.heading>
                        <x-table.heading sortable>Subject</x-table.heading>
                        <x-table.heading sortable>Priority</x-table.heading>
                        <x-table.heading sortable>Assigned To</x-table.heading>
                        <x-table.heading sortable>Status</x-table.heading>
                        <x-table.heading sortable>Created Date</x-table.heading>
                        <x-table.heading sortable>SLA Due</x-table.heading>
                        <x-table.heading class="w-10"></x-table.heading>
                    </x-table.header>

                    <x-table.body>

                        {{-- ===== ROW 1: #2319 · High · In Review · 2h left ===== --}}
                        <x-table.row>
                            <x-table.cell class="w-10 px-4">
                                <input type="checkbox" checked
                                    class="h-4 w-4 rounded border-zinc-300 dark:border-zinc-600 text-indigo-600 focus:ring-indigo-500 focus:ring-offset-0 bg-white dark:bg-zinc-800 transition cursor-pointer">
                            </x-table.cell>
                            <x-table.cell class="pl-0 font-medium text-zinc-800 dark:text-white">#2319</x-table.cell>
                            <x-table.cell class="text-zinc-700 dark:text-zinc-200">Payment failed on
                                invoice</x-table.cell>
                            {{-- Priority: High (red) --}}
                            <x-table.cell>
                                <span
                                    class="inline-flex items-center gap-1.5 text-sm font-medium text-red-600 dark:text-red-400">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                        class="shrink-0">
                                        <rect x="0" y="7" width="3" height="7" rx="0.5"
                                            fill="currentColor" opacity="0.4" />
                                        <rect x="4" y="4" width="3" height="10" rx="0.5"
                                            fill="currentColor" opacity="0.7" />
                                        <rect x="8" y="1" width="3" height="13" rx="0.5"
                                            fill="currentColor" />
                                    </svg>
                                    High
                                </span>
                            </x-table.cell>
                            {{-- Assigned To --}}
                            <x-table.cell>
                                <div class="flex items-center gap-2">
                                    <x-avatar src="https://i.pravatar.cc/150?u=john" alt="John Doe" size="xs" />
                                    <span class="text-zinc-700 dark:text-zinc-200">John Doe</span>
                                </div>
                            </x-table.cell>
                            {{-- Status: In Review (blue) --}}
                            <x-table.cell>
                                <span
                                    class="inline-flex items-center gap-1.5 text-sm text-blue-600 dark:text-blue-400">
                                    <i class="ph ph-file-text text-sm shrink-0"></i>
                                    In Review
                                </span>
                            </x-table.cell>
                            <x-table.cell>2025-08-18</x-table.cell>
                            {{-- SLA Due: urgent = red --}}
                            <x-table.cell class="font-medium text-red-600 dark:text-red-400">2h left</x-table.cell>
                            <x-table.cell class="w-10 px-2">
                                <button
                                    class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-zinc-400 hover:text-zinc-600 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                                    <i class="ph ph-dots-three-vertical text-base"></i>
                                </button>
                            </x-table.cell>
                        </x-table.row>

                        {{-- ===== ROW 2: #2320 · Medium · Delivered · 1h left ===== --}}
                        <x-table.row>
                            <x-table.cell class="w-10 px-4">
                                <input type="checkbox"
                                    class="h-4 w-4 rounded border-zinc-300 dark:border-zinc-600 text-indigo-600 focus:ring-indigo-500 focus:ring-offset-0 bg-white dark:bg-zinc-800 transition cursor-pointer">
                            </x-table.cell>
                            <x-table.cell class="pl-0 font-medium text-zinc-800 dark:text-white">#2320</x-table.cell>
                            <x-table.cell class="text-zinc-700 dark:text-zinc-200">Login issue</x-table.cell>
                            {{-- Priority: Medium (amber) --}}
                            <x-table.cell>
                                <span
                                    class="inline-flex items-center gap-1.5 text-sm font-medium text-amber-600 dark:text-amber-400">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                        class="shrink-0">
                                        <rect x="0" y="7" width="3" height="7" rx="0.5"
                                            fill="currentColor" opacity="0.4" />
                                        <rect x="4" y="4" width="3" height="10" rx="0.5"
                                            fill="currentColor" opacity="0.7" />
                                        <rect x="8" y="1" width="3" height="13" rx="0.5"
                                            fill="currentColor" opacity="0.3" />
                                    </svg>
                                    Medium
                                </span>
                            </x-table.cell>
                            {{-- Assigned To --}}
                            <x-table.cell>
                                <div class="flex items-center gap-2">
                                    <x-avatar src="https://i.pravatar.cc/150?u=sarah" alt="Sarah Lee"
                                        size="xs" />
                                    <span class="text-zinc-700 dark:text-zinc-200">Sarah Lee</span>
                                </div>
                            </x-table.cell>
                            {{-- Status: Delivered (green) --}}
                            <x-table.cell>
                                <span
                                    class="inline-flex items-center gap-1.5 text-sm text-emerald-600 dark:text-emerald-400">
                                    <i class="ph ph-check text-sm shrink-0"></i>
                                    Delivered
                                </span>
                            </x-table.cell>
                            <x-table.cell>2025-08-19</x-table.cell>
                            {{-- SLA Due: urgent = red --}}
                            <x-table.cell class="font-medium text-red-600 dark:text-red-400">1h left</x-table.cell>
                            <x-table.cell class="w-10 px-2">
                                <button
                                    class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-zinc-400 hover:text-zinc-600 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                                    <i class="ph ph-dots-three-vertical text-base"></i>
                                </button>
                            </x-table.cell>
                        </x-table.row>

                        {{-- ===== ROW 3: #2321 · Low · In Progress · 1d left ===== --}}
                        <x-table.row>
                            <x-table.cell class="w-10 px-4">
                                <input type="checkbox"
                                    class="h-4 w-4 rounded border-zinc-300 dark:border-zinc-600 text-indigo-600 focus:ring-indigo-500 focus:ring-offset-0 bg-white dark:bg-zinc-800 transition cursor-pointer">
                            </x-table.cell>
                            <x-table.cell class="pl-0 font-medium text-zinc-800 dark:text-white">#2321</x-table.cell>
                            <x-table.cell class="text-zinc-700 dark:text-zinc-200">Feature request
                                export</x-table.cell>
                            {{-- Priority: Low (yellow) --}}
                            <x-table.cell>
                                <span
                                    class="inline-flex items-center gap-1.5 text-sm font-medium text-yellow-600 dark:text-yellow-400">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                        class="shrink-0">
                                        <rect x="0" y="7" width="3" height="7" rx="0.5"
                                            fill="currentColor" opacity="0.4" />
                                        <rect x="4" y="4" width="3" height="10" rx="0.5"
                                            fill="currentColor" opacity="0.2" />
                                        <rect x="8" y="1" width="3" height="13" rx="0.5"
                                            fill="currentColor" opacity="0.2" />
                                    </svg>
                                    Low
                                </span>
                            </x-table.cell>
                            {{-- Assigned To --}}
                            <x-table.cell>
                                <div class="flex items-center gap-2">
                                    <x-avatar src="https://i.pravatar.cc/150?u=john" alt="John Doe" size="xs" />
                                    <span class="text-zinc-700 dark:text-zinc-200">John Doe</span>
                                </div>
                            </x-table.cell>
                            {{-- Status: In Progress (orange) --}}
                            <x-table.cell>
                                <span
                                    class="inline-flex items-center gap-1.5 text-sm text-orange-600 dark:text-orange-400">
                                    <i class="ph ph-clock text-sm shrink-0"></i>
                                    In Progress
                                </span>
                            </x-table.cell>
                            <x-table.cell>2025-08-19</x-table.cell>
                            <x-table.cell class="text-zinc-500 dark:text-zinc-400">1d left</x-table.cell>
                            <x-table.cell class="w-10 px-2">
                                <button
                                    class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-zinc-400 hover:text-zinc-600 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                                    <i class="ph ph-dots-three-vertical text-base"></i>
                                </button>
                            </x-table.cell>
                        </x-table.row>

                        {{-- ===== ROW 4: #2322 · Medium · In Progress · 9h left ===== --}}
                        <x-table.row>
                            <x-table.cell class="w-10 px-4">
                                <input type="checkbox"
                                    class="h-4 w-4 rounded border-zinc-300 dark:border-zinc-600 text-indigo-600 focus:ring-indigo-500 focus:ring-offset-0 bg-white dark:bg-zinc-800 transition cursor-pointer">
                            </x-table.cell>
                            <x-table.cell class="pl-0 font-medium text-zinc-800 dark:text-white">#2322</x-table.cell>
                            <x-table.cell class="text-zinc-700 dark:text-zinc-200">Contract renewal
                                issue</x-table.cell>
                            {{-- Priority: Medium (amber) --}}
                            <x-table.cell>
                                <span
                                    class="inline-flex items-center gap-1.5 text-sm font-medium text-amber-600 dark:text-amber-400">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                        class="shrink-0">
                                        <rect x="0" y="7" width="3" height="7" rx="0.5"
                                            fill="currentColor" opacity="0.4" />
                                        <rect x="4" y="4" width="3" height="10" rx="0.5"
                                            fill="currentColor" opacity="0.7" />
                                        <rect x="8" y="1" width="3" height="13" rx="0.5"
                                            fill="currentColor" opacity="0.3" />
                                    </svg>
                                    Medium
                                </span>
                            </x-table.cell>
                            {{-- Assigned To --}}
                            <x-table.cell>
                                <div class="flex items-center gap-2">
                                    <x-avatar src="https://i.pravatar.cc/150?u=michael" alt="Michael Wong"
                                        size="xs" />
                                    <span class="text-zinc-700 dark:text-zinc-200">Michael Wong</span>
                                </div>
                            </x-table.cell>
                            {{-- Status: In Progress (orange) --}}
                            <x-table.cell>
                                <span
                                    class="inline-flex items-center gap-1.5 text-sm text-orange-600 dark:text-orange-400">
                                    <i class="ph ph-clock text-sm shrink-0"></i>
                                    In Progress
                                </span>
                            </x-table.cell>
                            <x-table.cell>2025-08-20</x-table.cell>
                            <x-table.cell class="text-zinc-500 dark:text-zinc-400">9h left</x-table.cell>
                            <x-table.cell class="w-10 px-2">
                                <button
                                    class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-zinc-400 hover:text-zinc-600 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors">
                                    <i class="ph ph-dots-three-vertical text-base"></i>
                                </button>
                            </x-table.cell>
                        </x-table.row>

                    </x-table.body>
                </x-table>
            </x-card>
        </div>

        {{-- Right Column (1/3) - Properties --}}
        <div class="space-y-4">
            <x-card title="Properties">
                <x-slot:headerActions>
                    <x-button variant="ghost" size="icon">
                        <i class="ph ph-caret-down text-sm"></i>
                    </x-button>
                </x-slot:headerActions>

                <div class="space-y-5">
                    {{-- Property Card 1 --}}
                    <div>
                        <div
                            class="rounded-lg overflow-hidden aspect-[16/10] bg-zinc-100 dark:bg-zinc-800 relative group">
                            <img src="https://images.unsplash.com/photo-1570129477492-45c003edd2be?w=400&h=250&fit=crop"
                                alt="Property"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            <button
                                class="absolute top-2 right-2 flex items-center justify-center w-7 h-7 rounded-md bg-white/80 dark:bg-zinc-900/80 backdrop-blur-sm text-zinc-500 dark:text-zinc-400 hover:text-red-500 transition-colors cursor-pointer">
                                <i class="ph ph-heart text-sm"></i>
                            </button>
                        </div>
                        <div class="flex items-center justify-between mt-3">
                            <h4 class="text-sm font-medium text-zinc-900 dark:text-white truncate">Riverstone,
                                Brookside
                                District</h4>
                            <x-badge color="green" dot size="sm">Active</x-badge>
                        </div>
                        <div class="mt-2">
                            <div class="flex justify-between text-xs text-zinc-500 dark:text-zinc-400 mb-1">
                                <span>Less remaining</span>
                                <span>24/32</span>
                            </div>
                            <div class="w-full h-1.5 bg-zinc-100 dark:bg-zinc-800 rounded-full overflow-hidden">
                                <div class="h-full bg-indigo-500 rounded-full" style="width: 75%"></div>
                            </div>
                        </div>
                    </div>

                    {{-- Property Card 2 --}}
                    <div>
                        <div
                            class="rounded-lg overflow-hidden aspect-[16/10] bg-zinc-100 dark:bg-zinc-800 relative group">
                            <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=400&h=250&fit=crop"
                                alt="Property"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            <button
                                class="absolute top-2 right-2 flex items-center justify-center w-7 h-7 rounded-md bg-white/80 dark:bg-zinc-900/80 backdrop-blur-sm text-zinc-500 dark:text-zinc-400 hover:text-red-500 transition-colors cursor-pointer">
                                <i class="ph ph-heart text-sm"></i>
                            </button>
                        </div>
                        <div class="flex items-center justify-between mt-3">
                            <h4 class="text-sm font-medium text-zinc-900 dark:text-white truncate">Willow Heights
                                Exclusive</h4>
                            <x-badge color="green" dot size="sm">Active</x-badge>
                        </div>
                        <div class="mt-2">
                            <div class="flex justify-between text-xs text-zinc-500 dark:text-zinc-400 mb-1">
                                <span>Less remaining</span>
                                <span>24/32</span>
                            </div>
                            <div class="w-full h-1.5 bg-zinc-100 dark:bg-zinc-800 rounded-full overflow-hidden">
                                <div class="h-full bg-indigo-500 rounded-full" style="width: 75%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </x-card>
        </div>
    </div>
</div>
