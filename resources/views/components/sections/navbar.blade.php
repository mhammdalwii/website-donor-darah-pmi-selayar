<nav class="bg-white border-b border-gray-100 fixed top-0 left-0 w-full z-50 shadow-xs">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <!-- Logo Brand -->
            <div class="flex items-center gap-3">
                <a href="{{ url('/#beranda') }}" class="flex items-center gap-3">
                    <img src="{{ asset('assets/images/logoPMI.png') }}" alt="Logo PMI Selayar"
                        class="w-40 h-40 object-contain">

                    {{-- <span class="font-bold text-lg tracking-wider text-[#df3038]">
                        PMI SELAYAR
                    </span> --}}
                </a>
            </div>

            <!-- Menu Navigasi -->
            <div class="hidden md:flex items-center gap-8">
                <!-- Beranda -->
                <a href="{{ url('/#beranda') }}"
                    class="text-sm font-medium text-gray-700 hover:text-[#df3038] transition-colors">
                    Beranda
                </a>

                <!-- Dropdown Ayo Donor -->
                <div x-data="{ open: false }" @click.away="open = false" @mouseleave="open = false"
                    @mouseenter="open = true" class="relative py-8 -my-8 flex items-center">
                    <button @click="open = !open"
                        class="flex items-center gap-1 text-sm font-medium transition-colors focus:outline-none {{ request()->is('donor*') ? 'text-[#df3038]' : 'text-gray-700 hover:text-[#df3038]' }}">
                        Ayo Donor
                        <svg class="w-4 h-4 transition-transform duration-200" :class="open ? 'rotate-180' : ''"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <!-- Tambahan Menu Jadwal di dalam Dropdown -->
                    <div x-show="open" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute top-full left-0 mt-0 w-52 bg-white rounded-xl shadow-lg py-2 border border-gray-100"
                        style="display: none;">
                        <a href="{{ url('/#alur-syarat') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#df3038]">Syarat &
                            Manfaat</a>
                        <a href="{{ url('/donor/jadwal') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#df3038]">Jadwal
                            Lokasi Kegiatan</a>
                        <a href="{{ url('/donor/daftar') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#df3038]">Daftar
                            Pendonor</a>
                    </div>
                </div>

                <!-- Dropdown Profil PMI -->
                <div x-data="{ open: false }" @click.away="open = false" @mouseleave="open = false"
                    @mouseenter="open = true" class="relative py-8 -my-8 flex items-center">
                    <button @click="open = !open"
                        class="flex items-center gap-1 text-sm font-medium transition-colors focus:outline-none {{ request()->is('profil*') ? 'text-[#df3038]' : 'text-gray-700 hover:text-[#df3038]' }}">
                        Profil PMI
                        <svg class="w-4 h-4 transition-transform duration-200" :class="open ? 'rotate-180' : ''"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute top-full left-0 mt-0 w-48 bg-white rounded-xl shadow-lg py-2 border border-gray-100"
                        style="display: none;">
                        <a href="{{ url('/#visi-misi') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#df3038]">Visi &
                            Misi</a>
                        <a href="{{ url('/profil/struktur') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#df3038]">Struktur
                            Pengurus</a>
                    </div>
                </div>

                <!-- Menu Berita Baru (Top-Level) -->
                <a href="{{ url('/berita') }}"
                    class="text-sm font-medium transition-colors {{ request()->is('berita*') ? 'text-[#df3038]' : 'text-gray-700 hover:text-[#df3038]' }}">
                    Berita
                </a>

                <!-- Galeri -->
                <a href="{{ url('/#galeri') }}"
                    class="text-sm font-medium text-gray-700 hover:text-[#df3038] transition-colors">
                    Galeri
                </a>

                <!-- Tombol Login Admin -->
                <x-elements.button href="{{ url('/admin') }}" variant="primary">
                    Login Admin
                </x-elements.button>
            </div>
        </div>
    </div>
</nav>
