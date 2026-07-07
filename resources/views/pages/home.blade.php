<x-layouts.app>

    <x-sections.navbar />

    <main class="bg-gray-50">
        <x-sections.hero />

        <section class="max-w-6xl mx-auto px-4 relative z-20 -mt-24 sm:-mt-28 mb-24">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
                <x-blocks.blood-stock-card type="A" :stock="$stokA" />
                <x-blocks.blood-stock-card type="B" :stock="$stokB" />
                <x-blocks.blood-stock-card type="AB" :stock="$stokAB" />
                <x-blocks.blood-stock-card type="O" :stock="$stokO" />
            </div>
            <div class="mt-6 flex items-center justify-center gap-2 text-gray-500 italic">
                <svg class="w-4 h-4 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <p class="text-sm">
                    Stok darah sewaktu-waktu dapat berubah.
                </p>
            </div>
        </section>
        <x-sections.info-donor />
        <x-sections.visi-misi />
        <x-sections.galeri />
    </main>

</x-layouts.app>
