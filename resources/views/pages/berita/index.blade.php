<x-layouts.app>
    <x-sections.navbar />

    <main class="pt-32 pb-20 min-h-screen bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <x-elements.section-heading title="Berita & Artikel Terkini" />

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
                @forelse($beritas as $berita)
                    <div
                        class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-xs flex flex-col hover:shadow-md transition">

                        @if ($berita->gambar)
                            <img src="{{ asset('uploads/' . $berita->gambar) }}" alt="{{ $berita->judul }}"
                                class="h-48 w-full object-cover">
                        @else
                            <div class="h-48 bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-400 text-sm">Tidak ada gambar</span>
                            </div>
                        @endif

                        <div class="p-6 flex flex-col grow">
                            <span class="text-xs font-semibold text-[#df3038] uppercase">
                                {{ \Carbon\Carbon::parse($berita->tanggal_publikasi)->translatedFormat('d F Y') }}
                            </span>

                            <h3 class="font-bold text-xl text-gray-800 mt-2 mb-3 line-clamp-2"
                                title="{{ $berita->judul }}">
                                {{ $berita->judul }}
                            </h3>

                            <p class="text-gray-500 text-sm line-clamp-3 mb-4 grow">
                                {{ Str::limit(strip_tags($berita->konten), 120) }}
                            </p>

                            <a href="{{ route('berita.show', $berita->id) }}"
                                class="text-[#df3038] font-semibold text-sm hover:underline mt-auto inline-flex items-center gap-1">
                                Baca selengkapnya
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <div
                        class="col-span-1 md:col-span-2 lg:col-span-3 bg-white rounded-2xl shadow-sm border border-gray-100 p-12 text-center text-gray-500">
                        <div class="flex flex-col items-center justify-center">
                            <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor"
                                stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                            </svg>
                            <h4 class="text-base font-semibold text-gray-700 mb-1">Belum Ada Publikasi</h4>
                            <p class="text-sm">Saat ini belum ada berita atau artikel yang diterbitkan.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            @if ($beritas->hasPages())
                <div class="mt-8 flex justify-center">
                    {{ $beritas->links() }}
                </div>
            @endif

        </div>
    </main>
</x-layouts.app>
