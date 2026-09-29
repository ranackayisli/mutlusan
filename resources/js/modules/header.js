/**
 * Header davranışları:
 *  - Koyu bir bölümün ([data-dark-banner]) üzerindeyken şeffaf/beyaz, değilse beyaz/koyu yazı
 *  - Mobil menü aç/kapa
 *  - Arama paneli aç/kapa
 */
export function initHeader() {
    const header = document.querySelector('.site-header');
    if (!header) return;

    initHeaderTheme(header);
    initMobileMenu();
    initSearchPanel();
}

function initHeaderTheme(header) {
    const darkBanner = document.querySelector('[data-dark-banner]');

    const update = () => {
        const onDark = darkBanner
            ? darkBanner.getBoundingClientRect().bottom > header.offsetHeight
            : false;
        header.classList.toggle('site-header--on-dark', onDark);
    };

    window.addEventListener('scroll', update, { passive: true });
    window.addEventListener('resize', update, { passive: true });
    update();
}

function initMobileMenu() {
    const button = document.getElementById('mobile-menu-btn');
    const menu = document.getElementById('mobile-menu');
    if (!button || !menu) return;

    button.addEventListener('click', () => {
        const isOpen = menu.classList.toggle('hidden') === false;
        button.setAttribute('aria-expanded', String(isOpen));
    });
}

function initSearchPanel() {
    const toggle = document.querySelector('[data-search-toggle]');
    const panel = document.querySelector('[data-search-panel]');
    if (!toggle || !panel) return;

    toggle.addEventListener('click', () => {
        panel.hidden = !panel.hidden;
        toggle.setAttribute('aria-expanded', String(!panel.hidden));
        if (!panel.hidden) {
            panel.querySelector('input')?.focus();
        }
    });
}
