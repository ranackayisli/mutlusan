import { easeInOutCubic, onFirstVisible, prefersReducedMotion } from './motion';

const COUNT_DURATION_MS = 2200;
const STAGGER_MS = 120;

/**
 * İstatistik şeridi: bölüm ekrana girince öğeler sırayla belirir,
 * ikonlar çizilir ve rakamlar 0'dan hedefe sayar.
 */
export function initStatsStrip() {
    const strip = document.querySelector('[data-stats-strip]');
    if (!strip) return;

    const counters = strip.querySelectorAll('[data-count-to]');

    // HTML'de gerçek değerler yazılı (JS kapalıysa ve arama motorları için).
    // Animasyon açıksa, bölüm görünene kadar 0'dan başlat.
    if (!prefersReducedMotion()) {
        counters.forEach((el) => { el.textContent = '0'; });
    }

    // Giriş animasyonunun başlangıç durumu (gizli öğeler) sadece JS çalışınca uygulanır
    strip.classList.add('stats-strip--ready');

    onFirstVisible(strip, () => {
        strip.classList.add('stats-strip--active');
        counters.forEach((el, i) => {
            countUp(el, i * STAGGER_MS);
        });
    }, 0.4);
}

/**
 * Bir öğenin metnini 0'dan data-count-to değerine kadar sayarak günceller.
 * @param {HTMLElement} el
 * @param {number} delay Başlamadan önce beklenecek süre (ms)
 */
export function countUp(el, delay = 0) {
    const target = parseInt(el.dataset.countTo, 10);
    const format = (n) => n.toLocaleString('en-US');

    if (Number.isNaN(target)) return;
    if (prefersReducedMotion()) {
        el.textContent = format(target);
        return;
    }

    setTimeout(() => {
        const start = performance.now();
        const step = (now) => {
            const t = Math.min((now - start) / COUNT_DURATION_MS, 1);
            el.textContent = format(Math.round(easeInOutCubic(t) * target));
            if (t < 1) requestAnimationFrame(step);
        };
        requestAnimationFrame(step);
    }, delay);
}
