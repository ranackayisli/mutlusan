<section class="py-8 sm:py-10 px-4 sm:px-6 bg-white">
    <div class="max-w-[1400px] mx-auto">
        <div class="flex items-end justify-between flex-wrap gap-3 mb-5">
            <div>
                <span class="text-mutlusan-red text-sm font-semibold tracking-wide">Solutions / By Sector</span>
                <h2 class="font-display text-2xl sm:text-3xl lg:text-4xl font-bold text-mutlusan-gray-dark mt-2">
                    Tailored Electrical Solutions for Every Project
                </h2>
            </div>
            <a href="{{ url('/urunler') }}" class="text-mutlusan-red font-semibold hover:text-mutlusan-red-dark transition-colors whitespace-nowrap text-sm sm:text-base">
                All Sectors →
            </a>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
            @php
                $sektorler = [
                    ['ad' => 'Residential', 'aciklama' => 'Safe and comfortable living spaces.', 'renk' => 'from-mutlusan-red-dark to-mutlusan-red', 'gorseller' => ['residential', 'konut', 'ev'], 'icon' => 'M3 12l9-9 9 9M5 10v10a1 1 0 001 1h3m10-11v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
                    ['ad' => 'Commercial Buildings', 'aciklama' => 'Efficient and sustainable business solutions.', 'renk' => 'from-mutlusan-gray-dark to-mutlusan-gray', 'gorseller' => ['commercial', 'commercial-buildings', 'ticari'], 'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2M5 21h2m2 0h6m-6-9h.01M15 12h.01M9 8h.01M15 8h.01M9 16h.01M15 16h.01'],
                    ['ad' => 'Industrial', 'aciklama' => 'High-performance industrial solutions.', 'renk' => 'from-mutlusan-red-dark to-mutlusan-gray-dark', 'gorseller' => ['industrial', 'endustriyel', 'sanayi'], 'icon' => 'M19 21V9l-7-4-7 4v12m14 0H5m14 0h2M3 21h2m4-10h6m-6 4h6m-3-8v0'],
                    ['ad' => 'Infrastructure', 'aciklama' => 'Durable and reliable infrastructure systems.', 'renk' => 'from-mutlusan-gray-dark to-mutlusan-red-dark', 'gorseller' => ['infrastructure', 'altyapi'], 'icon' => 'M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7'],
                ];

                // public/images/solutions/ içinde ilk bulunan görseli seç; yoksa gradient kalır
                $gorselBul = function (array $adlar) {
                    foreach ($adlar as $ad) {
                        foreach (['jpg', 'jpeg', 'webp', 'png'] as $uzanti) {
                            $yol = "images/solutions/{$ad}.{$uzanti}";
                            if (file_exists(public_path($yol))) {
                                return asset($yol) . '?v=' . filemtime(public_path($yol));
                            }
                        }
                    }
                    return null;
                };
            @endphp

            @foreach ($sektorler as $sektor)
                @php $gorsel = $gorselBul($sektor['gorseller']); @endphp
                <a href="{{ url('/urunler') }}" class="group relative rounded-2xl overflow-hidden aspect-[4/3] bg-gradient-to-br {{ $sektor['renk'] }}">
                    @if ($gorsel)
                        <img src="{{ $gorsel }}" alt="{{ $sektor['ad'] }}" loading="lazy"
                             class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/35 to-black/10"></div>
                    @endif
                    <div class="absolute inset-0 opacity-0 group-hover:opacity-10 bg-white transition-opacity duration-300"></div>
                    <div class="relative h-full flex flex-col justify-between p-4">
                        <span class="w-8 h-8 rounded-full bg-white/15 backdrop-blur flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $sektor['icon'] }}" />
                            </svg>
                        </span>
                        <div>
                            <h3 class="font-display text-base sm:text-lg font-bold text-white leading-tight">{{ $sektor['ad'] }}</h3>
                            <p class="mt-1 text-xs sm:text-sm text-white/80 line-clamp-2">{{ $sektor['aciklama'] }}</p>
                            <span class="mt-2 inline-flex items-center justify-center w-7 h-7 rounded-full bg-white/15 backdrop-blur group-hover:bg-white group-hover:text-mutlusan-red transition-colors text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                            </span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
