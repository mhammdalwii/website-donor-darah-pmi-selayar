@props(['beritas'])

<section id="berita-terbaru-home" class="max-w-6xl mx-auto px-4 mb-24">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-gray-900 tracking-tight">Berita & Kegiatan</h2>
        <p class="text-gray-500 mt-2">Ikuti dokumentasi aktivitas kemanusiaan terbaru dari PMI Kabupaten Kepulauan
            Selayar.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @forelse($beritas as $berita)
            <div
                class="bg-white rounded-2xl overflow-hidden shadow-xs border border-gray-100 flex flex-col justify-between hover:shadow-md transition duration-300">
                <div>
                    <div class="h-48 w-full bg-gray-200 overflow-hidden relative">
                        @if ($berita->gambar)
                            <img src="{{ asset('uploads/' . $berita->gambar) }}" alt="{{ $berita->judul }}"
                                class="w-full h-full object-cover hover:scale-105 transition duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-400 bg-gray-100">
                                Tidak ada gambar
                            </div>
                        @endif
                    </div>

                    <div class="p-6">
                        <span class="text-xs text-gray-400 block mb-2">
                            {{ \Carbon\Carbon::parse($berita->tanggal_publikasi)->format('d M Y') }}
                        </span>
                        <h3
                            class="font-bold text-lg text-gray-900 line-clamp-2 leading-snug mb-3 hover:text-[#df3038] transition-colors">
                            {{ $berita->judul }}
                        </h3>
                        <p class="text-gray-600 text-sm line-clamp-3 leading-relaxed">
                            {{ strip_tags($berita->konten) }}
                        </p>
                    </div>
                </div>

                <div class="px-6 pb-6 pt-2">
                    <a href="{{ url('/berita/' . $berita->id) }}"
                        class="text-sm font-semibold text-[#df3038] hover:text-[#be1e26] inline-flex items-center gap-1 transition">
                        Baca Selengkapnya
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-3 text-center py-8 text-gray-500">Belum ada berita yang diterbitkan.</div>
        @endforelse
    </div>

    <div class="text-center mt-12">
        <a href="{{ url('/berita') }}"
            class="inline-flex items-center gap-2 px-6 py-3 bg-red-50 text-red-600 font-semibold rounded-full hover:bg-red-100 transition duration-300">
            Lihat Semua Berita PMI
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
            </svg>
        </a>
    </div>
</section>
