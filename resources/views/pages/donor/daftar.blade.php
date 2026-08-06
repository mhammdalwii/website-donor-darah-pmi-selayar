<x-layouts.app>
    <x-sections.navbar />

    <main class="pt-32 pb-20 min-h-screen bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">

            <x-elements.section-heading title="Daftar Pendonor" />

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mt-8">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-red-50 text-red-700 text-sm md:text-base">
                                <th class="p-4 font-semibold border-b border-red-100">Nama Pendonor</th>
                                <th class="p-4 font-semibold border-b border-red-100 text-center">Golongan Darah</th>
                                <th class="p-4 font-semibold border-b border-red-100 hidden md:table-cell">Alamat</th>
                                <th class="p-4 font-semibold border-b border-red-100 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm md:text-base">
                            @forelse($pendonors as $pendonor)
                                @php
                                    // FUNGSI SENSOR NAMA
                                    $nama_asli = $pendonor->nama_lengkap;
                                    $kata_kata = explode(' ', $nama_asli);
                                    $nama_disensor = [];

                                    foreach ($kata_kata as $kata) {
                                        $panjang = strlen($kata);
                                        if ($panjang <= 2) {
                                            // Jika kata hanya 1 atau 2 huruf (misal: "M", "Al"), biarkan saja
                                            $nama_disensor[] = $kata;
                                        } elseif ($panjang == 3) {
                                            // Jika 3 huruf (misal: "Eka"), sensor huruf tengahnya (E*a)
                                            $nama_disensor[] = substr($kata, 0, 1) . '*' . substr($kata, -1);
                                        } else {
                                            // Jika lebih dari 3 huruf, ambil huruf pertama & terakhir, sisanya bintang
                                            $huruf_awal = substr($kata, 0, 1);
                                            $huruf_akhir = substr($kata, -1);
                                            $bintang = str_repeat('*', $panjang - 2);
                                            $nama_disensor[] = $huruf_awal . $bintang . $huruf_akhir;
                                        }
                                    }
                                    $nama_tampil = implode(' ', $nama_disensor);
                                @endphp

                                <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                                    <td class="p-4 text-gray-800 font-medium">
                                        {{-- Tampilkan nama yang sudah disensor --}}
                                        {{ $nama_tampil }}
                                        <div class="text-xs text-gray-500 mt-1 md:hidden">
                                            {{ Str::limit($pendonor->alamat, 30) ?? '-' }}</div>
                                    </td>

                                    <td class="p-4 text-center">
                                        <span
                                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-red-100 text-red-600 font-bold shadow-sm">
                                            {{ $pendonor->golongan_darah }}
                                        </span>
                                    </td>

                                    <td class="p-4 text-gray-600 hidden md:table-cell">
                                        {{ $pendonor->alamat ?? '-' }}
                                    </td>

                                    <td class="p-4 text-right">
                                        @php
                                            // Format nomor HP
                                            $phone = preg_replace('/[^0-9]/', '', $pendonor->nomor_telepon);
                                            if (substr($phone, 0, 1) === '0') {
                                                $phone = '62' . substr($phone, 1);
                                            }

                                            // Teks pesan WhatsApp (Di sini kita TETAP menggunakan nama aslinya agar sopan saat dihubungi)
                                            $pesan = "Assalamualaikum wr wb bapak/ibu {$pendonor->nama_lengkap}, mohon maaf mengganggu waktunya. Izin apakah bapak/ibu bersedia untuk donor darah? Saya dapat wa nya dari informasi resmi PMI Kabupaten Kepulauan Selayar.";
                                        @endphp

                                        <a href="https://wa.me/{{ $phone }}?text={{ urlencode($pesan) }}"
                                            target="_blank"
                                            class="inline-flex items-center gap-2 px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition text-sm font-medium">
                                            <svg class="w-4 h-4 hidden sm:block" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z" />
                                            </svg>
                                            Hubungi
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="p-8 text-center text-gray-500">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg class="w-12 h-12 text-gray-300 mb-3" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                            </svg>
                                            <p>Belum ada data pendonor yang terdaftar saat ini.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if ($pendonors->hasPages())
                    <div class="p-4 border-t border-gray-100 bg-gray-50">
                        {{ $pendonors->links() }}
                    </div>
                @endif
            </div>

        </div>
    </main>
</x-layouts.app>
