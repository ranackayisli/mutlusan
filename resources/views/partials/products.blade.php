@php
    $urunGruplari = [
        ['ad' => 'Şalt Grubu', 'gorsel' => 'salt-grubu.jpg', 'aciklama' => 'Yüksek güvenlikli devre kesiciler ve sigorta grupları.'],
        ['ad' => 'Anahtar Priz', 'gorsel' => 'anahtar-priz.jpg', 'aciklama' => 'Şık tasarım, dayanıklı elektrik bağlantı noktaları.'],
        ['ad' => 'Kablo Kanalları', 'gorsel' => 'kablo-kanallari.jpg', 'aciklama' => 'Düzenli, güvenli ve estetik kablo tesisatı çözümleri.'],
        ['ad' => 'Ray Klemens', 'gorsel' => 'ray-klemens.jpg', 'aciklama' => 'DIN ray uyumlu vidalı ve Push-In bağlantı terminalleri.'],
        ['ad' => 'Fiş Priz', 'gorsel' => 'fis-priz.jpg', 'aciklama' => 'Çoklu kullanım için pratik ve güvenli güç çözümleri.'],
        ['ad' => 'Mutlusan Chargebox', 'gorsel' => 'chargebox.jpg', 'aciklama' => 'Elektrikli araçlar için akıllı ev tipi şarj istasyonu.'],
        ['ad' => 'Akıllı Ev Sistemleri', 'gorsel' => 'akilli-ev.jpg', 'aciklama' => 'KNX tabanlı, bağlantılı ve konforlu yaşam teknolojileri.'],
    ];
@endphp

<section id="urunler" class="urunler-section py-16 sm:py-20 relative overflow-hidden">
    <div class="urunler-section__fade"></div>

    <div class="relative max-w-7xl mx-auto px-6 text-center mb-10">
        <span class="text-mutlusan-red text-sm font-semibold tracking-wide">Ürün Grupları</span>
        <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-bold text-mutlusan-gray-dark mt-3">
            Neye ihtiyacınız olursa olsun
        </h2>
    </div>

    <div class="product-wheel-wrap relative flex items-center gap-4 sm:gap-6 max-w-7xl mx-auto px-4 sm:px-6">
        <button type="button" class="product-carousel__arrow product-carousel__arrow--prev" data-wheel-prev aria-label="Önceki ürün">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg>
        </button>

        <div class="product-wheel relative" data-product-wheel>
            @foreach ($urunGruplari as $i => $grup)
                <a href="{{ url('/urunler/' . \Illuminate\Support\Str::slug($grup['ad'])) }}"
                   class="product-wheel__card"
                   data-wheel-card
                   data-index="{{ $i }}"
                   data-title="{{ $grup['ad'] }}"
                   data-desc="{{ $grup['aciklama'] }}">
                    <img src="{{ asset('images/urunler/' . $grup['gorsel']) }}" alt="{{ $grup['ad'] }}"
                         onerror="this.src='{{ asset('images/urunler/placeholder.jpg') }}'">
                </a>
            @endforeach
        </div>

        <button type="button" class="product-carousel__arrow product-carousel__arrow--next" data-wheel-next aria-label="Sonraki ürün">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18l6-6-6-6"/></svg>
        </button>
    </div>

    <div class="product-carousel__info relative" data-carousel-info>
        <h3 data-info-title>{{ $urunGruplari[0]['ad'] }}</h3>
        <p data-info-desc>{{ $urunGruplari[0]['aciklama'] }}</p>
    </div>
</section>

@push('scripts')
<script>
(function () {
    const wheel = document.querySelector('[data-product-wheel]');
    if (!wheel) return;

    const cards = Array.from(document.querySelectorAll('[data-wheel-card]'));
    const infoTitle = document.querySelector('[data-info-title]');
    const infoDesc = document.querySelector('[data-info-desc]');
    const N = cards.length;
    const angleStep = 360 / N;
    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const isTouch = window.matchMedia('(pointer: coarse)').matches;

    let targetRotation = 0;
    let currentRotation = 0;
    let autoRotate = isTouch; // dokunmatikte fare olmadığı için kendiliğinden yavaşça dönsün
    let activeIndex = -1;
    let radiusX = 0;

    let isDragging = false;
    let dragStartX = 0;
    let dragStartRotation = 0;
    let dragMoved = 0;

    function measure() {
        radiusX = wheel.clientWidth * 0.36;
    }

    // Tıklayıp sürükleyince: doğrudan sürükleme mesafesine göre çevir
    function startDrag(clientX) {
        isDragging = true;
        autoRotate = false;
        dragStartX = clientX;
        dragStartRotation = currentRotation;
        dragMoved = 0;
        wheel.classList.add('product-wheel--dragging');
    }
    function duringDrag(clientX) {
        if (!isDragging) return;
        const deltaX = clientX - dragStartX;
        dragMoved = Math.abs(deltaX);
        targetRotation = dragStartRotation - deltaX * 0.4;
        currentRotation = targetRotation; // sürüklerken gecikmesiz, elin altında dönsün
    }
    function endDrag() {
        if (!isDragging) return;
        isDragging = false;
        wheel.classList.remove('product-wheel--dragging');
    }

    // Belirgin bir sürükleme olduysa, bırakınca kartın linkine gitmesin
    wheel.addEventListener('click', (e) => {
        if (dragMoved > 8) {
            e.preventDefault();
        }
    }, true);

    wheel.addEventListener('mousemove', (e) => {
        if (isDragging) duringDrag(e.clientX);
    });
    wheel.addEventListener('mousedown', (e) => startDrag(e.clientX));
    window.addEventListener('mouseup', endDrag);

    wheel.addEventListener('touchstart', (e) => {
        if (e.touches[0]) startDrag(e.touches[0].clientX);
    }, { passive: true });
    wheel.addEventListener('touchmove', (e) => {
        if (e.touches[0]) duringDrag(e.touches[0].clientX);
    }, { passive: true });
    wheel.addEventListener('touchend', endDrag);

    // Sağ-sol ok butonları: bir sonraki/önceki ürüne dönsün
    const prevBtn = document.querySelector('[data-wheel-prev]');
    const nextBtn = document.querySelector('[data-wheel-next]');
    if (prevBtn) prevBtn.addEventListener('click', () => {
        autoRotate = false;
        targetRotation -= angleStep;
    });
    if (nextBtn) nextBtn.addEventListener('click', () => {
        autoRotate = false;
        targetRotation += angleStep;
    });

    function render() {
        if (autoRotate && !reduceMotion) {
            targetRotation += 0.15;
        }
        currentRotation += (targetRotation - currentRotation) * 0.07;

        let bestDepth = -Infinity;
        let bestIndex = 0;

        cards.forEach((card, i) => {
            const angleDeg = i * angleStep - currentRotation;
            const angleRad = angleDeg * Math.PI / 180;
            const x = Math.sin(angleRad) * radiusX;
            const depth = Math.cos(angleRad); // 1 = tam önde, -1 = tam arkada
            const norm = (depth + 1) / 2; // 0..1
            const scale = 0.62 + 0.42 * norm;
            const opacity = 0.4 + 0.6 * norm;
            const z = Math.round(norm * 100);

            card.style.transform = 'translate(-50%, -50%) translateX(' + x.toFixed(1) + 'px) scale(' + scale.toFixed(3) + ')';
            card.style.opacity = opacity.toFixed(3);
            card.style.zIndex = String(z);

            if (depth > bestDepth) {
                bestDepth = depth;
                bestIndex = i;
            }
        });

        if (bestIndex !== activeIndex) {
            activeIndex = bestIndex;
            const card = cards[activeIndex];
            if (infoTitle) infoTitle.textContent = card.dataset.title;
            if (infoDesc) infoDesc.textContent = card.dataset.desc;
        }

        requestAnimationFrame(render);
    }

    window.addEventListener('resize', measure, { passive: true });
    measure();
    requestAnimationFrame(render);
})();
</script>
@endpush
