<x-layouts.app>
    <x-sections.navbar />

    <main class="pt-32 pb-20 min-h-screen bg-white">
        <div class="max-w-4xl mx-auto px-4">

            <!-- Tombol Kembali -->
            <a href="{{ route('berita.index') }}"
                class="inline-flex items-center gap-2 text-[#df3038] hover:underline font-medium mb-8">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Daftar Berita
            </a>

            <!-- Header Berita -->
            <div class="mb-8">
                <span class="text-sm font-semibold text-[#df3038] uppercase tracking-wider">
                    {{ \Carbon\Carbon::parse($berita->tanggal_publikasi)->translatedFormat('l, d F Y') }}
                </span>
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mt-3 mb-6 leading-tight">
                    {{ $berita->judul }}
                </h1>
            </div>

            <!-- Gambar Utama -->
            @if ($berita->gambar)
                <div class="rounded-2xl overflow-hidden mb-10 shadow-sm border border-gray-100">
                    <img src="{{ asset('uploads/' . $berita->gambar) }}" alt="{{ $berita->judul }}"
                        class="w-full h-auto object-cover max-h-125">
                </div>
            @endif

            <!-- Isi Konten Berita -->

            <div
                class="text-gray-700 leading-relaxed text-lg 
                        [&>p]:mb-5 [&>h2]:text-2xl [&>h2]:font-bold [&>h2]:mt-8 [&>h2]:mb-4 [&>h2]:text-gray-900
                        [&>h3]:text-xl [&>h3]:font-bold [&>h3]:mt-6 [&>h3]:mb-3 [&>h3]:text-gray-900
                        [&>ul]:list-disc [&>ul]:ml-6 [&>ul]:mb-5 [&>ol]:list-decimal [&>ol]:ml-6 [&>ol]:mb-5
                        [&>blockquote]:border-l-4 [&>blockquote]:border-red-500 [&>blockquote]:pl-4 [&>blockquote]:italic [&>blockquote]:my-5">
                {!! $berita->konten !!}
            </div>

            <!-- Share Buttons (Opsional / Pemanis) -->
            <div class="mt-12 pt-8 border-t border-gray-100 flex items-center gap-4">
                <span class="text-sm font-semibold text-gray-500">Bagikan:</span>
                <a href="https://api.whatsapp.com/send?text={{ urlencode($berita->judul . ' ' . url()->current()) }}"
                    target="_blank"
                    class="w-10 h-10 rounded-full bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-200 transition">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z" />
                    </svg>
                </a>
            </div>

        </div>
    </main>
</x-layouts.app>
