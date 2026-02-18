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

            {{-- Selling History --}}
            <x-card title="Selling history" :padding="false">
                <x-slot:headerActions>
                    <x-button variant="ghost" size="icon">
                        <i class="ph ph-dots-three text-lg"></i>
                    </x-button>
                </x-slot:headerActions>

                <x-table>
                    <x-table.header>
                        <x-table.heading>Property</x-table.heading>
                        <x-table.heading>Address</x-table.heading>
                        <x-table.heading>Sold date</x-table.heading>
                        <x-table.heading align="right">Sale price</x-table.heading>
                        <x-table.heading>Status</x-table.heading>
                    </x-table.header>
                    <x-table.body>
                        <x-table.row>
                            <x-table.cell class="font-medium text-zinc-900 dark:text-white">Apartment</x-table.cell>
                            <x-table.cell>721 Meadowview Residences</x-table.cell>
                            <x-table.cell>12 Jan 2026</x-table.cell>
                            <x-table.cell align="right">$245,000</x-table.cell>
                            <x-table.cell><x-badge color="green" dot>Completed</x-badge></x-table.cell>
                        </x-table.row>
                        <x-table.row>
                            <x-table.cell class="font-medium text-zinc-900 dark:text-white">Condo</x-table.cell>
                            <x-table.cell>469 Pinehurst Suites</x-table.cell>
                            <x-table.cell>03 Feb 2026</x-table.cell>
                            <x-table.cell align="right">$310,500</x-table.cell>
                            <x-table.cell><x-badge color="green" dot>Completed</x-badge></x-table.cell>
                        </x-table.row>
                        <x-table.row>
                            <x-table.cell class="font-medium text-zinc-900 dark:text-white">House</x-table.cell>
                            <x-table.cell>632 Riverside Flats</x-table.cell>
                            <x-table.cell>18 Feb 2026</x-table.cell>
                            <x-table.cell align="right">$425,000</x-table.cell>
                            <x-table.cell><x-badge color="red" dot>Pending</x-badge></x-table.cell>
                        </x-table.row>
                        <x-table.row>
                            <x-table.cell class="font-medium text-zinc-900 dark:text-white">Loft</x-table.cell>
                            <x-table.cell>578 Willowbrook Lofts</x-table.cell>
                            <x-table.cell>27 Feb 2026</x-table.cell>
                            <x-table.cell align="right">$389,900</x-table.cell>
                            <x-table.cell><x-badge color="green" dot>Completed</x-badge></x-table.cell>
                        </x-table.row>
                        <x-table.row>
                            <x-table.cell class="font-medium text-zinc-900 dark:text-white">Apartment</x-table.cell>
                            <x-table.cell>853 Oakridge Apts</x-table.cell>
                            <x-table.cell>05 Mar 2026</x-table.cell>
                            <x-table.cell align="right">$265,750</x-table.cell>
                            <x-table.cell><x-badge color="red" dot>Pending</x-badge></x-table.cell>
                        </x-table.row>
                        <x-table.row>
                            <x-table.cell class="font-medium text-zinc-900 dark:text-white">House</x-table.cell>
                            <x-table.cell>947 Maple Gardens</x-table.cell>
                            <x-table.cell>11 Mar 2026</x-table.cell>
                            <x-table.cell align="right">$498,000</x-table.cell>
                            <x-table.cell><x-badge color="green" dot>Completed</x-badge></x-table.cell>
                        </x-table.row>
                        <x-table.row>
                            <x-table.cell class="font-medium text-zinc-900 dark:text-white">Townhouse</x-table.cell>
                            <x-table.cell>214 Cedarwood Lane</x-table.cell>
                            <x-table.cell>22 Mar 2026</x-table.cell>
                            <x-table.cell align="right">$372,400</x-table.cell>
                            <x-table.cell><x-badge color="green" dot>Completed</x-badge></x-table.cell>
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
                            <h4 class="text-sm font-medium text-zinc-900 dark:text-white truncate">Riverstone, Brookside
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
