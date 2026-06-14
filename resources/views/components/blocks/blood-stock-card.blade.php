@props(['type', 'stock'])

<div
    class="bg-white rounded-2xl p-6 md:p-8 flex flex-col items-center justify-center text-center shadow-[0_10px_30px_rgba(0,0,0,0.04)] border border-gray-100 hover:-translate-y-1.5 transition-all duration-300 group">
    <h3
        class="text-[#df3038] text-5xl md:text-6xl font-extrabold mb-3 tracking-tight group-hover:scale-110 transition-transform duration-300">
        {{ $type }}
    </h3>

    <span class="text-gray-400 text-xs font-semibold tracking-wider uppercase mb-1">
        Tersedia
    </span>

    <div class="text-gray-800 text-2xl font-bold tracking-tight">
        {{ str_pad($stock, 2, '0', STR_PAD_LEFT) }} <span class="text-sm font-medium text-gray-500">Kolf</span>
    </div>
</div>
