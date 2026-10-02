{{-- Üst boşluk bilerek 32px: başlığın satır aralığı görünür boşluğa ~7px ekler, böylece üst ve alt boşluk gözle eşit (39px) görünür --}}
<section class="pt-[32px] pb-[39px] px-6 bg-mutlusan-gray-dark relative overflow-hidden">

    <div class="relative max-w-4xl mx-auto">
        <h2 class="font-display text-2xl sm:text-3xl font-bold text-white">
            AI-Powered Document Center
        </h2>
        <p class="mt-2 text-sm text-white/60 max-w-lg">
            Find catalogs, technical sheets, certificates and application guides in seconds.
        </p>

        <div class="mt-7 grid lg:grid-cols-5 gap-5 items-start">

            {{-- Sol/orta: arama + filtre + doküman kartları --}}
            <div class="lg:col-span-3">
                <form action="{{ url('/dokumanlar') }}" method="GET" class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-white/40">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l1.9 5.8L20 9.5l-5.8 1.9L12 17l-1.9-5.6L4 9.5l6.1-1.7L12 2z"/></svg>
                    </span>
                    <input type="text" name="q" placeholder="Search documents, products or topics..."
                           class="w-full rounded-full bg-white/10 border border-white/15 pl-11 pr-4 py-3 text-sm text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-mutlusan-red">
                </form>

                <div class="mt-3 flex flex-wrap gap-2">
                    @foreach (['All', 'Catalog', 'Technical Sheet', 'Certificate', 'Guide'] as $i => $filtre)
                        <button type="button" class="px-3.5 py-1.5 rounded-full text-xs font-semibold transition-colors {{ $i === 0 ? 'bg-mutlusan-red text-white' : 'bg-white/10 text-white/70 hover:bg-white/20' }}">
                            {{ $filtre }}
                        </button>
                    @endforeach
                </div>

                <div class="mt-5 grid sm:grid-cols-3 gap-3">
                    @php
                        $dokumanlar = [
                            ['tur' => 'CATALOG', 'ad' => 'General Catalog 2025', 'boyut' => 'PDF · 28 MB'],
                            ['tur' => 'TECHNICAL SHEET', 'ad' => 'Cable Trunking Sheet', 'boyut' => 'PDF · 1.2 MB'],
                            ['tur' => 'CERTIFICATE', 'ad' => 'ISO 9001:2015', 'boyut' => 'PDF · 0.8 MB'],
                        ];
                    @endphp
                    @foreach ($dokumanlar as $dok)
                        <div class="bg-white/5 border border-white/10 rounded-xl p-3.5 hover:bg-white/10 transition-colors cursor-pointer group">
                            <div class="aspect-[4/3] rounded-lg bg-white/10 flex items-center justify-center mb-2.5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white/30" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                            </div>
                            <span class="text-[0.6rem] font-bold tracking-wide text-mutlusan-red-light">{{ $dok['tur'] }}</span>
                            <h4 class="text-xs font-semibold text-white leading-snug mt-0.5">{{ $dok['ad'] }}</h4>
                            <p class="text-[0.65rem] text-white/40 mt-0.5">{{ $dok['boyut'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Sağ: AI asistan önizlemesi (görsel, henüz aktif değil) --}}
            <div class="lg:col-span-2 bg-white/5 border border-white/10 rounded-2xl p-4">
                <div class="flex items-center gap-2 mb-3">
                    <span class="w-7 h-7 rounded-full bg-mutlusan-red/20 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-mutlusan-red-light" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l1.9 5.8L20 9.5l-5.8 1.9L12 17l-1.9-5.6L4 9.5l6.1-1.7L12 2z"/></svg>
                    </span>
                    <span class="text-sm font-semibold text-white">Mutlusan AI Assistant</span>
                    <span class="ml-auto text-[0.6rem] font-bold text-white/30 tracking-wide uppercase">Coming Soon</span>
                </div>
                <p class="text-xs text-white/60 mb-3">How can I help you?</p>
                <div class="space-y-1.5">
                    @foreach (['Cable trunking technical specs', 'About IP protection ratings', 'Latest product catalogs', 'Looking for an application guide'] as $soru)
                        <div class="text-xs text-white/70 bg-white/5 border border-white/10 rounded-lg px-3 py-2">
                            {{ $soru }}
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>
