<x-layouts.app>
    <div class="min-h-screen flex items-center justify-center bg-gray-50 px-4 py-12">
        <div class="max-w-md w-full bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900">Buat Akun PMI</h2>
                <p class="text-gray-500 mt-2 text-sm">Bergabunglah menjadi pahlawan kemanusiaan.</p>
            </div>

            <form action="{{ route('register') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="nama" required
                        class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nomor HP (WhatsApp) <span
                            class="text-red-500">*</span></label>
                    <input type="number" name="no_hp" required
                        class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition">
                    @error('no_hp')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Lengkap <span
                            class="text-red-500">*</span></label>
                    <textarea name="alamat" rows="2" required
                        class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition"></textarea>
                </div>

                <!-- Field Password dengan Ikon Mata -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password <span
                            class="text-red-500">*</span></label>
                    <div x-data="{ show: false }" class="relative">
                        <!-- Tambahkan pr-12 agar teks tidak tertutup ikon -->
                        <input :type="show ? 'text' : 'password'" name="password" required
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition pr-12">

                        <!-- Tombol Ikon Mata -->
                        <button type="button" @click="show = !show"
                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-[#df3038] focus:outline-none transition-colors">
                            <!-- Ikon Mata Tertutup (Eye Slash) -->
                            <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21">
                                </path>
                            </svg>
                            <!-- Ikon Mata Terbuka (Eye) -->
                            <svg x-show="show" style="display: none;" class="w-5 h-5" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>

                <button type="submit"
                    class="w-full bg-[#df3038] hover:bg-[#be1e26] text-white font-semibold py-3 rounded-xl transition shadow-md mt-2">
                    Daftar Sekarang
                </button>
            </form>

            <p class="text-center mt-6 text-sm text-gray-600">
                Sudah punya akun? <a href="{{ route('login') }}" class="text-[#df3038] font-bold hover:underline">Masuk
                    di sini</a>
            </p>
        </div>
    </div>
</x-layouts.app>
