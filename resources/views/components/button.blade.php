@props([
    'variant' => 'primary',
    'size' => 'md',
    'href' => null,
    'type' => 'button',
    'icon' => null,
    'iconPosition' => 'left',
    'loading' => null,
    'disabled' => false,
])

@php
    $baseClasses = 'inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 cursor-pointer overflow-hidden relative';

    // Gradients and Styles
    // Primary (Accept):
    // Fill: Linear Gradient #201E25 (0%) -> #323137 (100%)
    // Stroke: Linear Gradient #4B4951 (0%) -> #313036 (100%)
    // Shadow: 0px 2px 4px rgba(0,0,0,0.1), 0px 0px 0px 1px #0D0D0D

    // Secondary (Reject):
    // Fill: #E3E3E3 (80%)
    // Stroke: Linear Gradient #FDFDFD (0%) -> #F1F1F1 (100%)
    // Shadow: 0px 2px 4px rgba(0,0,0,0.1), 0px 0px 0px 1px rgba(0,0,0,0.16)

    $variants = [
        'primary' => '
            text-white
            shadow-[0px_2px_4px_0px_rgba(0,0,0,0.10),0px_0px_0px_1px_#0D0D0D]
            border border-transparent
            [background-image:linear-gradient(180deg,#201E25_0%,#323137_100%),linear-gradient(180deg,#4B4951_0%,#313036_100%)]
            [background-origin:padding-box,border-box]
            [background-clip:padding-box,border-box]
            hover:opacity-90 active:opacity-100 active:scale-[0.98]
        ',
        'secondary' => '
            text-slate-900
            shadow-[0px_2px_4px_0px_rgba(0,0,0,0.10),0px_0px_0px_1px_rgba(0,0,0,0.16)]
            border border-transparent
            [background-image:linear-gradient(rgba(227,227,227,0.8),rgba(227,227,227,0.8)),linear-gradient(180deg,#FDFDFD_100%,#F1F1F1_0%)]
            [background-origin:padding-box,border-box]
            [background-clip:padding-box,border-box]
            hover:bg-slate-200/80 active:scale-[0.98]
        ',
        'outline' => 'border border-slate-200 bg-white shadow-sm hover:bg-slate-100 hover:text-slate-900 dark:border-slate-800 dark:bg-slate-950 dark:hover:bg-slate-800 dark:hover:text-slate-50',
        'ghost' => 'hover:bg-slate-100 hover:text-slate-900 dark:hover:bg-slate-800 dark:hover:text-slate-50',
        'danger' => 'bg-red-500 text-slate-50 shadow-sm hover:bg-red-500/90 dark:bg-red-900 dark:text-slate-50 dark:hover:bg-red-900/90',
        'link' => 'text-slate-900 underline-offset-4 hover:underline dark:text-slate-50',
    ];

    $sizes = [
        'sm' => 'h-8 rounded-md px-3 text-xs',
        'md' => 'h-9 px-4 py-2',
        'lg' => 'h-10 rounded-md px-8',
        'icon' => 'h-9 w-9',
    ];

    // Clean up multiline strings for variants
    foreach ($variants as $key => $value) {
        $variants[$key] = trim(preg_replace('/\s+/', ' ', $value));
    }

    $classes = $baseClasses . ' ' . ($variants[$variant] ?? $variants['primary']) . ' ' . ($sizes[$size] ?? $sizes['md']);

    if ($loading) {
        $attributes = $attributes->merge(['wire:loading.attr' => 'disabled', 'wire:target' => $loading]);
    }
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        @if ($icon && $iconPosition === 'left')
            <i class="{{ $icon }} text-lg leading-none" @if($loading) wire:loading.remove wire:target="{{ $loading }}" @endif></i>
        @endif

        @if ($loading)
            <i class="ph-bold ph-spinner animate-spin text-lg leading-none" wire:loading wire:target="{{ $loading }}"></i>
        @endif

        {{ $slot }}

        @if ($icon && $iconPosition === 'right')
            <i class="{{ $icon }} text-lg leading-none"></i>
        @endif
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes, 'disabled' => $disabled]) }}>
        @if ($icon && $iconPosition === 'left')
            <i class="{{ $icon }} text-lg leading-none" @if($loading) wire:loading.remove wire:target="{{ $loading }}" @endif></i>
        @endif

        @if ($loading)
            <i class="ph-bold ph-spinner animate-spin text-lg leading-none" wire:loading wire:target="{{ $loading }}"></i>
        @endif

        {{ $slot }}

        @if ($icon && $iconPosition === 'right')
            <i class="{{ $icon }} text-lg leading-none"></i>
        @endif
    </button>
@endif
