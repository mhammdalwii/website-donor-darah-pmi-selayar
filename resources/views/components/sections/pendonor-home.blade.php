@props(['pendonors'])

<section id="daftar-pendonor-home" class="max-w-6xl mx-auto px-4 mb-24">
    <div class="text-center mb-10">
        <h2 class="text-3xl font-bold text-gray-900 tracking-tight">Pendonor Siap Sedia</h2>
        <p class="text-gray-500 mt-2">Warga Kabupaten Kepulauan Selayar yang siap membantu sesama.</p>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
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
                        <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                            <td class="p-4 text-gray-800 font-medium">
                                {{ $pendonor->nama_lengkap }}
                                <div class="text-xs text-gray-500 mt-1 md:hidden">
                                    {{ Str::limit($pendonor->alamat, 35) ?? '-' }}
                                </div>
                            </td>
                            <td class="p-4 text-center">
                                <span
                                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-red-100 text-red-600 font-bold shadow-xs">
                                    {{ $pendonor->golongan_darah }}
                                </span>
                            </td>
                            <td class="p-4 text-gray-600 hidden md:table-cell">
                                {{ $pendonor->alamat ?? '-' }}
                            </td>
                            <td class="p-4 text-right">
                                @php
                                    $phone = preg_replace('/[^0-9]/', '', $pendonor->nomor_telepon);
                                    if (substr($phone, 0, 1) === '0') {
                                        $phone = '62' . substr($phone, 1);
                                    }
                                    $pesan = "Assalamualaikum wr wb bapak/ibu {$pendonor->nama_lengkap}, mohon maaf mengganggu waktunya. Izin apakah bapak/ibu bersedia untuk donor darah? Saya dpt wa nya dari informasi resmi PMI Kabupaten Kepulauan Selayar.";
                                @endphp
                                <a href="https://wa.me/{{ $phone }}?text={{ urlencode($pesan) }}" target="_blank"
                                    class="inline-flex items-center gap-2 px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition text-sm font-medium shadow-xs">
                                    Hubungi
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-8 text-center text-gray-500">Belum ada data pendonor terdaftar.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="text-center mt-6">
        <a href="{{ url('/donor/daftar') }}"
            class="inline-flex items-center gap-2 text-sm font-bold text-[#df3038] hover:text-[#be1e26] hover:underline transition">
            Lihat Semua Pendonor Selayar
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>
    </div>
</section>
