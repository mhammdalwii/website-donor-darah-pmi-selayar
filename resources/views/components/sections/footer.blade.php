<footer class="bg-white border-t border-gray-200 pt-16 pb-8 mt-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-12">

            <div>
                <a href="{{ url('/') }}" class="flex items-center gap-2 mb-4">
                    <span class="font-bold text-xl tracking-wider text-[#df3038]">PMI SELAYAR</span>
                </a>
                <p class="text-gray-500 text-sm leading-relaxed max-w-sm">
                    Layanan informasi resmi donor darah Kabupaten Kepulauan Selayar. Bersama kita selamatkan jiwa.
                </p>
            </div>

            <div class="md:justify-self-end">
                <h4 class="font-bold text-gray-800 mb-5">Hubungi Kami</h4>
                <ul class="space-y-3 text-sm text-gray-500">

                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-gray-400 shrink-0 mt-0.5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <a href="https://maps.google.com/?q=PMI+Kabupaten+Kepulauan+Selayar" target="_blank"
                            class="hover:text-[#df3038] transition-colors leading-relaxed">
                            Jl. Abd. Kadir Kasim, Bontobangung, Kec. Bontoharu
                        </a>
                    </li>

                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-gray-400 shrink-0 mt-0.5" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                        </svg>
                        <a class="hover:text-[#df3038] transition-colors leading-relaxed">
                            +62 852-4272-4531
                        </a>
                    </li>

                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-gray-400 shrink-0" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        <a href="mailto:pmi.selayar@gmail.com" class="hover:text-[#df3038] transition-colors">
                            pmi.selayar@gmail.com
                        </a>
                    </li>

                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-gray-400 shrink-0" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path fill="currentColor" fill-rule="evenodd"
                                d="M3 8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5V8Zm5-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3H8Zm7.597 2.214a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2h-.01a1 1 0 0 1-1-1ZM12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm-5 3a5 5 0 1 1 10 0 5 5 0 0 1-10 0Z"
                                clip-rule="evenodd" />
                        </svg>
                        <a href="https://instagram.com/pmiselayar" target="_blank"
                            class="hover:text-[#df3038] transition-colors">
                            pmiselayar
                        </a>
                    </li>
                </ul>
            </div>

        </div>

        <div
            class="border-t border-gray-100 pt-8 text-center md:text-left flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-gray-400 text-sm w-full text-center">
                &copy; {{ date('Y') }} PMI Kepulauan Selayar. All rights reserved.
            </p>
        </div>
    </div>
</footer>
