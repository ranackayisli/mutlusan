/**
 * Şalt ürünleri sayfası:
 *  - seri sekmeleri arasında geçiş
 *  - her seri için kutup (1P/2P/3P/4P) filtresi
 *  - kartların kademeli belirme animasyonu
 */
export function initSaltProducts() {
    const tabs = document.querySelectorAll('[data-salt-tab]');
    const panels = document.querySelectorAll('[data-salt-panel]');
    if (!panels.length) return;

    // Doğal sıralama: 1P, 2P, 3P, 4P önce; sonra geri kalanı alfabetik
    function poleSortKey(v) {
        const m = v.match(/^(\d+)P$/);
        return m ? [0, parseInt(m[1], 10)] : [1, v];
    }

    // Görünen kartları kademeli (staggered) bir animasyonla belirt
    function staggerReveal(cards) {
        let visibleIndex = 0;
        cards.forEach((card) => {
            card.classList.remove('salt-card--in');
            if (card.style.display === 'none') return;
            card.style.animationDelay = (Math.min(visibleIndex, 24) * 28) + 'ms';
            // reflow zorla, animasyon her seferinde yeniden tetiklensin
            void card.offsetWidth;
            card.classList.add('salt-card--in');
            visibleIndex++;
        });
    }

    // Her panel için kutup filtresi kur (birden fazla kutup çeşidi varsa)
    function setupPoleFilter(panel) {
        const grid = panel.querySelector('[data-salt-grid]');
        const filterWrap = panel.querySelector('[data-salt-pole-filter]');
        const cards = Array.from(grid.querySelectorAll('[data-salt-card]'));

        const poles = [...new Set(cards.map(c => c.dataset.kutup).filter(Boolean))];
        if (poles.length <= 1) {
            staggerReveal(cards);
            return;
        }
        poles.sort((a, b) => {
            const ka = poleSortKey(a), kb = poleSortKey(b);
            if (ka[0] !== kb[0]) return ka[0] - kb[0];
            return ka[1] > kb[1] ? 1 : ka[1] < kb[1] ? -1 : 0;
        });

        filterWrap.innerHTML = '';
        const allBtn = document.createElement('button');
        allBtn.type = 'button';
        allBtn.className = 'salt-pole-pill salt-pole-pill--active';
        allBtn.textContent = 'All';
        allBtn.dataset.pole = '__all__';
        filterWrap.appendChild(allBtn);

        poles.forEach((pole) => {
            const count = cards.filter(c => c.dataset.kutup === pole).length;
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'salt-pole-pill';
            btn.dataset.pole = pole;
            btn.innerHTML = pole + ' <span>' + count + '</span>';
            filterWrap.appendChild(btn);
        });

        filterWrap.querySelectorAll('.salt-pole-pill').forEach((pill) => {
            pill.addEventListener('click', () => {
                filterWrap.querySelectorAll('.salt-pole-pill').forEach(p => p.classList.remove('salt-pole-pill--active'));
                pill.classList.add('salt-pole-pill--active');

                const chosen = pill.dataset.pole;
                cards.forEach((card) => {
                    const match = chosen === '__all__' || card.dataset.kutup === chosen;
                    card.style.display = match ? '' : 'none';
                });
                staggerReveal(cards);
            });
        });

        staggerReveal(cards);
    }

    panels.forEach(setupPoleFilter);

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const targetId = tab.dataset.target;

            tabs.forEach(t => t.classList.remove('salt-tab--active'));
            tab.classList.add('salt-tab--active');

            panels.forEach(p => {
                if (p.id === targetId) {
                    p.classList.add('salt-panel--active');
                    const cards = Array.from(p.querySelectorAll('[data-salt-card]'));
                    staggerReveal(cards);
                } else {
                    p.classList.remove('salt-panel--active');
                }
            });

            const panelsWrap = document.querySelector('[data-salt-panels]');
            if (panelsWrap) {
                const rect = panelsWrap.getBoundingClientRect();
                if (rect.top < 80) {
                    window.scrollTo({ top: window.scrollY + rect.top - 100, behavior: 'smooth' });
                }
            }
        });
    });
}
