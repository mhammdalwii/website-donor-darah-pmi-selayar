<x-layouts.app>
    <div class="min-h-screen flex items-center justify-center relative px-4 py-20">
        <!-- Background Image & Overlay -->
        <div class="absolute inset-0 z-0">
            <!-- Pastikan path gambar background ini sama dengan yang di halaman register -->
            <img src="{{ asset('assets/images/auth.jpeg') }}" alt="Background PMI" class="w-full h-full object-cover" />
            <div class="absolute inset-0 bg-black/60 mix-blend-multiply"></div>
        </div>

        <div
            class="max-w-md w-full bg-white/95 backdrop-blur-sm p-8 rounded-2xl shadow-2xl border border-gray-100 relative z-10 text-center">

            <img src="{{ asset('assets/images/logoPMI.png') }}" alt="Logo PMI"
                class="w-24 h-24 mx-auto mb-6 object-contain">

            <h2 class="text-2xl font-bold text-gray-900 mb-4">Verifikasi Email Anda</h2>

            <p class="text-gray-600 text-sm leading-relaxed mb-6">
                Terima kasih telah mendaftar menjadi Pahlawan Kemanusiaan! Sebelum memulai, silakan verifikasi alamat
                email Anda dengan mengeklik tautan yang baru saja kami kirimkan.
                <br><br>
                <span class="text-xs text-gray-500 italic">*Cek juga folder Spam atau Junk jika tidak menemukan email di
                    Kotak Masuk.</span>
            </p>

            <!-- Menampilkan pesan sukses jika tombol kirim ulang ditekan -->
            @if (session('message'))
                <div
                    class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg text-sm mb-6 flex items-start gap-2 text-left">
                    <svg class="w-5 h-5 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span>{{ session('message') }}</span>
                </div>
            @endif

            <div class="space-y-3">
                <!-- Tombol Kirim Ulang -->
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit"
                        class="w-full bg-[#df3038] hover:bg-[#be1e26] text-white font-semibold py-3 rounded-xl transition shadow-md">
                        Kirim Ulang Email Verifikasi
                    </button>
                </form>

                <!-- Tombol Logout (Penting jika user salah masukin email saat daftar) -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-3 rounded-xl transition">
                        Keluar Akun
                    </button>
                </form>
            </div>

        </div>
    </div>
</x-layouts.app>
