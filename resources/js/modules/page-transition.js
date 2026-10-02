/**
 * Sayfa geçişi.
 *
 * Link tıklanınca eski sayfa, yenisi hazır olana kadar ekranda KALIR (tarayıcının doğal davranışı);
 * sayfayı boşaltıp beklemeyiz. Yumuşak geçişi CSS yapar (@view-transition, base.css).
 *
 * Geçiş hızlıysa kullanıcı hiçbir şey görmez. Yavaşsa (bağlantı ya da sunucu yavaşsa)
 * ekranın üstünde ince bir kırmızı ilerleme çizgisi belirir; böylece sayfa donmuş gibi durmaz.
 * Dış linkler, yeni sekmede açılanlar, mailto/tel ve sayfa içi (#) linkler etkilenmez.
 */
const SHOW_AFTER_MS = 350;   // bundan hızlı geçişlerde çizgi hiç görünmez (titreme olmasın)
const GIVE_UP_MS = 20000;    // gidilemezse (iptal, hata) çizgi kendiliğinden kaybolsun

export function initPageTransition() {
    const bar = document.createElement('div');
    bar.className = 'nav-progress';
    bar.setAttribute('aria-hidden', 'true');
    document.body.appendChild(bar);

    let showTimer;
    let giveUpTimer;

    const start = () => {
        clearTimeout(showTimer);
        clearTimeout(giveUpTimer);
        showTimer = setTimeout(() => bar.classList.add('nav-progress--active'), SHOW_AFTER_MS);
        giveUpTimer = setTimeout(reset, GIVE_UP_MS);
    };
    const reset = () => {
        clearTimeout(showTimer);
        clearTimeout(giveUpTimer);
        bar.classList.remove('nav-progress--active');
    };

    document.addEventListener('click', (event) => {
        const link = event.target.closest('a[href]');
        if (link && isInternalNavigation(link, event)) start();
    });

    // Geri tuşuyla önbellekten dönülünce çizgi açık kalmasın
    window.addEventListener('pageshow', reset);
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
