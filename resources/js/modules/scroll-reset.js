/**
 * Sayfa yenilenince tarayıcının önceki scroll konumunu hatırlamasını engeller,
 * sayfa her zaman en üstten (hero video) başlar.
 */
export function initScrollReset() {
    if ('scrollRestoration' in history) {
        history.scrollRestoration = 'manual';
    }
    const toTop = () => window.scrollTo(0, 0);
    toTop();
    window.addEventListener('pageshow', toTop);
    window.addEventListener('load', toTop);
}
