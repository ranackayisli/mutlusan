{{--
    İstatistik çubuğu: hero videosunun alt kısmında, videonun üstünde duran koyu cam panel.
    Hero içinden çağrılır (partials/hero.blade.php).
    Stiller:    resources/css/sections/stats-strip.css
    Animasyon:  resources/js/modules/stats-strip.js
--}}
@php
    $stats = [
        ['value' => now()->year - 1983, 'suffix' => '',     'label' => 'Years Since 1983',      'icon' => 'calendar'],
        ['value' => 85,                 'suffix' => '+',    'label' => 'Countries exported to', 'icon' => 'globe'],
        ['value' => 50,                 'suffix' => 'K m²', 'label' => 'Production area',       'icon' => 'factory'],
        ['value' => 100,                'suffix' => '%',    'label' => 'Locally owned capital', 'icon' => 'shield'],
    ];
@endphp

{{-- data-start-delay: hero metin animasyonları bittikten sonra başlasın (ms) --}}
<div class="stats-strip" data-stats-strip data-start-delay="1500">
    <div class="stats-strip__card relative max-w-[1600px] mx-auto">
        <div class="relative grid grid-cols-2 lg:grid-cols-4">
            @foreach ($stats as $stat)
                <div class="stats-strip__item relative flex items-center justify-start lg:justify-center gap-3 sm:gap-4 px-4 sm:px-6 py-4 sm:py-5" style="--order: {{ $loop->index }}">

                    <svg class="stats-strip__icon flex-shrink-0 w-8 h-8 sm:w-10 sm:h-10 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        @switch($stat['icon'])
                            @case('calendar')
                                <rect x="3" y="4" width="18" height="18" rx="2" pathLength="1"/>
                                <path d="M16 2v4M8 2v4M3 10h18" pathLength="1"/>
                                <path d="M8 14h.01M12 14h.01M8 18h.01" pathLength="1"/>
                                @break
                            @case('globe')
                                <circle cx="12" cy="12" r="10" pathLength="1"/>
                                <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20" pathLength="1"/>
                                <path d="M2 12h20" pathLength="1"/>
                                @break
                            @case('factory')
                                <path d="M2 20a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8l-7 5V8l-7 5V4a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z" pathLength="1"/>
                                <path d="M17 18h1M12 18h1M7 18h1" pathLength="1"/>
                                @break
                            @case('shield')
                                <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z" pathLength="1"/>
                                <path d="m9 12 2 2 4-4" pathLength="1"/>
                                @break
                        @endswitch
                    </svg>

                    <div class="min-w-0">
                        <p class="font-display font-bold tracking-tight text-white text-xl sm:text-3xl leading-none whitespace-nowrap">
                            <span class="tabular-nums" data-count-to="{{ $stat['value'] }}">{{ number_format($stat['value']) }}</span>{{ $stat['suffix'] }}
                        </p>
                        <p class="mt-1 text-xs sm:text-sm text-white/70 leading-snug">{{ $stat['label'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
