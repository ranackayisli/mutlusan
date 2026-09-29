{{--
    İstatistik şeridi — kırmızı zemin, solda ikon, sağda rakam + etiket.
    Animasyonlar: hareketli kırmızı zemin, ikonların çizilerek belirmesi, 0'dan hedefe sayma.
--}}
@php
    $istatistikler = [
        ['hedef' => date('Y') - 1983, 'ek' => '',     'etiket' => 'Years Since 1983',      'ikon' => 'takvim'],
        ['hedef' => 85,               'ek' => '+',    'etiket' => 'Countries exported to', 'ikon' => 'dunya'],
        ['hedef' => 50,               'ek' => 'K m²', 'etiket' => 'Production area',       'ikon' => 'fabrika'],
        ['hedef' => 100,              'ek' => '%',    'etiket' => 'Locally owned capital', 'ikon' => 'kalkan'],
    ];
@endphp

<section class="sayac-serit relative z-10 bg-mutlusan-gray-light px-4 sm:px-6 pt-5 sm:pt-6" data-no-reveal lang="en">
    <div class="sayac-serit__kart relative max-w-7xl mx-auto rounded-[32px] overflow-hidden">

        {{-- Hareketli arka plan --}}
        <div class="sayac-serit__arka" aria-hidden="true">
            <span class="sayac-serit__leke sayac-serit__leke--1"></span>
            <span class="sayac-serit__leke sayac-serit__leke--2"></span>
            <span class="sayac-serit__cizgiler"></span>
            <span class="sayac-serit__parlama"></span>
        </div>

        <div class="relative grid grid-cols-2 lg:grid-cols-4">
            @foreach ($istatistikler as $ist)
                <div class="sayac-serit__oge relative flex items-center justify-start lg:justify-center gap-3 sm:gap-4 px-4 sm:px-6 py-4 sm:py-5" style="--sira: {{ $loop->index }}">

                    <svg class="sayac-serit__ikon flex-shrink-0 w-8 h-8 sm:w-10 sm:h-10 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        @switch($ist['ikon'])
                            @case('takvim')
                                <rect x="3" y="4" width="18" height="18" rx="2" pathLength="1"/>
                                <path d="M16 2v4M8 2v4M3 10h18" pathLength="1"/>
                                <path d="M8 14h.01M12 14h.01M8 18h.01" pathLength="1"/>
                                @break
                            @case('dunya')
                                <circle cx="12" cy="12" r="10" pathLength="1"/>
                                <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20" pathLength="1"/>
                                <path d="M2 12h20" pathLength="1"/>
                                @break
                            @case('fabrika')
                                <path d="M2 20a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8l-7 5V8l-7 5V4a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z" pathLength="1"/>
                                <path d="M17 18h1M12 18h1M7 18h1" pathLength="1"/>
                                @break
                            @case('kalkan')
                                <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z" pathLength="1"/>
                                <path d="m9 12 2 2 4-4" pathLength="1"/>
                                @break
                        @endswitch
                    </svg>

                    <div class="min-w-0">
                        <div class="font-display font-bold tracking-tight text-white text-xl sm:text-3xl leading-none whitespace-nowrap">
                            <span class="tabular-nums" data-sayac="{{ $ist['hedef'] }}">0</span>{{ $ist['ek'] }}
                        </div>
                        <p class="mt-1 text-xs sm:text-sm text-white/85 leading-snug">{{ $ist['etiket'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    .sayac-serit__kart {
        background: linear-gradient(120deg, var(--color-mutlusan-red-dark) 0%, var(--color-mutlusan-red) 45%, var(--color-mutlusan-red-light) 75%, var(--color-mutlusan-red) 100%);
        background-size: 220% 220%;
        animation: sayacZemin 12s ease-in-out infinite alternate;
        box-shadow: 0 18px 40px -18px rgba(110, 21, 38, 0.55);
    }

    /* Öğeler arası ince beyaz ayırıcılar */
    .sayac-serit__oge + .sayac-serit__oge::before {
        content: '';
        position: absolute;
        left: 0; top: 20%; bottom: 20%;
        width: 1px;
        background: linear-gradient(to bottom, transparent, rgba(255, 255, 255, 0.3), transparent);
    }
    @media (max-width: 1023px) {
        .sayac-serit__oge:nth-child(3)::before { display: none; }
        .sayac-serit__oge:nth-child(n+3) { border-top: 1px solid rgba(255, 255, 255, 0.14); }
    }

    /* ---- Hareketli arka plan ---- */
    .sayac-serit__arka { position: absolute; inset: 0; pointer-events: none; overflow: hidden; }
    .sayac-serit__leke {
        position: absolute;
        width: 40%; aspect-ratio: 1;
        border-radius: 9999px;
        filter: blur(40px);
    }
    .sayac-serit__leke--1 {
        background: radial-gradient(circle, rgba(255, 255, 255, 0.2), transparent 65%);
        top: -120%; left: -10%;
        animation: sayacLeke1 14s ease-in-out infinite alternate;
    }
    .sayac-serit__leke--2 {
        background: radial-gradient(circle, rgba(40, 8, 15, 0.35), transparent 65%);
        bottom: -130%; right: -5%;
        animation: sayacLeke2 18s ease-in-out infinite alternate;
    }
    /* Görseldeki gibi hafif çapraz ışık kırılmaları */
    .sayac-serit__cizgiler {
        position: absolute; inset: 0;
        background:
            linear-gradient(135deg, transparent 0 8%, rgba(255, 255, 255, 0.06) 8% 16%, transparent 16% 100%),
            linear-gradient(135deg, transparent 0 84%, rgba(255, 255, 255, 0.05) 84% 92%, transparent 92% 100%);
    }
    .sayac-serit__parlama {
        position: absolute; top: 0; bottom: 0; left: -30%;
        width: 25%;
        background: linear-gradient(100deg, transparent, rgba(255, 255, 255, 0.14), transparent);
        animation: sayacParlama 7s ease-in-out infinite;
        animation-delay: 2.5s;
    }
    @keyframes sayacZemin { from { background-position: 0% 50%; } to { background-position: 100% 50%; } }
    @keyframes sayacLeke1 { to { transform: translate(120%, 40%) scale(1.15); } }
    @keyframes sayacLeke2 { to { transform: translate(-110%, -35%) scale(0.9); } }
    @keyframes sayacParlama {
        0%   { transform: translateX(0); }
        35%  { transform: translateX(560%); }
        100% { transform: translateX(560%); }
    }

    /* ---- Giriş: öğeler sırayla belirir ---- */
    .sayac-serit__oge {
        opacity: 0;
        transform: translateY(10px);
        transition: opacity 0.6s ease, transform 0.7s cubic-bezier(0.22, 1, 0.36, 1);
        transition-delay: calc(var(--sira) * 120ms);
    }
    .sayac-serit--aktif .sayac-serit__oge { opacity: 1; transform: none; }

    /* ---- İkonlar çizilerek belirir ---- */
    .sayac-serit__ikon > * {
        stroke-dasharray: 1;
        stroke-dashoffset: 1;
        transition: stroke-dashoffset 1.4s cubic-bezier(0.65, 0, 0.35, 1);
        transition-delay: calc(var(--sira) * 120ms + 250ms);
    }
    .sayac-serit--aktif .sayac-serit__ikon > * { stroke-dashoffset: 0; }

    /* Üzerine gelince ikon hafifçe büyür */
    .sayac-serit__ikon { transition: transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1); }
    .sayac-serit__oge:hover .sayac-serit__ikon { transform: scale(1.1) rotate(-4deg); }

    @media (prefers-reduced-motion: reduce) {
        .sayac-serit__kart, .sayac-serit__leke, .sayac-serit__parlama { animation: none; }
        .sayac-serit__oge { opacity: 1; transform: none; transition: none; }
        .sayac-serit__ikon > * { stroke-dashoffset: 0; transition: none; }
    }
</style>

@push('scripts')
<script>
(function () {
    const serit = document.querySelector('.sayac-serit');
    if (!serit) return;

    const sayaclar = serit.querySelectorAll('[data-sayac]');
    const azHareket = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const sure = 2200;
    const easeInOut = (t) => (t < 0.5 ? 4 * t * t * t : 1 - Math.pow(-2 * t + 2, 3) / 2);

    function say(el, gecikme) {
        const hedef = parseInt(el.dataset.sayac, 10);
        if (azHareket) { el.textContent = hedef.toLocaleString('en-US'); return; }
        setTimeout(() => {
            const baslangic = performance.now();
            const adim = (simdi) => {
                const t = Math.min((simdi - baslangic) / sure, 1);
                el.textContent = Math.round(easeInOut(t) * hedef).toLocaleString('en-US');
                if (t < 1) requestAnimationFrame(adim);
            };
            requestAnimationFrame(adim);
        }, gecikme);
    }

    const gozlemci = new IntersectionObserver((girdiler) => {
        if (!girdiler[0].isIntersecting) return;
        serit.classList.add('sayac-serit--aktif');
        sayaclar.forEach((el, i) => say(el, i * 120));
        gozlemci.disconnect();
    }, { threshold: 0.4 });

    gozlemci.observe(serit);
})();
</script>
@endpush