@php
    $urunGruplari = [
        ['ad' => 'Switchgear', 'slug' => 'salt-grubu', 'gorsel' => 'salt-grubu.jpg', 'aciklama' => 'High-security circuit breakers and fuse groups.'],
        ['ad' => 'Switches & Sockets', 'slug' => 'anahtar-priz', 'gorsel' => 'anahtar-priz.jpg', 'aciklama' => 'Stylish, durable electrical connection points.'],
        ['ad' => 'Cable Trunking', 'slug' => 'kablo-kanallari', 'gorsel' => 'kablo-kanallari.jpg', 'aciklama' => 'Neat, safe and aesthetic cable management solutions.'],
        ['ad' => 'DIN Rail Terminals', 'slug' => 'ray-klemens', 'gorsel' => 'ray-klemens.jpg', 'aciklama' => 'DIN rail compatible screw and Push-In connection terminals.'],
        ['ad' => 'Plugs & Sockets', 'slug' => 'fis-priz', 'gorsel' => 'fis-priz.jpg', 'aciklama' => 'Practical and safe power solutions for everyday use.'],
        ['ad' => 'Mutlusan Chargebox', 'slug' => 'mutlusan-chargebox', 'gorsel' => 'chargebox.jpg', 'aciklama' => 'Smart home-type EV charging station.'],
        ['ad' => 'Smart Home Systems', 'slug' => 'akilli-ev-sistemleri', 'gorsel' => 'akilli-ev.jpg', 'aciklama' => 'KNX-based, connected and comfortable living technology.'],
    ];
@endphp

<section id="urunler" class="pt-8 pb-16 sm:pt-10 sm:pb-20 relative overflow-hidden bg-mutlusan-gray-light">

    <div class="relative max-w-7xl mx-auto px-6 text-center mb-10">
        <span class="text-mutlusan-red text-sm font-semibold tracking-wide">Product Groups</span>
        <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-bold text-mutlusan-gray-dark mt-3">
            Whatever You Need
        </h2>
    </div>

    <div class="product-wheel-wrap relative flex items-center gap-4 sm:gap-6 max-w-7xl mx-auto px-4 sm:px-6">
        <button type="button" class="product-carousel__arrow product-carousel__arrow--prev" data-wheel-prev aria-label="Previous product">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg>
        </button>

        <div class="product-wheel relative" data-product-wheel>
            @foreach ($urunGruplari as $i => $grup)
                <a href="{{ url('/urunler/' . $grup['slug']) }}"
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

        <button type="button" class="product-carousel__arrow product-carousel__arrow--next" data-wheel-next aria-label="Next product">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18l6-6-6-6"/></svg>
        </button>
    </div>

    <div class="product-carousel__info relative text-center mt-6" data-carousel-info>
        <h3 data-info-title class="text-xl font-display font-bold text-mutlusan-gray-dark">{{ $urunGruplari[0]['ad'] }}</h3>
        <p data-info-desc class="text-mutlusan-gray text-sm mt-1">{{ $urunGruplari[0]['aciklama'] }}</p>
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
    let autoRotate = isTouch;
    let activeIndex = -1;
    let radiusX = 0;

    let isDragging = false;
    let dragStartX = 0;
    let dragStartRotation = 0;
    let dragMoved = 0;

    function measure() {
        radiusX = wheel.clientWidth * 0.36;
    }

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
        currentRotation = targetRotation;
    }
    function endDrag() {
        if (!isDragging) return;
        isDragging = false;
        wheel.classList.remove('product-wheel--dragging');
    }

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
            const depth = Math.cos(angleRad);
            const norm = (depth + 1) / 2;
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
