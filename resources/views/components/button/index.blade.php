@props([
    'variant' => 'primary',
    'color' => 'primary',
    'size' => 'md',
    'href' => null,
    'type' => 'button',
    'icon' => null,
    'iconPosition' => 'left',
    'loading' => null,
    'disabled' => false,
])

@php
    // Base classes
    $baseClasses =
        'inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-mono uppercase transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 cursor-pointer relative active:scale-[0.98]';

    $sizes = [
        'sm' => 'h-8 px-3 text-xs',
        'md' => 'h-9 px-4 py-2',
        'lg' => 'h-10 px-8',
        'icon' => 'h-9 w-9',
    ];

    $style = '';
    $variantClasses = '';

    // Color Configuration Map
    $colors = [
        'primary' => [
            'start' => 'var(--color-primary-500)',
            'end' => 'var(--color-primary-600)',
            'border' => 'var(--color-primary-700)',
            'ring' => 'var(--color-primary-500)',
        ],
        'zinc' => [
            'start' => 'var(--color-zinc-500)',
            'end' => 'var(--color-zinc-600)',
            'border' => 'var(--color-zinc-700)',
            'ring' => 'var(--color-zinc-500)',
        ],
        'slate' => [
            'start' => 'var(--color-slate-500)',
            'end' => 'var(--color-slate-600)',
            'border' => 'var(--color-slate-700)',
            'ring' => 'var(--color-slate-500)',
        ],
        'gray' => [
            'start' => 'var(--color-gray-500)',
            'end' => 'var(--color-gray-600)',
            'border' => 'var(--color-gray-700)',
            'ring' => 'var(--color-gray-500)',
        ],
        'neutral' => [
            'start' => 'var(--color-neutral-500)',
            'end' => 'var(--color-neutral-600)',
            'border' => 'var(--color-neutral-700)',
            'ring' => 'var(--color-neutral-500)',
        ],
        'red' => [
            'start' => 'var(--color-red-500)',
            'end' => 'var(--color-red-600)',
            'border' => 'var(--color-red-700)',
            'ring' => 'var(--color-red-500)',
        ],
        'orange' => [
            'start' => 'var(--color-orange-500)',
            'end' => 'var(--color-orange-600)',
            'border' => 'var(--color-orange-700)',
            'ring' => 'var(--color-orange-500)',
        ],
        'amber' => [
            'start' => 'var(--color-amber-500)',
            'end' => 'var(--color-amber-600)',
            'border' => 'var(--color-amber-700)',
            'ring' => 'var(--color-amber-500)',
        ],
        'yellow' => [
            'start' => 'var(--color-yellow-500)',
            'end' => 'var(--color-yellow-600)',
            'border' => 'var(--color-yellow-700)',
            'ring' => 'var(--color-yellow-500)',
        ],
        'lime' => [
            'start' => 'var(--color-lime-500)',
            'end' => 'var(--color-lime-600)',
            'border' => 'var(--color-lime-700)',
            'ring' => 'var(--color-lime-500)',
        ],
        'green' => [
            'start' => 'var(--color-green-500)',
            'end' => 'var(--color-green-600)',
            'border' => 'var(--color-green-700)',
            'ring' => 'var(--color-green-500)',
        ],
        'emerald' => [
            'start' => 'var(--color-emerald-500)',
            'end' => 'var(--color-emerald-600)',
            'border' => 'var(--color-emerald-700)',
            'ring' => 'var(--color-emerald-500)',
        ],
        'teal' => [
            'start' => 'var(--color-teal-500)',
            'end' => 'var(--color-teal-600)',
            'border' => 'var(--color-teal-700)',
            'ring' => 'var(--color-teal-500)',
        ],
        'cyan' => [
            'start' => 'var(--color-cyan-500)',
            'end' => 'var(--color-cyan-600)',
            'border' => 'var(--color-cyan-700)',
            'ring' => 'var(--color-cyan-500)',
        ],
        'sky' => [
            'start' => 'var(--color-sky-500)',
            'end' => 'var(--color-sky-600)',
            'border' => 'var(--color-sky-700)',
            'ring' => 'var(--color-sky-500)',
        ],
        'blue' => [
            'start' => 'var(--color-blue-500)',
            'end' => 'var(--color-blue-600)',
            'border' => 'var(--color-blue-700)',
            'ring' => 'var(--color-blue-500)',
        ],
        'indigo' => [
            'start' => 'var(--color-indigo-500)',
            'end' => 'var(--color-indigo-600)',
            'border' => 'var(--color-indigo-700)',
            'ring' => 'var(--color-indigo-500)',
        ],
        'violet' => [
            'start' => 'var(--color-violet-500)',
            'end' => 'var(--color-violet-600)',
            'border' => 'var(--color-violet-700)',
            'ring' => 'var(--color-violet-500)',
        ],
        'purple' => [
            'start' => 'var(--color-purple-500)',
            'end' => 'var(--color-purple-600)',
            'border' => 'var(--color-purple-700)',
            'ring' => 'var(--color-purple-500)',
        ],
        'fuchsia' => [
            'start' => 'var(--color-fuchsia-500)',
            'end' => 'var(--color-fuchsia-600)',
            'border' => 'var(--color-fuchsia-700)',
            'ring' => 'var(--color-fuchsia-500)',
        ],
        'pink' => [
            'start' => 'var(--color-pink-500)',
            'end' => 'var(--color-pink-600)',
            'border' => 'var(--color-pink-700)',
            'ring' => 'var(--color-pink-500)',
        ],
        'rose' => [
            'start' => 'var(--color-rose-500)',
            'end' => 'var(--color-rose-600)',
            'border' => 'var(--color-rose-700)',
            'ring' => 'var(--color-rose-500)',
        ],
    ];

    if ($variant === 'primary') {
        // Resolve configuration or fallback to primary
        $conf = $colors[$color] ?? $colors['primary'];

        // Use inline style for background to ensure gradient works robustly with dynamic colors
        $style = "
            --btn-bg-start: {$conf['start']};
            --btn-bg-end: {$conf['end']};
            --btn-border: {$conf['border']};
            --btn-ring: {$conf['ring']};
            background: linear-gradient(180deg, var(--btn-bg-start) 0%, var(--btn-bg-end) 100%);
        ";

        $variantClasses = "
            text-white
            shadow-[0px_2px_4px_0px_rgba(0,0,0,0.10),0px_0px_0px_1px_var(--btn-border),0px_1px_0px_0px_rgba(255,255,255,0.1)_inset]
            hover:opacity-90
            focus-visible:ring-(--btn-ring)
        ";
    } elseif ($variant === 'secondary') {
        // Restored Rich Secondary (White/Gray) + Dark Mode Support
        $variantClasses = "
            text-zinc-900 dark:text-white
            shadow-[0px_2px_4px_0px_rgba(0,0,0,0.10),0px_0px_0px_1px_rgba(0,0,0,0.16)] dark:shadow-none
            border border-transparent dark:border-white/10
            bg-[linear-gradient(rgba(227,227,227,0.8),rgba(227,227,227,0.8)),linear-gradient(180deg,#FDFDFD_100%,#F1F1F1_0%)]
            dark:bg-none dark:bg-white/10
            bg-origin-padding bg-clip-padding
            hover:bg-zinc-200/80 dark:hover:bg-white/20
            focus-visible:ring-zinc-950 dark:focus-visible:ring-white
        ";
    } elseif ($variant === 'outline') {
        $style =
            '--btn-border: var(--color-zinc-200); --btn-text: var(--color-zinc-700); --btn-hover-bg: var(--color-zinc-50); --btn-hover-text: var(--color-zinc-900); --btn-ring: var(--color-zinc-500);';
        // Dark Mode: Override variables or add classes. Adding classes is easier for standard variants.
        $variantClasses = "
            border border-(--btn-border) dark:border-zinc-700
            text-(--btn-text) dark:text-zinc-300
            bg-transparent 
            hover:bg-(--btn-hover-bg) dark:hover:bg-white/5
            hover:text-(--btn-hover-text) dark:hover:text-white
            shadow-sm 
            focus-visible:ring-(--btn-ring) dark:focus-visible:ring-zinc-400
        ";
    } elseif ($variant === 'ghost') {
        $style =
            '--btn-text: var(--color-zinc-600); --btn-hover-bg: var(--color-zinc-100); --btn-hover-text: var(--color-zinc-900); --btn-ring: var(--color-zinc-500);';
        $variantClasses = "
            text-(--btn-text) dark:text-zinc-400
            bg-transparent 
            hover:bg-(--btn-hover-bg) dark:hover:bg-white/5
            hover:text-(--btn-hover-text) dark:hover:text-white
            focus-visible:ring-(--btn-ring) dark:focus-visible:ring-zinc-400
        ";
    } elseif ($variant === 'link') {
        $style = '--btn-text: var(--color-zinc-900); --btn-ring: var(--color-zinc-500);';
        $variantClasses =
            'text-(--btn-text) dark:text-zinc-300 underline-offset-4 hover:underline focus-visible:ring-(--btn-ring) p-0 h-auto';
    } elseif ($variant === 'danger') {
        $style = "
            --btn-bg-start: var(--color-red-500);
            --btn-bg-end: var(--color-red-600);
            --btn-border: var(--color-red-700);
            --btn-ring: var(--color-red-500);
            background: linear-gradient(180deg, var(--btn-bg-start) 0%, var(--btn-bg-end) 100%);
         ";
        $variantClasses = "
            text-white
            shadow-[0px_2px_4px_0px_rgba(0,0,0,0.10),0px_0px_0px_1px_var(--btn-border),0px_1px_0px_0px_rgba(255,255,255,0.1)_inset]
            hover:opacity-90
            focus-visible:ring-(--btn-ring)
        ";
    }

    // Clean up variant classes extra spaces
    $variantClasses = trim(preg_replace('/\s+/', ' ', $variantClasses));

    $classes = $baseClasses . ' ' . $variantClasses . ' ' . ($sizes[$size] ?? $sizes['md']);

    // Add Flux-like loading styles via arbitrary variants
    // When [data-loading] exists:
    // 1. .btn-content (the wrapper) becomes opacity-0
    // 2. .loading-spinner becomes opacity-100
    // 3. Pointer events disabled, cursor not allowed, and slight opacity for visual feedback
    $classes .=
        ' [&[data-loading]_.btn-content]:opacity-0 [&[data-loading]_.loading-spinner]:opacity-100 data-loading:pointer-events-none data-loading:cursor-not-allowed data-loading:opacity-75';

    // Livewire Attributes & Loading Inference
    $livewireGeneric = '';

    // Auto-infer loading target from wire:click if not strictly provided
    if ($loading === null) {
        if ($attributes->has('wire:click')) {
            $action = $attributes->get('wire:click');
            // Extract method name if it's like "save(1)" -> "save"
        $target = strtok($action, '(');
            $loading = $target;
        }
    }

    if ($loading) {
        $livewireGeneric = "wire:loading.attr=data-loading wire:target={$loading}";
    }
@endphp

@if ($href)
    <a href="{{ $href }}" style="{{ $style }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{-- Spinner: Opacity 0 by default, 100 on load --}}
        <div class="loading-spinner absolute inset-0 flex items-center justify-center opacity-0 transition-opacity">
            <i class="ph ph-spinner-gap animate-spin text-xl leading-none"></i>
        </div>

        {{-- Content: Opacity 100 by default, 0 on load. Flex for alignment. --}}
        <span class="btn-content flex items-center justify-center gap-2 transition-opacity">
            @if ($icon && $iconPosition === 'left')
                <i class="{{ $icon }} text-lg leading-none"></i>
            @endif

            {{ $slot }}

            @if ($icon && $iconPosition === 'right')
                <i class="{{ $icon }} text-lg leading-none"></i>
            @endif
        </span>
    </a>
@else
    <button type="{{ $type }}" style="{{ $style }}"
        {{ $attributes->merge(['class' => $classes, 'disabled' => $disabled]) }} {{ $livewireGeneric }}>

        <div class="loading-spinner absolute inset-0 flex items-center justify-center opacity-0 transition-opacity">
            <i class="ph ph-spinner-gap animate-spin text-xl leading-none"></i>
        </div>

        <span class="btn-content flex items-center justify-center gap-2 transition-opacity">
            @if ($icon && $iconPosition === 'left')
                <i class="{{ $icon }} text-lg leading-none"></i>
            @endif

            {{ $slot }}

            @if ($icon && $iconPosition === 'right')
                <i class="{{ $icon }} text-lg leading-none"></i>
            @endif
        </span>
    </button>
@endif
