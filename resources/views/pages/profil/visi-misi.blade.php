<x-layouts.app>
    <x-sections.navbar />

    <main class="pt-32 pb-20 min-h-screen bg-gray-50">
        <div class="max-w-4xl mx-auto px-4">

            <!-- Heading -->
            <div class="text-center mb-12">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Visi & Misi</h1>
                <p class="text-gray-600 max-w-2xl mx-auto">Palang Merah Indonesia Kabupaten Kepulauan Selayar</p>
            </div>

            @if (isset($profil) && (!empty($profil->visi) || !empty($profil->misi)))
                <!-- KOTAK VISI (Desain Lama + Data Baru) -->
                <div
                    class="bg-white rounded-2xl shadow-sm border border-[#df3038]/20 p-8 md:p-12 mb-8 text-center relative overflow-hidden">
                    <!-- Icon Background -->
                    <div class="absolute -top-10 -right-10 text-[#df3038]/5 w-40 h-40">
                        <svg fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L2 22h20L12 2z"></path>
                        </svg>
                    </div>

                    <h2 class="text-sm font-bold text-[#df3038] uppercase tracking-widest mb-4">Visi</h2>

                    <!-- Menghilangkan margin bawaan dari tag <p> RichEditor agar desain tetap rata tengah -->
                    <div class="text-xl md:text-2xl text-gray-800 font-medium leading-relaxed relative z-10 [&>p]:mb-0">
                        {!! $profil->visi !!}
                    </div>
                </div>

                <!-- KOTAK MISI (Desain Lama + Data Baru) -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-10">
                    <h2 class="text-sm font-bold text-[#df3038] uppercase tracking-widest mb-6 text-center">Misi</h2>

                    <!-- Styling khusus list agar mirip dengan desain bulat merah lama -->
                    <div
                        class="prose max-w-none text-gray-700 leading-relaxed 
                                prose-li:marker:text-[#df3038] prose-li:marker:font-bold prose-li:marker:text-lg
                                [&>ol>li]:p-3 [&>ul>li]:p-3 [&>ol>li]:hover:bg-gray-50 [&>ul>li]:hover:bg-gray-50 [&>ol>li]:rounded-xl [&>ul>li]:rounded-xl transition-all">
                        {!! $profil->misi !!}
                    </div>
                </div>
            @else
                <!-- Fallback Teks Jika Data Belum Diisi Admin (Dari Syntax Baru) -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-12 text-center text-gray-500 py-16">
                    <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-lg">Data Visi dan Misi sedang dalam proses pembaruan.</p>
                </div>
            @endif

        </div>
    </main>
</x-layouts.app>
