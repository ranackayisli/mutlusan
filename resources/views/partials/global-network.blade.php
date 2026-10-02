{{--
    "Global Reach": İstanbul'dan dünyaya uzanan satış ağı haritası.
    Veri:       config/export-network.php   (pazarlar, istatistikler)
    Koordinat:  app/Support/WorldMap.php
    Harita:     public/images/world-dots.svg   (scripts/generate-world-dots.mjs ile üretilir)
    Stiller:    resources/css/sections/global-network.css
    Davranış:   resources/js/modules/global-network.js
--}}
@php
    $network = config('export-network');
    $height = \App\Support\WorldMap::height();
    $hub = \App\Support\WorldMap::project($network['hub']['lat'], $network['hub']['lon']);

    $markets = collect($network['markets'])->values()->map(function (array $market, int $index) use ($hub) {
        $point = \App\Support\WorldMap::project($market['lat'], $market['lon']);

        return $market + [
            'x' => $point[0],
            'y' => $point[1],
            'path' => \App\Support\WorldMap::arc($hub, $point),
            'delay' => round($index * 0.45, 2),   // sırayla belirsinler
            'duration' => round(3.6 + $index * 0.5, 1),
        ];
    });

    $icons = [
        'globe' => '<circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/>',
        'pin' => '<path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 0 1 16 0z"/><circle cx="12" cy="10" r="3"/>',
        'factory' => '<path d="M2 20a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8l-7 5V8l-7 5V4a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"/><path d="M17 18h1M12 18h1M7 18h1"/>',
    ];
@endphp

<section class="gn" data-global-network aria-labelledby="gn-title">
    <div class="gn__inner">

        <div class="gn__copy">
            <span class="gn__eyebrow">{{ __('Global Reach') }}</span>
            <h2 id="gn-title" class="gn__title">{{ __('Made in Istanbul, Trusted in 85+ Countries') }}</h2>
            <p class="gn__text">{{ __('From our fully integrated production facility in Istanbul, Mutlusan products reach customers in more than 85 countries.') }}</p>
            <a href="{{ url('/iletisim') }}" class="gn__cta">
                {{ __('Contact Our Export Team') }}
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
            </a>
        </div>

        <div class="gn__map" style="aspect-ratio: {{ \App\Support\WorldMap::WIDTH }} / {{ $height }}" role="img" aria-label="{{ __('World map showing the Mutlusan sales network reaching out from Istanbul') }}">
            <img class="gn__dots" src="{{ asset('images/world-dots.svg') }}" alt="" width="{{ \App\Support\WorldMap::WIDTH }}" height="{{ $height }}" loading="lazy" decoding="async">

            <svg class="gn__overlay" viewBox="0 0 {{ \App\Support\WorldMap::WIDTH }} {{ $height }}" aria-hidden="true" focusable="false">
                <defs>
                    <radialGradient id="gn-halo">
                        <stop offset="0" stop-color="#ff4d6d" stop-opacity="0.6"/>
                        <stop offset="1" stop-color="#ff4d6d" stop-opacity="0"/>
                    </radialGradient>
                </defs>

                {{-- Bağlantı çizgileri: önce çizilir, sonra üzerinden akan ışık noktaları geçer --}}
                @foreach ($markets as $market)
                    <g style="--d: {{ $market['delay'] }}s">
                        <path class="gn-arc" d="{{ $market['path'] }}" pathLength="1"/>
                        <path class="gn-flow" d="{{ $market['path'] }}"/>
                    </g>
                @endforeach

                <g class="gn-sparks">
                    @foreach ($markets as $market)
                        <circle class="gn-spark" r="2.4">
                            <animateMotion dur="{{ $market['duration'] }}s" begin="{{ $market['delay'] + 1.8 }}s" repeatCount="indefinite" path="{{ $market['path'] }}"/>
                            <animate attributeName="opacity" values="0;1;1;0" keyTimes="0;0.12;0.85;1" dur="{{ $market['duration'] }}s" begin="{{ $market['delay'] + 1.8 }}s" repeatCount="indefinite"/>
                        </circle>
                    @endforeach
                </g>

                {{-- Pazarlar --}}
                @foreach ($markets as $market)
                    @php
                        $region = ($market['type'] ?? 'market') === 'region';
                        [$lx, $ly, $anchor] = match ($market['side'] ?? 'right') {
                            'left' => [-11, 5, 'end'],
                            'top' => [0, $region ? -26 : -13, 'middle'],
                            'bottom' => [0, 22, 'middle'],
                            default => [11, 5, 'start'],
                        };
                    @endphp
                    <g transform="translate({{ $market['x'] }} {{ $market['y'] }})">
                        <g class="gn-node {{ $region ? 'gn-node--region' : '' }}" style="--d: {{ $market['delay'] }}s">
                            <circle class="gn-halo" r="{{ $region ? 30 : 18 }}" fill="url(#gn-halo)"/>
                            @unless ($region)
                                <circle class="gn-ring" r="6.5"/>
                            @endunless
                            <circle class="gn-core" r="{{ $region ? 4 : 4.4 }}"/>
                            <text class="gn-label" x="{{ $lx }}" y="{{ $ly }}" text-anchor="{{ $anchor }}">{{ __($market['name']) }}</text>
                        </g>
                    </g>
                @endforeach

                {{-- Merkez: İstanbul --}}
                <g transform="translate({{ $hub[0] }} {{ $hub[1] }})">
                    <circle class="gn-ripple" r="8"/>
                    <circle class="gn-ripple gn-ripple--2" r="8"/>
                    <g class="gn-hub">
                        <circle r="22" fill="url(#gn-halo)"/>
                        <circle class="gn-hub-core" r="6"/>
                        <text class="gn-label gn-label--hub" x="12" y="19">{{ __($network['hub']['name']) }}</text>
                    </g>
                </g>
            </svg>
        </div>

        <aside class="gn__stats" aria-label="{{ __('Mutlusan in numbers') }}">
            @foreach ($network['stats'] as $stat)
                <div class="gn__stat">
                    <svg class="gn__stat-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">{!! $icons[$stat['icon']] ?? '' !!}</svg>
                    <div>
                        <p class="gn__stat-value"><span class="tabular-nums" data-count-to="{{ $stat['value'] }}">{{ $stat['value'] }}</span>{{ $stat['suffix'] }}</p>
                        <p class="gn__stat-label">{{ __($stat['label']) }}</p>
                    </div>
                </div>
            @endforeach
        </aside>

    </div>
</section>
