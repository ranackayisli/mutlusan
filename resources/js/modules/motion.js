/** Kullanıcı işletim sisteminde "hareketi azalt" ayarını açtıysa true döner. */
export const prefersReducedMotion = () =>
    window.matchMedia('(prefers-reduced-motion: reduce)').matches;

/** Yavaş başlayıp hızlanan, sonra yavaşlayarak biten yumuşak geçiş eğrisi. */
export const easeInOutCubic = (t) =>
    t < 0.5 ? 4 * t * t * t : 1 - Math.pow(-2 * t + 2, 3) / 2;

/**
 * Bir öğe ekrana ilk girdiğinde callback'i bir kez çalıştırır.
 * @param {Element} el
 * @param {() => void} callback
 * @param {number} threshold Öğenin ne kadarı görünür olunca tetiklensin (0–1)
 */
export function onFirstVisible(el, callback, threshold = 0.3) {
    const observer = new IntersectionObserver((entries) => {
        if (entries.some((entry) => entry.isIntersecting)) {
            observer.disconnect();
            callback();
        }
    }, { threshold });
    observer.observe(el);
}
