/**
 * Sayfa geçişleri: site içi bir linke tıklanınca sayfa yumuşakça kararır, sonra gidilir.
 * Dış linkler, yeni sekmede açılanlar, mailto/tel ve sayfa içi (#) linkler etkilenmez.
 */
const FADE_MS = 280;

export function initPageTransition() {
    document.body.classList.add('page-transition');
    requestAnimationFrame(() => document.body.classList.add('page-transition--in'));

    document.addEventListener('click', (event) => {
        const link = event.target.closest('a[href]');
        if (!link || !isInternalNavigation(link, event)) return;

        event.preventDefault();
        document.body.classList.remove('page-transition--in');
        document.body.classList.add('page-transition--out');
        setTimeout(() => { window.location.href = link.href; }, FADE_MS);
    });

    // Geri tuşuyla dönülünce sayfa kararmış halde kalmasın
    window.addEventListener('pageshow', (event) => {
        if (event.persisted) {
            document.body.classList.remove('page-transition--out');
            document.body.classList.add('page-transition--in');
        }
    });
}

function isInternalNavigation(link, event) {
    if (event.defaultPrevented) return false;
    if (event.button !== 0 || event.metaKey || event.ctrlKey || event.shiftKey || event.altKey) return false;
    if (link.target === '_blank' || link.hasAttribute('download')) return false;

    const raw = link.getAttribute('href');
    if (!raw || raw.startsWith('#') || raw.startsWith('mailto:') || raw.startsWith('tel:')) return false;

    const url = new URL(link.href, window.location.href);
    if (url.origin !== window.location.origin) return false;

    // Aynı sayfada sadece #bölüm değişiyorsa geçiş efekti yapma
    const samePage = url.pathname === window.location.pathname && url.search === window.location.search;
    return !(samePage && url.hash);
}
