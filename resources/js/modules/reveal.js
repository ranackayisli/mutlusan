import { prefersReducedMotion } from './motion';

/**
 * Scroll'da belirme: bölümler ekrana girerken yumuşakça aşağıdan yukarı kayarak belirir.
 * Bölümün içindeki kartlar (grid öğeleri ve [data-reveal-item]) ise sırayla, kısa aralıklarla gelir.
 *
 * [data-no-reveal] işaretli bölümler hariç (hero, banner'lar ve kendi animasyonu olan bölümler).
 * [data-no-reveal-items] işaretli bir kapsayıcının içindeki kartlar sırayla gelme efektine katılmaz.
 */
const STAGGER_MS = 90;
const MAX_STAGGER_ITEMS = 8; // çok kartlı listelerde son kartlar fazla beklemesin

export function initReveal() {
    if (prefersReducedMotion()) return;

    const sections = document.querySelectorAll(
        'main > section:not([data-no-reveal]), main > div > section:not([data-no-reveal])'
    );
    if (!sections.length) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;
            entry.target.classList.add('is-visible');
            observer.unobserve(entry.target);
        });
    }, { threshold: 0.12, rootMargin: '0px 0px -8% 0px' });

    sections.forEach((section) => {
        section.classList.add('reveal');

        // Kendi animasyonu olan öğeler (ör. şalt ürün kartları) hariç
        const items = Array.from(section.querySelectorAll('.grid > *, [data-reveal-item]'))
            .filter((item) => !item.closest('[data-no-reveal-items]'));
        items.forEach((item, i) => {
            item.classList.add('reveal-item');
            item.style.setProperty('--reveal-delay', `${150 + Math.min(i, MAX_STAGGER_ITEMS) * STAGGER_MS}ms`);
        });

        observer.observe(section);
    });
}
