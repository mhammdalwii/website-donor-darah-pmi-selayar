<x-layouts.app>
    <x-sections.navbar />

    <main class="pt-32 pb-20 min-h-screen bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">

            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Struktur Pengurus</h1>
                <p class="text-gray-600 max-w-2xl mx-auto">Bagan struktur organisasi Palang Merah Indonesia (PMI)
                    Kabupaten Kepulauan Selayar.</p>
            </div>

            <div x-data="{ openImg: false, activeImg: '' }" class="mt-8 relative">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4 flex flex-col items-center justify-center cursor-pointer group relative overflow-hidden"
                        @click="activeImg = '{{ asset('assets/struktur/strukturKepegawaian.jpg') }}'; openImg = true">

                        <img src="{{ asset('assets/struktur/strukturKepegawaian.jpg') }}" alt="Struktur Bagian 1"
                            class="w-full h-auto object-cover rounded-xl transition-transform duration-500 group-hover:scale-105">

                        <div
                            class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center backdrop-blur-sm">
                            <span
                                class="text-white font-medium bg-black/60 px-5 py-2.5 rounded-full text-sm flex items-center gap-2 shadow-lg">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7">
                                    </path>
                                </svg>
                                Perbesar
                            </span>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4 flex flex-col items-center justify-center cursor-pointer group relative overflow-hidden"
                        @click="activeImg = '{{ asset('assets/struktur/strukturKepegawaianStaf.jpg') }}'; openImg = true">

                        <img src="{{ asset('assets/struktur/strukturKepegawaianStaf.jpg') }}" alt="Struktur Bagian 2"
                            class="w-full h-auto object-cover rounded-xl transition-transform duration-500 group-hover:scale-105">

                        <div
                            class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center backdrop-blur-sm">
                            <span
                                class="text-white font-medium bg-black/60 px-5 py-2.5 rounded-full text-sm flex items-center gap-2 shadow-lg">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7">
                                    </path>
                                </svg>
                                Perbesar
                            </span>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4 flex flex-col items-center justify-center cursor-pointer group relative overflow-hidden"
                        @click="activeImg = '{{ asset('assets/struktur/strukturPengurusKsr.jpg') }}'; openImg = true">

                        <img src="{{ asset('assets/struktur/strukturPengurusKsr.jpg') }}" alt="Struktur Bagian 3"
                            class="w-full h-auto object-cover rounded-xl transition-transform duration-500 group-hover:scale-105">

                        <div
                            class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center backdrop-blur-sm">
                            <span
                                class="text-white font-medium bg-black/60 px-5 py-2.5 rounded-full text-sm flex items-center gap-2 shadow-lg">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7">
                                    </path>
                                </svg>
                                Perbesar
                            </span>
                        </div>
                    </div>

                </div>

                <p class="text-gray-500 text-sm text-center mt-8 italic">
                    *Klik salah satu gambar di atas untuk melihat bagan lebih jelas.
                </p>

                <div x-show="openImg" style="display: none;"
                    class="fixed inset-0 z-100 flex items-center justify-center bg-black/95 p-4 md:p-10 backdrop-blur-md"
                    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

                    <button @click="openImg = false"
                        class="absolute top-6 right-6 text-white/70 hover:text-white bg-white/10 p-2 rounded-full hover:bg-white/20 transition focus:outline-none z-110">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>

                    <div class="relative w-full h-full flex items-center justify-center" @click.away="openImg = false">
                        <img :src="activeImg" alt="Struktur Organisasi PMI Selayar Full"
                            class="max-w-full max-h-full object-contain rounded-lg shadow-2xl cursor-zoom-out"
                            x-transition:enter="transition ease-out duration-300 transform"
                            x-transition:enter-start="scale-95 opacity-0"
                            x-transition:enter-end="scale-100 opacity-100">
                    </div>
                </div>
            </div>

        </div>
    </main>

</x-layouts.app>
