<section id="visi-misi" class="bg-white py-20">
    <div class="max-w-4xl mx-auto px-4">
        <x-elements.section-heading title="Visi & Misi" align="center" />

        <div class="text-center space-y-12 mt-12">
            <div>
                <h3 class="text-[#df3038] font-bold text-xl mb-4 tracking-widest uppercase">Visi</h3>
                <p class="text-gray-600 text-lg md:text-xl font-light leading-relaxed max-w-2xl mx-auto">
                    "Terwujudnya PMI yang profesional dan berintegritas serta bergerak bersama masyarakat."
                </p>
            </div>

            <div>
                <h3 class="text-[#df3038] font-bold text-xl mb-6 tracking-widest uppercase">Misi</h3>
                <ul class="text-left max-w-2xl mx-auto space-y-5">
                    @php
                        $misiList = [
                            'Memberikan pelayanan kemanusiaan yang cepat dan tepat.',
                            'Memperkuat jejaring relawan dan kemitraan.',
                            'Meningkatkan kesiapsiagaan bencana dan kesehatan.',
                        ];
                    @endphp

                    @foreach ($misiList as $misi)
                        <li class="flex items-start gap-4">
                            <svg class="w-6 h-6 text-[#df3038] mt-0.5 shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                            <span class="text-gray-600 text-lg">{{ $misi }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
