@php
    // Mengambil 8 foto dokumentasi terbaru langsung dari database
    $galeris = \App\Models\Galeri::latest()->take(8)->get();
@endphp

<section id="galeri" class="py-16 md:py-24 bg-white relative z-10">
    <div class="max-w-7xl mx-auto px-4">

        <!-- Judul Section -->
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Galeri Kegiatan</h2>
            <p class="text-gray-500 max-w-2xl mx-auto">Dokumentasi aksi kemanusiaan dan kegiatan donor darah keliling PMI
                Kabupaten Kepulauan Selayar.</p>
        </div>

        <!-- Grid Foto -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 md:gap-6">
            @forelse($galeris as $item)
                <div
                    class="group relative overflow-hidden rounded-xl md:rounded-2xl aspect-square shadow-sm bg-gray-100 cursor-pointer">
                    <!-- Gambar -->
                    <img src="{{ asset('uploads/' . $item->gambar) }}" alt="{{ $item->judul }}"
                        class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">

                    <!-- Overlay Efek Hitam & Teks Judul -->
                    <div
                        class="absolute inset-0 bg-linear-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end">
                        <div class="p-4 w-full">
                            <p class="text-white font-medium text-xs md:text-sm line-clamp-2 drop-shadow-md">
                                {{ $item->judul }}
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <!-- Jika Belum Ada Foto -->
                <div
                    class="col-span-full py-12 text-center text-gray-500 bg-gray-50 rounded-2xl border border-gray-100">
                    Belum ada foto kegiatan yang diunggah.
                </div>
            @endforelse
        </div>

        <!-- Tombol Lihat Semua (Opsional, jika Anda punya rute halaman galeri khusus) -->
        @if ($galeris->count() > 0)
            <div class="mt-12 flex justify-center">
                <a href="{{ route('galeri.index') }}"
                    class="inline-flex items-center gap-2 px-6 py-3 bg-red-50 text-red-600 font-semibold rounded-full hover:bg-red-100 transition duration-300">
                    Lihat Semua Galeri
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>
        @endif

    </div>
</section>
