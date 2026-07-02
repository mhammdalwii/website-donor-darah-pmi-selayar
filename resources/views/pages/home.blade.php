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
        </section>
        <x-sections.info-donor />
        <x-sections.visi-misi />
        <x-sections.galeri />
    </main>

</x-layouts.app>
