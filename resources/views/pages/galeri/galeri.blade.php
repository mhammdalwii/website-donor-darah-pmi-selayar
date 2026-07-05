<x-layouts.app>
    <x-sections.navbar />

    <main class="pt-32 pb-24 min-h-screen bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">

            <!-- Heading -->
            <div class="text-center mb-12">
                <span class="text-sm font-bold text-red-600 uppercase tracking-wider">Dokumentasi</span>
                <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mt-2 mb-4">Semua Galeri Kegiatan</h1>
                <p class="text-gray-500 max-w-2xl mx-auto">Jejak langkah dan aksi kemanusiaan relawan PMI Kabupaten
                    Kepulauan Selayar dari waktu ke waktu.</p>
            </div>

            <!-- Grid Foto -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
                @forelse($galeris as $item)
                    <div
                        class="group relative overflow-hidden rounded-2xl aspect-square shadow-sm bg-white cursor-pointer border border-gray-100">
                        <img src="{{ asset('uploads/' . $item->gambar) }}" alt="{{ $item->judul }}"
                            class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">

                        <div
                            class="absolute inset-0 bg-linear-to-t from-black/80 via-black/20 to-transparent opacity-0 md:group-hover:opacity-100 transition duration-300 flex items-end">
                            <div class="p-4 w-full">
                                <p class="text-white font-medium text-sm line-clamp-3 drop-shadow-md">
                                    {{ $item->judul }}
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20 text-center bg-white rounded-3xl border border-gray-100 shadow-sm">
                        <div class="flex flex-col items-center justify-center">
                            <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor"
                                stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5z" />
                            </svg>
                            <h4 class="text-lg font-semibold text-gray-700">Belum Ada Foto</h4>
                            <p class="text-gray-500 mt-1">Dokumentasi kegiatan akan segera ditambahkan.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Paginasi -->
            @if ($galeris->hasPages())
                <div class="mt-12 flex justify-center">
                    {{ $galeris->links() }}
                </div>
            @endif

        </div>
    </main>
</x-layouts.app>
