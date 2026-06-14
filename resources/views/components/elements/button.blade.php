@props(['href' => '#', 'variant' => 'primary'])

@php
    $baseClasses =
        'inline-flex items-center justify-center px-6 py-2.5 rounded-xl font-semibold text-sm transition-all duration-200 cursor-pointer shadow-sm';

    $variants = [
        'primary' => 'bg-[#df3038] text-white hover:bg-[#c12229]',
        'white' => 'bg-white text-[#df3038] hover:bg-gray-50',
        'outline' => 'border border-gray-300 text-gray-700 hover:bg-gray-50',
    ];
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $baseClasses . ' ' . $variants[$variant]]) }}>
    {{ $slot }}
</a>
