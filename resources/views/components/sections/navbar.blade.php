<nav class="bg-white border-b border-gray-100 fixed top-0 left-0 w-full z-50 shadow-xs">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex items-center gap-2">
                <a href="/" class="flex items-center gap-2">
                    <svg class="w-6 h-6 text-[#df3038]" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                    </svg>
                    <span class="font-bold text-lg tracking-wider text-[#df3038]">PMI SELAYAR</span>
                </a>
            </div>

            <div class="hidden md:flex items-center gap-8">
                <a href="/"
                    class="text-sm font-medium text-gray-700 hover:text-[#df3038] transition-colors">Beranda</a>

                <div x-data="{ open: false }" @click.away="open = false" class="relative">
                    <button @click="open = !open"
                        class="flex items-center gap-1 text-sm font-medium text-gray-700 hover:text-[#df3038] transition-colors focus:outline-hidden">
                        Ayo Donor
                        <svg class="w-4 h-4 transition-transform" :class="open ? 'rotate-180' : ''" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div x-show="open" x-transition
                        class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg py-2 border border-gray-100">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Alur Donor
                            Darah</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Jadwal Mobile
                            Unit</a>
                    </div>
                </div>

                <div x-data="{ open: false }" @click.away="open = false" class="relative">
                    <button @click="open = !open"
                        class="flex items-center gap-1 text-sm font-medium text-gray-700 hover:text-[#df3038] transition-colors focus:outline-hidden">
                        Profil PMI
                        <svg class="w-4 h-4 transition-transform" :class="open ? 'rotate-180' : ''" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div x-show="open" x-transition
                        class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg py-2 border border-gray-100">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Visi & Misi</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Struktur
                            Organisasi</a>
                    </div>
                </div>

                <a href="#"
                    class="text-sm font-medium text-gray-700 hover:text-[#df3038] transition-colors">Galeri</a>

                <x-elements.button href="/admin/login" variant="primary">
                    Login Admin
                </x-elements.button>
            </div>
        </div>
    </div>
</nav>
