@props(['title', 'align' => 'left'])

@php
    $alignmentClasses = [
        'left' => 'items-start text-left',
        'center' => 'items-center text-center',
    ];
@endphp

<div class="mb-8 flex flex-col {{ $alignmentClasses[$align] }}">
    <h2 class="text-3xl font-extrabold text-gray-800 tracking-tight">{{ $title }}</h2>
    <div class="h-1.5 w-16 bg-[#df3038] rounded-full mt-3"></div>
</div>
