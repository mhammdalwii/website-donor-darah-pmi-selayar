<!-- Menggunakan Alpine.js (x-data) untuk logika Carousel -->
<div id="beranda" x-data="{
    activeSlide: 0,
    // Anda bisa mengganti URL gambar di bawah ini dengan gambar asli PMI Anda nanti
    slides: [
        `{{ asset('assets/hero/hero1.jpeg') }}`,
        `{{ asset('assets/hero/hero2.jpeg') }}`,
        'https://images.unsplash.com/photo-1532938911079-1b06ac7ceec7?q=80&w=2000&auto=format&fit=crop'
    ],
    init() {
        // Mengganti slide secara otomatis setiap 5 detik (5000 ms)
        setInterval(() => {
            this.activeSlide = this.activeSlide === this.slides.length - 1 ? 0 : this.activeSlide + 1;
        }, 5000);
    }
}"
    class="relative pt-44 pb-48 px-4 text-center overflow-hidden flex items-center justify-center min-h-[85vh]">

    <!-- Render Gambar Carousel -->
    <template x-for="(slide, index) in slides" :key="index">
        <div x-show="activeSlide === index" x-transition:enter="transition ease-out duration-1000"
            x-transition:enter-start="opacity-0 scale-105" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-1000" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-105" class="absolute inset-0 z-0 w-full h-full">

            <!-- Gambar Asli -->
            <img :src="slide" alt="Background PMI" class="w-full h-full object-cover">

            <!-- Overlay Warna Merah PMI (Agar teks tetap terbaca jelas) -->
            <div class="absolute inset-0 bg-linear-to-br from-[#e0313a]/80 to-[#be1e26]/90 mix-blend-multiply"></div>
        </div>
    </template>

    <!-- Konten Utama (Teks & Tombol) -->
    <div class="max-w-4xl mx-auto relative z-10">
        <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 tracking-tight leading-tight drop-shadow-md">
            Selamatkan Jiwa,<br class="md:hidden"> Mulai dari Anda.
        </h1>
        <p class="text-white/95 text-base md:text-xl font-light mb-10 max-w-2xl mx-auto leading-relaxed drop-shadow-sm">
            Layanan informasi resmi donor darah Kabupaten Kepulauan Selayar.
        </p>
        <x-elements.button href="#" variant="white"
            class="px-10 py-3.5 text-base rounded-full shadow-lg hover:scale-105 hover:shadow-xl transition-all duration-300">
            Mulai Donor
        </x-elements.button>
    </div>

    <!-- Indikator Slide (Titik-titik di bawah teks) -->
    <div class="absolute bottom-28 left-0 right-0 z-10 flex justify-center gap-3">
        <template x-for="(slide, index) in slides" :key="index">
            <button @click="activeSlide = index"
                :class="activeSlide === index ? 'w-10 bg-white' : 'w-3 bg-white/40 hover:bg-white/70'"
                class="h-3 rounded-full transition-all duration-500 shadow-sm" aria-label="Ganti slide"></button>
        </template>
    </div>

    <!-- Gelombang SVG (Divider Bawah) -->
    {{-- <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none translate-y-1 z-10">
        <svg class="relative block w-full h-15 md:h-25" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="none" viewBox="0 0 1200 120">
            <path
                d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
                opacity=".1" fill="#ffffff"></path>
            <path
                d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z"
                opacity=".2" fill="#ffffff"></path>
            <path
                d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"
                fill="#f9fafb"></path>
        </svg>
    </div> --}}
</div>
