<x-layouts.app>
    <x-sections.navbar />

    <main class="pt-32 pb-20 min-h-screen bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">

            <x-elements.section-heading title="Jadwal & Lokasi Kegiatan Donor Darah" />

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
                @forelse($jadwals as $jadwal)
                    <div
                        class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col justify-between hover:shadow-md transition">

                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-sm font-semibold text-gray-500 flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" stroke-width="2"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 13L10 17L18 9" />
                                    </svg>
                                    {{ \Carbon\Carbon::parse($jadwal->tanggal)->translatedFormat('d F Y') }}
                                </span>

                                @if ($jadwal->status === 'terjadwal')
                                    <span
                                        class="px-2.5 py-1 text-xs font-semibold bg-blue-50 text-blue-600 rounded-full">Akan
                                        Datang</span>
                                @elseif($jadwal->status === 'selesai')
                                    <span
                                        class="px-2.5 py-1 text-xs font-semibold bg-green-50 text-green-600 rounded-full">Selesai</span>
                                @else
                                    <span
                                        class="px-2.5 py-1 text-xs font-semibold bg-red-50 text-red-600 rounded-full">Dibatalkan</span>
                                @endif
                            </div>

                            <h3 class="text-lg font-bold text-gray-800 line-clamp-2 mb-2">
                                {{ $jadwal->nama_kegiatan }}
                            </h3>

                            <div class="space-y-2 mt-4 text-sm text-gray-600">
                                <div class="flex items-start gap-2.5">
                                    <svg class="w-4 h-4 text-gray-400 mt-0.5" fill="none" stroke="currentColor"
                                        stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>
                                        Jam: {{ date('H:i', strtotime($jadwal->waktu_mulai)) }}
                                        {{ $jadwal->waktu_selesai ? ' - ' . date('H:i', strtotime($jadwal->waktu_selesai)) . ' WITA' : ' - Selesai' }}
                                    </span>
                                </div>

                                <div class="flex items-start gap-2.5">
                                    <svg class="w-4 h-4 text-gray-400 mt-0.5" fill="none" stroke="currentColor"
                                        stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span class="line-clamp-2">Lokasi: {{ $jadwal->lokasi }}</span>
                                </div>
                            </div>
                        </div>

                        @if ($jadwal->penanggung_jawab)
                            <div class="border-t border-gray-50 mt-4 pt-3 text-xs text-gray-500">
                                Pelaksana: <span
                                    class="font-medium text-gray-700">{{ $jadwal->penanggung_jawab }}</span>
                            </div>
                        @endif

                    </div>
                @empty
                    <div
                        class="col-span-1 md:col-span-2 lg:col-span-3 bg-white rounded-2xl shadow-sm border border-gray-100 p-12 text-center text-gray-500">
                        <div class="flex flex-col items-center justify-center">
                            <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor"
                                stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                            </svg>
                            <h4 class="text-base font-semibold text-gray-700 mb-1">Belum Ada Agenda Terdekat</h4>
                            <p class="text-sm">Saat ini belum tersedia jadwal kegiatan donor darah luar gedung. Silakan
                                periksa kembali nanti.</p>
                        </div>
                    </div>
                @endforelse
            </div>

        </div>
    </main>
</x-layouts.app>
