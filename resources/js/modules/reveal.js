/**
 * Scroll'da belirme efekti: bölümler ekrana girerken sırayla soldan / sağdan /
 * alttan / üstten kayarak belirir. [data-no-reveal] işaretli bölümler hariç tutulur
 * (hero ve kendi giriş animasyonu olan bölümler).
 */
const DIRECTIONS = ['reveal--left', 'reveal--right', 'reveal--up', 'reveal--down'];

export function initReveal() {
    const targets = document.querySelectorAll(
        'main > section:not([data-no-reveal]), main > div > section:not([data-no-reveal])'
    );
    if (!targets.length) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.15 });

    targets.forEach((el, i) => {
        el.classList.add('reveal', DIRECTIONS[i % DIRECTIONS.length]);
        observer.observe(el);
    });
}
