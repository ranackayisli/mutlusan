import { prefersReducedMotion } from './motion';

/**
 * Ana sayfa ürün çarkı.
 *
 * Kartlar, hafif yukarıdan bakılan bir elips üzerinde döner:
 *  - öndeki kart en büyük, en net ve en aşağıda
 *  - arkaya gittikçe kartlar küçülür, yukarı çıkar, soluklaşır ve bulanıklaşır
 *
 * Kontroller: fare/parmakla sürükleme, sağ-sol oklar, klavyede ← →.
 * Dokunmatik cihazlarda kendiliğinden yavaşça döner.
 */
const CONFIG = {
    radiusXRatio: 0.36,     // yatay yörünge: çark genişliğinin oranı
    radiusYRatio: 0.1,      // dikey yörünge (tepeden bakış hissi): çark yüksekliğinin oranı
    radiusYMax: 32,         // px
    minScale: 0.55,         // en arkadaki kartın boyutu
    minOpacity: 0.45,
    maxBlur: 5,             // px, en arkadaki kartın bulanıklığı
    sideTilt: 14,           // deg, yanlardaki kartların içe dönüşü
    viewTilt: -6,           // deg, kartların hafif öne eğimi
    easing: 0.07,           // dönüşün yumuşaklığı (küçük = daha yumuşak)
    dragSpeed: 0.4,
    autoSpeed: 0.15,        // deg / kare
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
        dragging: false,
        dragStartX: 0,
        dragStartRotation: 0,
        dragMoved: 0,
        visible: true,
        frame: null,
    };

    const measure = () => {
        state.radiusX = wheel.clientWidth * CONFIG.radiusXRatio;
        state.radiusY = Math.min(wheel.clientHeight * CONFIG.radiusYRatio, CONFIG.radiusYMax);
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
        state.dragStartRotation = state.current;
        state.dragMoved = 0;
        wheel.classList.add('product-wheel--dragging');
    };
    const moveDrag = (x) => {
        if (!state.dragging) return;
        const delta = x - state.dragStartX;
        state.dragMoved = Math.abs(delta);
        state.target = state.dragStartRotation - delta * CONFIG.dragSpeed;
        state.current = state.target; // sürüklerken gecikmesiz, elin altında dönsün
    };
    const endDrag = () => {
        if (!state.dragging) return;
        state.dragging = false;
        wheel.classList.remove('product-wheel--dragging');
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

    // ---- Oklar ve klavye ----
    document.querySelector('[data-wheel-prev]')?.addEventListener('click', () => step(-1));
    document.querySelector('[data-wheel-next]')?.addEventListener('click', () => step(1));
    wheel.setAttribute('tabindex', '0');
    wheel.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft') { e.preventDefault(); step(-1); }
        if (e.key === 'ArrowRight') { e.preventDefault(); step(1); }
    });

    // ---- Çizim ----
    const render = () => {
        if (state.autoRotate && !reduceMotion) state.target += CONFIG.autoSpeed;
        state.current += (state.target - state.current) * CONFIG.easing;

        let bestDepth = -Infinity;
        let bestIndex = 0;

        cards.forEach((card, i) => {
            const angle = (i * angleStep - state.current) * Math.PI / 180;
            const depth = Math.cos(angle);       // 1 = tam önde, -1 = tam arkada
            const nearness = (depth + 1) / 2;    // 0 = arkada, 1 = önde

            const x = Math.sin(angle) * state.radiusX;
            const y = depth * state.radiusY;
            const scale = CONFIG.minScale + (1 - CONFIG.minScale) * nearness;
            const opacity = CONFIG.minOpacity + (1 - CONFIG.minOpacity) * nearness;
            const blur = (1 - nearness) * CONFIG.maxBlur;
            const tilt = -Math.sin(angle) * CONFIG.sideTilt;

            card.style.transform =
                `translate(-50%, -50%) translate(${x.toFixed(1)}px, ${y.toFixed(1)}px) ` +
                `scale(${scale.toFixed(3)}) rotateX(${CONFIG.viewTilt}deg) rotateY(${tilt.toFixed(2)}deg)`;
            card.style.opacity = opacity.toFixed(3);
            card.style.filter = blur > 0.25 ? `blur(${blur.toFixed(1)}px)` : 'none';
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
        if (state.visible && state.frame === null) state.frame = requestAnimationFrame(render);
    }).observe(wheel);

    window.addEventListener('resize', measure, { passive: true });
    measure();
    state.frame = requestAnimationFrame(render);
}
