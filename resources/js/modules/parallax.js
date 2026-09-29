import { prefersReducedMotion } from './motion';

/** Hero videoda hafif parallax: sayfa kaydırılırken video biraz daha yavaş hareket eder. */
export function initParallax() {
    const video = document.querySelector('[data-parallax-video]');
    if (!video || prefersReducedMotion()) return;

    let ticking = false;
    const apply = () => {
        ticking = false;
        const offset = Math.min(window.scrollY * 0.35, 220);
        video.style.transform = `translateY(${offset}px) scale(1.08)`;
    };

    window.addEventListener('scroll', () => {
        if (!ticking) {
            ticking = true;
            requestAnimationFrame(apply);
        }
    }, { passive: true });
    apply();
}
