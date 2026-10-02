import { prefersReducedMotion } from './motion';

/**
 * Ana sayfa ürün çarkı.
 *
 * Kartlar, hafif yukarıdan bakılan bir elips üzerinde döner:
 *  - öndeki kart en büyük, en net ve en aşağıda
 *  - arkaya gittikçe kartlar belirgin şekilde küçülür, yukarı çıkar ve sisin içinde kalır
 *    (kart, arka plan rengine doğru soluklaşır; gölgesi de azalır)
 *  - bir kart öne gelirken yavaş yavaş büyür ve netleşir
 *
 * Dönüş yavaş ve akıcıdır; ekranın yenileme hızından (60/120 Hz) bağımsız aynı hızda çalışır.
 *
 * Kontroller: fare/parmakla sürükleme (bırakınca en yakın karta oturur), sağ-sol oklar,
 * klavyede ← →, trackpad ile sağa/sola kaydırma. Dikey kaydırma çarkı etkilemez.
 * Dokunmatik cihazlarda kendiliğinden yavaşça döner.
 */
const CONFIG = {
    radiusXRatio: 0.36,     // yatay yörünge: çark genişliğinin oranı
    radiusYRatio: 0.1,      // dikey yörünge (tepeden bakış hissi): çark yüksekliğinin oranı
    radiusYMax: 32,         // px
    bottomGap: 24,          // px, öndeki kartın altı ile alttaki ürün adı arasındaki boşluk
    minMeasurableCard: 80,  // px, kart bundan küçükse stil yüklenmemiş sayılır
    minScale: 0.45,         // en arkadaki kartın boyutu
    maxScale: 1.12,         // öndeki kartın boyutu
    falloff: 2.4,           // büyük = yan kartlar öndekine göre daha hızlı küçülüp silikleşir
    maxFog: 0.72,           // en arkadaki kartın üstündeki sis yoğunluğu (0 = yok, 1 = tamamen zemin rengi)
    sideTilt: 14,           // deg, yanlardaki kartların içe dönüşü
    viewTilt: -6,           // deg, kartların hafif öne eğimi
    easing: 0.035,          // dönüşün yumuşaklığı, 60 fps'e göre kare başına (küçük = daha yavaş ve akıcı)
    dragEasing: 0.2,        // sürüklerken çarkın elini ne kadar yakından takip edeceği
    dragSpeed: 0.4,
    wheelSpeed: 0.18,       // trackpad yatay kaydırmasının dönüşe etkisi
    autoSpeed: 0.1,         // deg / kare (60 fps'e göre)
    clickThreshold: 8,      // px, bundan fazla sürüklenirse tıklama sayılmaz
};

export function initProductWheel() {
    const wheel = document.querySelector('[data-product-wheel]');
    if (!wheel) return;

    const cards = Array.from(wheel.querySelectorAll('[data-wheel-card]'));
    if (!cards.length) return;

    const infoTitle = document.querySelector('[data-info-title]');
    const infoDesc = document.querySelector('[data-info-desc]');
    const angleStep = 360 / cards.length;
    const reduceMotion = prefersReducedMotion();

    const state = {
        target: 0,
        current: 0,
        autoRotate: window.matchMedia('(pointer: coarse)').matches,
        activeIndex: -1,
        radiusX: 0,
        radiusY: 0,
        shiftY: 0,
        dragging: false,
        dragStartX: 0,
        dragStartRotation: 0,
        dragMoved: 0,
        visible: true,
        frame: null,
        lastTime: null,
    };

    const measure = () => {
        const cardHeight = cards[0].offsetHeight;
        // Stil dosyası henüz yüklenmediyse kart gerçek boyutunda değildir; yanlış ölçüp çarkı
        // küçültmeyelim. Stil gelince kartın boyutu değişir ve aşağıdaki ResizeObserver tekrar ölçer.
        if (cardHeight < CONFIG.minMeasurableCard) return;

        // Çark yüksekliği öndeki (büyümüş) kartın boyundan hesaplanır; böylece üstte ve altta
        // gereksiz boşluk kalmaz ve başlık ile ürün adına olan mesafeler tam bilinir.
        const frontHeight = cardHeight * CONFIG.maxScale;
        const height = Math.round(frontHeight + CONFIG.bottomGap);
        wheel.style.height = `${height}px`;

        state.radiusX = wheel.clientWidth * CONFIG.radiusXRatio;
        state.radiusY = Math.min(height * CONFIG.radiusYRatio, CONFIG.radiusYMax);
        // Öndeki kartın üst kenarı çarkın üst kenarına otursun (kartlar çarkın ortasından başlar)
        state.shiftY = height / 2 + state.radiusY - frontHeight / 2;
    };

    const step = (direction) => {
        state.autoRotate = false;
        state.target += direction * angleStep;
    };

    // ---- Sürükleme ----
    const startDrag = (x) => {
        state.dragging = true;
        state.autoRotate = false;
        state.dragStartX = x;
        state.dragStartRotation = state.target;
        state.dragMoved = 0;
        wheel.classList.add('product-wheel--dragging');
    };
    const moveDrag = (x) => {
        if (!state.dragging) return;
        const delta = x - state.dragStartX;
        state.dragMoved = Math.abs(delta);
        state.target = state.dragStartRotation - delta * CONFIG.dragSpeed;
    };
    const endDrag = () => {
        if (!state.dragging) return;
        state.dragging = false;
        wheel.classList.remove('product-wheel--dragging');
        // Bırakınca en yakın kartın tam öne oturması için hedefi yuvarla; yavaşça kayarak yerleşir
        state.target = Math.round(state.target / angleStep) * angleStep;
    };

    wheel.addEventListener('mousedown', (e) => startDrag(e.clientX));
    wheel.addEventListener('mousemove', (e) => moveDrag(e.clientX));
    window.addEventListener('mouseup', endDrag);
    wheel.addEventListener('touchstart', (e) => e.touches[0] && startDrag(e.touches[0].clientX), { passive: true });
    wheel.addEventListener('touchmove', (e) => e.touches[0] && moveDrag(e.touches[0].clientX), { passive: true });
    wheel.addEventListener('touchend', endDrag);

    // Belirgin bir sürükleme olduysa, bırakınca kartın linkine gitmesin
    wheel.addEventListener('click', (e) => {
        if (state.dragMoved > CONFIG.clickThreshold) e.preventDefault();
    }, true);
    wheel.addEventListener('dragstart', (e) => e.preventDefault());

    // ---- Trackpad: sağa/sola kaydırma (dikey kaydırma sayfaya bırakılır) ----
    let wheelSettle;
    wheel.addEventListener('wheel', (e) => {
        if (Math.abs(e.deltaX) <= Math.abs(e.deltaY)) return;
        e.preventDefault(); // tarayıcının "geri/ileri sayfa" hareketini engelle
        state.autoRotate = false;
        state.target += e.deltaX * CONFIG.wheelSpeed;
        // Kaydırma durunca en yakın karta otur
        clearTimeout(wheelSettle);
        wheelSettle = setTimeout(() => {
            state.target = Math.round(state.target / angleStep) * angleStep;
        }, 140);
    }, { passive: false });

    // ---- Oklar ve klavye ----
    document.querySelector('[data-wheel-prev]')?.addEventListener('click', () => step(-1));
    document.querySelector('[data-wheel-next]')?.addEventListener('click', () => step(1));
    wheel.setAttribute('tabindex', '0');
    wheel.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft') { e.preventDefault(); step(-1); }
        if (e.key === 'ArrowRight') { e.preventDefault(); step(1); }
    });

    // ---- Çizim ----
    const render = (now = performance.now()) => {
        // Kare süresine göre hesapla: 60 Hz ve 120 Hz ekranlarda dönüş aynı hızda olsun
        const dt = state.lastTime === null ? 1 : Math.min((now - state.lastTime) / (1000 / 60), 3);
        state.lastTime = now;
        const ease = (rate) => 1 - Math.pow(1 - rate, dt);

        if (state.autoRotate && !reduceMotion) state.target += CONFIG.autoSpeed * dt;
        state.current += (state.target - state.current) * ease(state.dragging ? CONFIG.dragEasing : CONFIG.easing);

        let bestDepth = -Infinity;
        let bestIndex = 0;

        cards.forEach((card, i) => {
            const angle = (i * angleStep - state.current) * Math.PI / 180;
            const depth = Math.cos(angle);       // 1 = tam önde, -1 = tam arkada
            const nearness = (depth + 1) / 2;    // 0 = arkada, 1 = önde

            const x = Math.sin(angle) * state.radiusX;
            const y = depth * state.radiusY - state.shiftY;
            // Eğri: öndeki kart tam büyük, hemen yanındakiler belirgin küçük, arkadakiler en küçük
            const focus = Math.pow(nearness, CONFIG.falloff);
            const scale = CONFIG.minScale + (CONFIG.maxScale - CONFIG.minScale) * focus;
            const fog = (1 - focus) * CONFIG.maxFog;
            const tilt = -Math.sin(angle) * CONFIG.sideTilt;

            card.style.transform =
                `translate(-50%, -50%) translate(${x.toFixed(1)}px, ${y.toFixed(1)}px) ` +
                `scale(${scale.toFixed(3)}) rotateX(${CONFIG.viewTilt}deg) rotateY(${tilt.toFixed(2)}deg)`;
            card.style.setProperty('--fog', fog.toFixed(3));
            card.style.setProperty('--focus', focus.toFixed(3));
            card.style.zIndex = String(Math.round(nearness * 100));

            if (depth > bestDepth) {
                bestDepth = depth;
                bestIndex = i;
            }
        });

        if (bestIndex !== state.activeIndex) {
            state.activeIndex = bestIndex;
            cards.forEach((card, i) => {
                card.setAttribute('tabindex', i === bestIndex ? '0' : '-1');
                card.setAttribute('aria-hidden', i === bestIndex ? 'false' : 'true');
            });
            const active = cards[bestIndex];
            if (infoTitle) infoTitle.textContent = active.dataset.title;
            if (infoDesc) infoDesc.textContent = active.dataset.desc;
        }

        state.frame = state.visible ? requestAnimationFrame(render) : null;
    };

    // Çark ekranda değilken çizimi durdur (pil ve işlemci tasarrufu)
    new IntersectionObserver((entries) => {
        state.visible = entries[0].isIntersecting;
        if (state.visible && state.frame === null) {
            state.lastTime = null;
            state.frame = requestAnimationFrame(render);
        }
    }).observe(wheel);

    window.addEventListener('resize', measure, { passive: true });
    window.addEventListener('load', measure);
    // Kartın boyutu değişince (stil geç yüklendi, ekran döndü, yazı tipi değişti) yeniden ölç
    if ('ResizeObserver' in window) new ResizeObserver(measure).observe(cards[0]);
    measure();
    state.frame = requestAnimationFrame(render);
}
