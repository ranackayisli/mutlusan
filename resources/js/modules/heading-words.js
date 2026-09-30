import { prefersReducedMotion } from './motion';

/**
 * Büyük başlıklar (h1, h2) ekrana girince kelime kelime, alttan yukarı kayarak belirir.
 *
 * Başlığın içindeki her kelime iki span'a sarılır: dıştaki taşmayı gizler (maske),
 * içteki aşağıdan yukarı kayar. Başlıktaki renkli <span> gibi iç öğeler korunur.
 * Hero başlığı (kendi giriş animasyonu var) ve [data-no-word-reveal] işaretliler hariç.
 */
const WORD_STAGGER_MS = 70;

export function initHeadingWords() {
    if (prefersReducedMotion()) return;

    const headings = Array.from(document.querySelectorAll('main h1, main h2')).filter((h) =>
        !h.classList.contains('sr-only') &&
        !h.classList.contains('hero-enter') &&
        !h.closest('[data-no-word-reveal]') &&
        h.textContent.trim().length > 0
    );
    if (!headings.length) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;
            entry.target.classList.add('word-reveal--in');
            observer.unobserve(entry.target);
        });
    }, { threshold: 0.5 });

    headings.forEach((heading) => {
        const count = splitIntoWords(heading);
        if (!count) return;
        heading.classList.add('word-reveal');
        observer.observe(heading);
    });
}

/** Başlıktaki tüm metin düğümlerini kelime span'larına böler; kelime sayısını döner. */
function splitIntoWords(root) {
    const walker = document.createTreeWalker(root, NodeFilter.SHOW_TEXT);
    const textNodes = [];
    while (walker.nextNode()) textNodes.push(walker.currentNode);

    let index = 0;
    textNodes.forEach((node) => {
        const parts = node.textContent.split(/(\s+)/);
        if (parts.every((p) => p.trim() === '')) return;

        const fragment = document.createDocumentFragment();
        parts.forEach((part) => {
            if (part === '') return;
            if (part.trim() === '') {
                fragment.appendChild(document.createTextNode(' '));
                return;
            }
            const mask = document.createElement('span');
            mask.className = 'word-reveal__mask';
            const word = document.createElement('span');
            word.className = 'word-reveal__word';
            word.style.setProperty('--word-delay', `${index * WORD_STAGGER_MS}ms`);
            word.textContent = part;
            mask.appendChild(word);
            fragment.appendChild(mask);
            index++;
        });
        node.replaceWith(fragment);
    });
    return index;
}
