<x-layouts.app>
    <div class="min-h-screen flex items-center justify-center relative px-4 py-20">
        <!-- Background Image & Overlay -->
        <div class="absolute inset-0 z-0">
            <img src="assets/images/auth.jpeg" alt="Background PMI" class="w-full h-full object-cover" />
            <div class="absolute inset-0 bg-black/60 mix-blend-multiply"></div>
        </div>

        <div
            class="max-w-md w-full bg-white/95 backdrop-blur-sm p-8 rounded-2xl shadow-2xl border border-gray-100 relative z-10 my-8">
            <div class="text-center mb-8">
                <img src="{{ asset('assets/images/logoPMI.png') }}" alt="Logo PMI"
                    class="w-30 h-16 mx-auto mb-4 object-contain">
                <h2 class="text-3xl font-bold text-gray-900">Buat Akun PMI</h2>
                <p class="text-gray-500 mt-2 text-sm">Bergabunglah menjadi pahlawan kemanusiaan.</p>
            </div>

            <form action="{{ route('register') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="nama" required
                        class="w-full px-4 py-2.5 rounded-lg border border-gray-300 bg-white/80 focus:bg-white focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition">
                </div>

                <!-- FIELD EMAIL BARU -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Email <span
                            class="text-red-500">*</span></label>
                    <input type="email" name="email" required
                        class="w-full px-4 py-2.5 rounded-lg border border-gray-300 bg-white/80 focus:bg-white focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition">
                    @error('email')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nomor HP (WhatsApp) <span
                            class="text-red-500">*</span></label>
                    <input type="number" name="no_hp" required
                        class="w-full px-4 py-2.5 rounded-lg border border-gray-300 bg-white/80 focus:bg-white focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition">
                    @error('no_hp')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Lengkap <span
                            class="text-red-500">*</span></label>
                    <textarea name="alamat" rows="2" required
                        class="w-full px-4 py-2.5 rounded-lg border border-gray-300 bg-white/80 focus:bg-white focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password <span
                            class="text-red-500">*</span></label>
                    <div x-data="{ show: false }" class="relative">
                        <input :type="show ? 'text' : 'password'" name="password" required
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-300 bg-white/80 focus:bg-white focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition pr-12">
                        <button type="button" @click="show = !show"
                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-[#df3038] focus:outline-none transition-colors">
                            <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21">
                                </path>
                            </svg>
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
                    @error('password')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- KONFIRMASI PASSWORD (BARU) -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password <span
                            class="text-red-500">*</span></label>
                    <div x-data="{ show: false }" class="relative">
                        <!-- Wajib bernama password_confirmation -->
                        <input :type="show ? 'text' : 'password'" name="password_confirmation" required
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-300 bg-white/80 focus:bg-white focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition pr-12">
                        <button type="button" @click="show = !show"
                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-[#df3038] focus:outline-none transition-colors">
                            <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21">
                                </path>
                            </svg>
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
                    class="w-full bg-[#df3038] hover:bg-[#be1e26] text-white font-semibold py-3 rounded-xl transition shadow-lg mt-2">
                    Daftar Sekarang
                </button>
            </form>

            <p class="text-center mt-6 text-sm text-gray-600">
                Sudah punya akun? <a href="{{ route('login') }}"
                    class="text-[#df3038] font-bold hover:underline">Masuk
                    di sini</a>
            </p>
        </div>
    </div>
</x-layouts.app>
