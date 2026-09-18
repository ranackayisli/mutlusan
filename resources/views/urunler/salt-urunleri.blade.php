@extends('layouts.app')

@section('title', 'Şalt Ürünleri | Mutlusan Electric')
@section('description', 'Otomatik sigortalar, kaçak akım koruma röleleri, kontaktörler, termik röleler ve motor koruma şalterleri.')

@section('content')

    {{-- Banner görseli - "Şalt Grubu" başlığı zaten görselin içinde --}}
    <section class="relative w-full pt-24" data-no-reveal>
        <img src="{{ asset('images/salt-urunleri-banner.jpg') }}" alt="{{ $kategori->name }}"
             class="w-full h-[220px] sm:h-[300px] lg:h-[360px] object-cover">
    </section>

    {{-- Breadcrumb + açıklama --}}
    <section class="pt-8 pb-14 px-6 bg-white">
        <div class="max-w-4xl">
            <div class="text-mutlusan-gray text-sm mb-5">
                <a href="{{ url('/') }}" class="hover:text-mutlusan-red transition-colors">Ana Sayfa</a>
                <span class="mx-2">/</span>
                <a href="{{ url('/urunler') }}" class="hover:text-mutlusan-red transition-colors">Ürünler</a>
                <span class="mx-2">/</span>
                <span class="text-mutlusan-gray-dark font-medium">{{ $kategori->name }}</span>
            </div>

            <h1 class="sr-only">{{ $kategori->name }}</h1>

            <p class="text-mutlusan-gray text-lg leading-relaxed max-w-3xl">
                {{ $kategori->description }}
            </p>
        </div>
    </section>

    {{-- Alt kategori sekmeleri + animasyonlu ürün paneli --}}
    <section class="py-14 px-6 bg-mutlusan-gray-light" data-salt-section>
        <div class="max-w-7xl mx-auto">

            {{-- Sekme butonları --}}
            <div class="flex flex-wrap gap-3 mb-10" data-salt-tabs>
                @foreach ($kategori->children as $i => $altKategori)
                    <button type="button"
                            class="salt-tab {{ $i === 0 ? 'salt-tab--active' : '' }}"
                            data-salt-tab
                            data-target="salt-panel-{{ $i }}">
                        {{ $altKategori->name }}
                        <span class="salt-tab__count">{{ $altKategori->products->count() }}</span>
                    </button>
                @endforeach
            </div>

            {{-- Ürün panelleri --}}
            <div class="relative" data-salt-panels>
                @foreach ($kategori->children as $i => $altKategori)
                    <div id="salt-panel-{{ $i }}" class="salt-panel {{ $i === 0 ? 'salt-panel--active' : '' }}" data-salt-panel>
                        <div class="salt-pole-filter" data-salt-pole-filter></div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4" data-salt-grid>
                            @foreach ($altKategori->products as $urun)
                                <div class="salt-card" data-salt-card data-kutup="{{ $urun->pole }}">
                                    <div class="salt-card__code">{{ $urun->code }}</div>
                                    @if (!empty($urun->pole))
                                        <div class="salt-card__pole">{{ $urun->pole }}</div>
                                    @endif
                                    <div class="salt-card__desc">{{ $urun->description }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection

@push('scripts')
<script>
(function () {
    const tabs = document.querySelectorAll('[data-salt-tab]');
    const panels = document.querySelectorAll('[data-salt-panel]');

    // Doğal sıralama: 1P, 2P, 3P, 4P önce; sonra geri kalanı alfabetik
    function poleSortKey(v) {
        const m = v.match(/^(\d+)P$/);
        return m ? [0, parseInt(m[1], 10)] : [1, v];
    }

    // Görünen kartları kademeli (staggered) bir animasyonla belirt
    function staggerReveal(cards) {
        let visibleIndex = 0;
        cards.forEach((card) => {
            card.classList.remove('salt-card--in');
            if (card.style.display === 'none') return;
            card.style.animationDelay = (Math.min(visibleIndex, 24) * 28) + 'ms';
            // reflow zorla, animasyon her seferinde yeniden tetiklensin
            void card.offsetWidth;
            card.classList.add('salt-card--in');
            visibleIndex++;
        });
    }

    // Her panel için kutup filtresi kur (birden fazla kutup çeşidi varsa)
    function setupPoleFilter(panel) {
        const grid = panel.querySelector('[data-salt-grid]');
        const filterWrap = panel.querySelector('[data-salt-pole-filter]');
        const cards = Array.from(grid.querySelectorAll('[data-salt-card]'));

        const poles = [...new Set(cards.map(c => c.dataset.kutup).filter(Boolean))];
        if (poles.length <= 1) {
            staggerReveal(cards);
            return;
        }
        poles.sort((a, b) => {
            const ka = poleSortKey(a), kb = poleSortKey(b);
            if (ka[0] !== kb[0]) return ka[0] - kb[0];
            return ka[1] > kb[1] ? 1 : ka[1] < kb[1] ? -1 : 0;
        });

        filterWrap.innerHTML = '';
        const allBtn = document.createElement('button');
        allBtn.type = 'button';
        allBtn.className = 'salt-pole-pill salt-pole-pill--active';
        allBtn.textContent = 'Tümü';
        allBtn.dataset.pole = '__all__';
        filterWrap.appendChild(allBtn);

        poles.forEach((pole) => {
            const count = cards.filter(c => c.dataset.kutup === pole).length;
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'salt-pole-pill';
            btn.dataset.pole = pole;
            btn.innerHTML = pole + ' <span>' + count + '</span>';
            filterWrap.appendChild(btn);
        });

        filterWrap.querySelectorAll('.salt-pole-pill').forEach((pill) => {
            pill.addEventListener('click', () => {
                filterWrap.querySelectorAll('.salt-pole-pill').forEach(p => p.classList.remove('salt-pole-pill--active'));
                pill.classList.add('salt-pole-pill--active');

                const chosen = pill.dataset.pole;
                cards.forEach((card) => {
                    const match = chosen === '__all__' || card.dataset.kutup === chosen;
                    card.style.display = match ? '' : 'none';
                });
                staggerReveal(cards);
            });
        });

        staggerReveal(cards);
    }

    panels.forEach(setupPoleFilter);

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const targetId = tab.dataset.target;

            tabs.forEach(t => t.classList.remove('salt-tab--active'));
            tab.classList.add('salt-tab--active');

            panels.forEach(p => {
                if (p.id === targetId) {
                    p.classList.add('salt-panel--active');
                    const cards = Array.from(p.querySelectorAll('[data-salt-card]'));
                    staggerReveal(cards);
                } else {
                    p.classList.remove('salt-panel--active');
                }
            });

            const panelsWrap = document.querySelector('[data-salt-panels]');
            if (panelsWrap) {
                const rect = panelsWrap.getBoundingClientRect();
                if (rect.top < 80) {
                    window.scrollTo({ top: window.scrollY + rect.top - 100, behavior: 'smooth' });
                }
            }
        });
    });
})();
</script>
@endpush
