<section id="alur-syarat" class="max-w-6xl mx-auto px-4 py-16 mb-10">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">

        <div>
            <x-elements.section-heading title="Syarat Jadi Pendonor" />

            <div class="mt-10">
                <x-blocks.requirement-item title="Usia & Identitas"
                    description="Usia 17–60 tahun dan membawa identitas diri (KTP).">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2">
                        </path>
                    </svg>
                </x-blocks.requirement-item>

                <x-blocks.requirement-item title="Berat Badan"
                    description="Minimal 45 Kg untuk kesehatan selama proses pengambilan.">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3">
                        </path>
                    </svg>
                </x-blocks.requirement-item>

                <x-blocks.requirement-item title="Sehat Jasmani"
                    description="Tidak demam, tidak sedang konsumsi antibiotik, dan cukup tidur.">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                        </path>
                    </svg>
                </x-blocks.requirement-item>
            </div>
        </div>

        <div>
            <x-elements.section-heading title="Manfaat Donor" />

            <div
                class="mt-10 bg-white rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 p-8 sm:p-10 relative overflow-hidden">
                <div class="absolute left-0 top-0 bottom-0 w-2 bg-[#df3038] rounded-l-2xl"></div>

                <ul class="space-y-5">
                    @php
                        $benefits = [
                            'Regenerasi sel darah merah lebih cepat.',
                            'Menurunkan risiko serangan jantung.',
                            'Pemeriksaan kesehatan gratis berkala.',
                            'Meningkatkan rasa kepedulian sosial.',
                        ];
                    @endphp

                    @foreach ($benefits as $benefit)
                        <li class="flex items-start gap-4">
                            <svg class="w-6 h-6 text-[#df3038] shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-600 font-medium text-base">{{ $benefit }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
</section>
