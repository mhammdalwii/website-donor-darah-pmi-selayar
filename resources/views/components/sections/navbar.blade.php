<nav x-data="{ mobileMenuOpen: false }" class="bg-white border-b border-gray-100 fixed top-0 left-0 w-full z-50 shadow-xs">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <!-- Logo Brand -->
            <div class="flex items-center gap-3">
                <a href="{{ url('/#beranda') }}" class="flex items-center gap-3">
                    <img src="{{ asset('assets/images/logoPMI.png') }}" alt="Logo PMI Selayar"
                        class="w-40 h-40 object-contain">
                </a>
            </div>

            <!-- ===================== MENU DESKTOP ===================== -->
            <div class="hidden md:flex items-center gap-8">
                <!-- Beranda -->
                <a href="{{ url('/#beranda') }}"
                    class="text-sm font-medium text-gray-700 hover:text-[#df3038] transition-colors">Beranda</a>

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

                <a href="{{ url('/berita') }}"
                    class="text-sm font-medium transition-colors {{ request()->is('berita*') ? 'text-[#df3038]' : 'text-gray-700 hover:text-[#df3038]' }}">Berita</a>
                <a href="{{ url('/galeri') }}"
                    class="text-sm font-medium text-gray-700 hover:text-[#df3038] transition-colors">Galeri</a>

                <!-- Autentikasi Desktop -->
                @guest
                    <x-elements.button href="{{ route('login') }}" variant="primary">Masuk / Daftar</x-elements.button>
                @else
                    <div x-data="{ openProfil: false }" @click.away="openProfil = false" class="relative">
                        <button @click="openProfil = !openProfil"
                            class="flex items-center gap-2 px-4 py-2 bg-red-50 text-[#df3038] border border-red-100 rounded-full text-sm font-bold hover:bg-red-100 transition-colors focus:outline-none">
                            Halo, {{ explode(' ', Auth::user()->name)[0] }}
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="openProfil"
                            class="absolute right-0 mt-3 w-40 bg-white rounded-xl shadow-lg py-2 border border-gray-100"
                            style="display: none;">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 font-medium flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                        </path>
                                    </svg>
                                    Keluar
                                </button>
                            </form>
                        </div>
                    </div>
                @endguest
            </div>

            <!-- ===================== TOMBOL HAMBURGER (MOBILE) ===================== -->
            <div class="flex items-center md:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen"
                    class="text-gray-600 hover:text-[#df3038] focus:outline-none p-2">
                    <!-- Icon Menu (Garis Tiga) -->
                    <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <!-- Icon Close (Silang) -->
                    <svg x-show="mobileMenuOpen" style="display: none;" class="w-6 h-6" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- ===================== MENU MOBILE (DROPDOWN) ===================== -->
    <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="md:hidden absolute top-20 left-0 w-full bg-white border-t border-gray-100 shadow-xl max-h-[calc(100vh-5rem)] overflow-y-auto"
        style="display: none;">

        <div class="px-4 py-6 space-y-2">
            <a href="{{ url('/#beranda') }}"
                class="block px-3 py-3 text-base font-medium text-gray-800 rounded-lg hover:bg-gray-50">Beranda</a>

            <!-- Mobile Dropdown: Ayo Donor -->
            <div x-data="{ open: false }" class="rounded-lg">
                <button @click="open = !open"
                    class="flex items-center justify-between w-full px-3 py-3 text-base font-medium text-gray-800 rounded-lg hover:bg-gray-50 focus:outline-none">
                    Ayo Donor
                    <svg class="w-4 h-4 transition-transform duration-200" :class="open ? 'rotate-180' : ''"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                        </path>
                    </svg>
                </button>
                <div x-show="open" class="pl-4 pr-3 py-2 space-y-1 bg-gray-50 rounded-b-lg" style="display: none;">
                    <a href="{{ url('/#alur-syarat') }}"
                        class="block px-3 py-2 text-sm text-gray-600 rounded-md hover:text-[#df3038] hover:bg-white">Syarat
                        & Manfaat</a>
                    <a href="{{ url('/donor/jadwal') }}"
                        class="block px-3 py-2 text-sm text-gray-600 rounded-md hover:text-[#df3038] hover:bg-white">Jadwal
                        Lokasi Kegiatan</a>
                    <a href="{{ url('/donor/daftar') }}"
                        class="block px-3 py-2 text-sm text-gray-600 rounded-md hover:text-[#df3038] hover:bg-white">Daftar
                        Pendonor</a>
                </div>
            </div>

            <!-- Mobile Dropdown: Profil PMI -->
            <div x-data="{ open: false }" class="rounded-lg">
                <button @click="open = !open"
                    class="flex items-center justify-between w-full px-3 py-3 text-base font-medium text-gray-800 rounded-lg hover:bg-gray-50 focus:outline-none">
                    Profil PMI
                    <svg class="w-4 h-4 transition-transform duration-200" :class="open ? 'rotate-180' : ''"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                        </path>
                    </svg>
                </button>
                <div x-show="open" class="pl-4 pr-3 py-2 space-y-1 bg-gray-50 rounded-b-lg" style="display: none;">
                    <a href="{{ url('/#visi-misi') }}"
                        class="block px-3 py-2 text-sm text-gray-600 rounded-md hover:text-[#df3038] hover:bg-white">Visi
                        & Misi</a>
                    <a href="{{ url('/profil/struktur') }}"
                        class="block px-3 py-2 text-sm text-gray-600 rounded-md hover:text-[#df3038] hover:bg-white">Struktur
                        Pengurus</a>
                </div>
            </div>

            <a href="{{ url('/berita') }}"
                class="block px-3 py-3 text-base font-medium text-gray-800 rounded-lg hover:bg-gray-50">Berita</a>
            <a href="{{ url('/galeri') }}"
                class="block px-3 py-3 text-base font-medium text-gray-800 rounded-lg hover:bg-gray-50">Galeri</a>

            <hr class="my-4 border-gray-100">

            <!-- Autentikasi Mobile -->
            @guest
                <a href="{{ route('login') }}"
                    class="block text-center w-full bg-[#df3038] text-white font-semibold py-3 rounded-xl shadow-md hover:bg-[#be1e26] transition mt-4">
                    Masuk / Daftar
                </a>
            @else
                <div class="px-3 py-2 bg-red-50 rounded-xl mb-4 border border-red-100">
                    <p class="text-xs text-red-500 font-semibold uppercase tracking-wider mb-1">Masuk Sebagai</p>
                    <p class="font-bold text-gray-900">{{ Auth::user()->name }}</p>
                    <p class="text-sm text-gray-500 mt-1">{{ Auth::user()->no_hp }}</p>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="flex items-center justify-center gap-2 w-full bg-gray-100 text-red-600 font-semibold py-3 rounded-xl hover:bg-red-100 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                            </path>
                        </svg>
                        Keluar Akun
                    </button>
                </form>
            @endguest
        </div>
    </div>
</nav>
