import { onFirstVisible, prefersReducedMotion } from './motion';
import { countUp } from './stats-strip';

/**
 * "Global Reach" bölümü: harita ekrana girince bağlantı çizgileri çizilir, noktalar belirip
 * nabız gibi atar, ışık noktaları çizgiler boyunca akar ve sağdaki rakamlar sayar.
 * Animasyonların kendisi CSS/SVG ile yapılır (sections/global-network.css); burada sadece
 * "ne zaman başlasın" kararı verilir.
 */
export function initGlobalNetwork() {
    const root = document.querySelector('[data-global-network]');
    if (!root) return;

    const counters = root.querySelectorAll('[data-count-to]');

    // Gizli başlangıç durumları sadece JS varken uygulanır; JS yoksa harita eksiksiz görünür
    root.classList.add('gn--ready');
    if (!prefersReducedMotion()) {
        counters.forEach((el) => { el.textContent = '0'; });
    }

    onFirstVisible(root, () => {
        root.classList.add('gn--active');
        counters.forEach((el, i) => countUp(el, 500 + i * 200));
    }, 0.3);
}
