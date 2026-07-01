@props(['title', 'description'])

<div class="flex items-start gap-5 mb-8">
    <div class="shrink-0 flex items-center justify-center w-14 h-14 rounded-2xl bg-[#df3038]/10 text-[#df3038]">
        {{ $slot }}
    </div>

    <div class="pt-1">
        <h4 class="text-xl font-bold text-gray-800 mb-1.5">{{ $title }}</h4>
        <p class="text-gray-500 text-sm leading-relaxed">{{ $description }}</p>
    </div>
</div>
