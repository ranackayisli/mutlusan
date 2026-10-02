import { prefersReducedMotion } from './motion';

/**
 * Sağ alttaki yapay zekâ asistanı.
 *
 *  - Açılır / kapanır; sayfayı kilitlemez, sayfa kaydırması normal çalışır.
 *  - Sorular kendi sitemize (POST /ai/query) gider; sunucu Mutlusan AI servisine iletir.
 *  - Konuşma ve açık/kapalı durumu bu sekme için saklanır (sessionStorage); sayfa değişince kaybolmaz.
 *  - Cevap HTML olarak basılmaz: metin düğümleriyle güvenli şekilde çizilir (XSS yok).
 *  - products[] ve documents[] boşsa hata sayılmaz, kart gösterilmez.
 *  - Sohbet kapalıyken arada kısa bir balon mesaj belirir ("Ürün bulmak için yardım ister misiniz?").
 *    Kullanıcıyı bunaltmaz: sekme görünmüyorsa ya da bir forma yazıyorsa ertelenir; kullanıcı
 *    sohbeti açınca ya da balonu kapatınca bu oturumda bir daha çıkmaz.
 */
const STORAGE_KEY = 'mutlusan-chat-v1';
const MAX_STORED_MESSAGES = 40;
const REQUEST_TIMEOUT_MS = 30000;

const TEASER = {
    firstDelay: 8000,     // ms, sayfa açıldıktan sonra ilk balon
    interval: 28000,      // ms, balonlar arası
    visibleFor: 7000,     // ms, balon ekranda kalma süresi
    afterHover: 3000,     // ms, fareyle üzerine gelip çekilince kalan süre
    maxPerSession: 6,     // bu sekmede toplam en fazla kaç balon
};

class ChatError extends Error {
    constructor(kind) {
        super(kind);
        this.kind = kind; // 'rate' | 'session' | 'empty' | 'generic'
    }
}

export function initChatbot() {
    const root = document.querySelector('[data-chatbot]');
    const configEl = document.getElementById('chatbot-config');
    if (!root || !configEl) return;

    let config;
    try {
        config = JSON.parse(configEl.textContent);
    } catch {
        return;
    }
    const t = config.strings;

    const el = {
        teaser: root.querySelector('[data-chatbot-teaser]'),
        teaserText: root.querySelector('[data-chatbot-teaser-open]'),
        teaserClose: root.querySelector('[data-chatbot-teaser-close]'),
        launcher: root.querySelector('[data-chatbot-launcher]'),
        panel: root.querySelector('[data-chatbot-panel]'),
        messages: root.querySelector('[data-chatbot-messages]'),
        form: root.querySelector('[data-chatbot-form]'),
        input: root.querySelector('[data-chatbot-input]'),
        send: root.querySelector('[data-chatbot-send]'),
        close: root.querySelector('[data-chatbot-close]'),
        restart: root.querySelector('[data-chatbot-restart]'),
    };

    const state = {
        open: false,
        loading: false,
        sessionId: newSessionId(),
        messages: [],
        teaser: { count: 0, last: 0, stopped: false },
    };
    let typingEl = null;
    let teaserTimer = null;
    let teaserHideTimer = null;

    restore();
    render();
    setOpen(state.open, { focus: false, animate: false });
    root.classList.toggle('chatbot--seen', state.teaser.stopped);
    scheduleTeaser();

    /* ---------------- Olaylar ---------------- */
    el.launcher.addEventListener('click', () => setOpen(!state.open));
    el.close.addEventListener('click', () => setOpen(false));

    // Balon: tıklayınca sohbeti açar; × ile kapatılırsa bu oturumda bir daha çıkmaz
    el.teaserText.addEventListener('click', () => setOpen(true));
    el.teaserClose.addEventListener('click', () => stopTeasers());
    el.teaser.addEventListener('mouseenter', () => clearTimeout(teaserHideTimer));
    el.teaser.addEventListener('mouseleave', () => {
        if (root.classList.contains('chatbot--teasing')) {
            teaserHideTimer = setTimeout(() => hideTeaser(), TEASER.afterHover);
        }
    });
    el.restart.addEventListener('click', restart);

    root.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && state.open) {
            setOpen(false);
        }
    });

    el.form.addEventListener('submit', (event) => {
        event.preventDefault();
        submit();
    });

    el.input.addEventListener('input', () => {
        autoGrow();
        updateSendButton();
    });

    el.input.addEventListener('keydown', (event) => {
        // Enter gönderir, Shift+Enter yeni satır. IME (Çince/Japonca vb.) yazarken Enter'a dokunma.
        if (event.key === 'Enter' && !event.shiftKey && !event.isComposing) {
            event.preventDefault();
            submit();
        }
    });

    /* ---------------- Aç / kapat ---------------- */
    function setOpen(open, { focus = true, animate = true } = {}) {
        const wasFocusInside = root.contains(document.activeElement);
        state.open = open;

        // Sayfa yenilenince açık sohbet animasyonsuz, olduğu gibi belirsin
        if (!animate) {
            root.classList.add('chatbot--instant');
            requestAnimationFrame(() => requestAnimationFrame(() => root.classList.remove('chatbot--instant')));
        }
        root.classList.toggle('chatbot--open', open);
        el.launcher.setAttribute('aria-expanded', String(open));
        el.launcher.setAttribute('aria-label', open ? t.close : t.open);
        el.panel.setAttribute('aria-hidden', String(!open));
        if (open) stopTeasers({ persistNow: false });

        if (open && focus) {
            el.input.focus({ preventScroll: true });
            scrollToBottom(false);
        }
        if (!open && wasFocusInside) {
            el.launcher.focus({ preventScroll: true });
        }
        persist();
    }

    /* ---------------- Arada beliren balon ---------------- */
    function scheduleTeaser() {
        clearTimeout(teaserTimer);
        const { stopped, count, last } = state.teaser;
        if (stopped || count >= TEASER.maxPerSession || !config.teasers?.length) return;

        // Sayfa değişince sayaç kaldığı yerden devam eder; art arda sayfalarda balon yağmaz
        const wait = Math.max(TEASER.firstDelay, TEASER.interval - (Date.now() - last));
        teaserTimer = setTimeout(showTeaser, wait);
    }

    function showTeaser() {
        if (state.teaser.stopped || state.open) return;

        // Rahatsız etme: sekme arka plandaysa ya da kullanıcı başka bir forma yazıyorsa biraz sonra tekrar dene
        const active = document.activeElement;
        const typingElsewhere = active && !root.contains(active) &&
            (active.tagName === 'INPUT' || active.tagName === 'TEXTAREA' || active.isContentEditable);
        if (document.visibilityState !== 'visible' || typingElsewhere) {
            teaserTimer = setTimeout(showTeaser, 5000);
            return;
        }

        el.teaserText.textContent = config.teasers[state.teaser.count % config.teasers.length];
        root.classList.add('chatbot--teasing');
        state.teaser.count += 1;
        state.teaser.last = Date.now();
        persist();

        clearTimeout(teaserHideTimer);
        teaserHideTimer = setTimeout(() => hideTeaser(), TEASER.visibleFor);
    }

    function hideTeaser({ schedule = true } = {}) {
        clearTimeout(teaserHideTimer);
        root.classList.remove('chatbot--teasing');
        if (schedule) scheduleTeaser();
    }

    /** Kullanıcı sohbeti açtı ya da balonu kapattı: bu oturumda balon ve nabız halkası biter. */
    function stopTeasers({ persistNow = true } = {}) {
        clearTimeout(teaserTimer);
        hideTeaser({ schedule: false });
        state.teaser.stopped = true;
        root.classList.add('chatbot--seen');
        if (persistNow) persist();
    }

    /* ---------------- Mesaj gönderme ---------------- */
    async function submit(textOverride) {
        const text = (textOverride ?? el.input.value).trim();
        if (text.length < 2 || state.loading) return;

        removeChips();
        addMessage({ role: 'user', text: text.slice(0, 2000) });
        if (textOverride === undefined) {
            el.input.value = '';
            autoGrow();
        }

        setLoading(true);
        try {
            const data = await requestAnswer(text);
            addMessage({
                role: 'bot',
                text: data.answer || t.errorEmpty,
                products: data.products,
                documents: data.documents,
                suggestions: data.suggestions,
                demo: Boolean(data.demo),
            });
        } catch (error) {
            addMessage({ role: 'bot', text: errorText(error), error: true });
        } finally {
            setLoading(false);
            if (state.open) el.input.focus({ preventScroll: true });
        }
    }

    async function requestAnswer(query) {
        const controller = new AbortController();
        const timer = setTimeout(() => controller.abort(), REQUEST_TIMEOUT_MS);

        let response;
        try {
            response = await fetch(config.endpoint, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    Accept: 'application/json',
                    'X-CSRF-TOKEN': config.csrf,
                    'X-Requested-With': 'XMLHttpRequest',
                },
                body: JSON.stringify({ query, language: config.language, sessionId: state.sessionId }),
                signal: controller.signal,
            });
        } catch {
            throw new ChatError('generic'); // ağ hatası ya da zaman aşımı
        } finally {
            clearTimeout(timer);
        }

        if (response.status === 429) throw new ChatError('rate');
        if (response.status === 419) throw new ChatError('session');
        if (!response.ok) throw new ChatError('generic');

        try {
            return await response.json();
        } catch {
            throw new ChatError('generic');
        }
    }

    function errorText(error) {
        switch (error?.kind) {
            case 'rate': return t.errorRate;
            case 'session': return t.errorSession;
            default: return t.errorGeneric;
        }
    }

    function setLoading(loading) {
        state.loading = loading;
        root.classList.toggle('chatbot--loading', loading);
        el.messages.setAttribute('aria-busy', String(loading));
        updateSendButton();

        if (loading) {
            typingEl = document.createElement('div');
            typingEl.className = 'chatbot__typing';
            typingEl.setAttribute('role', 'status');
            typingEl.setAttribute('aria-label', t.typing);
            typingEl.innerHTML = '<span></span><span></span><span></span>';
            el.messages.appendChild(typingEl);
            scrollToBottom();
        } else if (typingEl) {
            typingEl.remove();
            typingEl = null;
        }
    }

    function updateSendButton() {
        el.send.disabled = state.loading || el.input.value.trim().length < 2;
    }

    function autoGrow() {
        el.input.style.height = 'auto';
        el.input.style.height = `${Math.min(el.input.scrollHeight, 120)}px`;
    }

    function restart() {
        state.messages = [];
        state.sessionId = newSessionId();
        persist();
        render();
        el.input.focus({ preventScroll: true });
    }

    /* ---------------- Çizim ---------------- */
    function addMessage(message) {
        state.messages.push(message);
        if (state.messages.length > MAX_STORED_MESSAGES) state.messages.shift();
        persist();

        // Yazıyor göstergesi varsa mesaj onun önüne girer
        const node = buildMessage(message, true);
        el.messages.insertBefore(node, typingEl);
        scrollToBottom();
    }

    function render() {
        el.messages.replaceChildren();

        el.messages.appendChild(buildMessage({ role: 'bot', text: t.welcome }, false));

        state.messages.forEach((message, index) => {
            const isLast = index === state.messages.length - 1;
            el.messages.appendChild(buildMessage(message, isLast));
        });

        if (state.messages.length === 0) {
            el.messages.appendChild(buildChips(config.initialSuggestions));
        }
        scrollToBottom(false);
    }

    function buildMessage(message, withChips) {
        const wrapper = document.createElement('div');
        wrapper.className = `chatbot__msg chatbot__msg--${message.role}${message.error ? ' chatbot__msg--error' : ''}`;

        if (message.demo) {
            const badge = document.createElement('span');
            badge.className = 'chatbot__demo';
            badge.textContent = t.demo;
            wrapper.appendChild(badge);
        }

        const bubble = document.createElement('div');
        bubble.className = 'chatbot__bubble';
        if (message.role === 'bot') {
            renderRichText(bubble, message.text);
        } else {
            bubble.textContent = message.text;
        }
        wrapper.appendChild(bubble);

        if (message.role === 'bot') {
            appendCards(wrapper, t.products, message.products, productCard);
            appendCards(wrapper, t.documents, message.documents, documentCard);
            if (withChips && message.suggestions?.length) {
                wrapper.appendChild(buildChips(message.suggestions));
            }
        }
        return wrapper;
    }

    function buildChips(items) {
        const list = document.createElement('div');
        list.className = 'chatbot__chips';
        items.forEach((text) => {
            const chip = document.createElement('button');
            chip.type = 'button';
            chip.className = 'chatbot__chip';
            chip.textContent = text;
            chip.addEventListener('click', () => submit(text));
            list.appendChild(chip);
        });
        return list;
    }

    function removeChips() {
        el.messages.querySelectorAll('.chatbot__chips').forEach((chips) => chips.remove());
    }

    function scrollToBottom(smooth = true) {
        const behavior = smooth && !prefersReducedMotion() ? 'smooth' : 'auto';
        requestAnimationFrame(() => el.messages.scrollTo({ top: el.messages.scrollHeight, behavior }));
    }

    /* ---------------- Saklama (bu sekme) ---------------- */
    function persist() {
        try {
            sessionStorage.setItem(STORAGE_KEY, JSON.stringify({
                open: state.open,
                sessionId: state.sessionId,
                messages: state.messages,
                teaser: state.teaser,
            }));
        } catch {
            /* depolama kapalıysa sohbet yine çalışır, sadece sayfa değişince sıfırlanır */
        }
    }

    function restore() {
        try {
            const saved = JSON.parse(sessionStorage.getItem(STORAGE_KEY) || 'null');
            if (!saved) return;
            state.open = Boolean(saved.open);
            if (typeof saved.sessionId === 'string') state.sessionId = saved.sessionId;
            if (Array.isArray(saved.messages)) state.messages = saved.messages.slice(-MAX_STORED_MESSAGES);
            if (saved.teaser && typeof saved.teaser === 'object') {
                state.teaser = {
                    count: Number(saved.teaser.count) || 0,
                    last: Number(saved.teaser.last) || 0,
                    stopped: Boolean(saved.teaser.stopped),
                };
            }
        } catch {
            /* bozuk kayıt: sıfırdan başla */
        }
    }
}

/* ======================= Yardımcılar ======================= */

function newSessionId() {
    if (window.crypto?.randomUUID) return window.crypto.randomUUID();
    return `web-${Date.now().toString(36)}-${Math.random().toString(36).slice(2, 10)}`;
}

/** Sadece http(s) adreslerine izin verir (javascript: vb. engellenir). */
function safeUrl(value) {
    if (typeof value !== 'string' || !value) return null;
    try {
        const url = new URL(value, window.location.href);
        return url.protocol === 'http:' || url.protocol === 'https:' ? url.href : null;
    } catch {
        return null;
    }
}

function appendCards(wrapper, label, items, build) {
    const cards = (Array.isArray(items) ? items : []).map(build).filter(Boolean);
    if (!cards.length) return;

    const group = document.createElement('div');
    group.className = 'chatbot__group';
    const heading = document.createElement('span');
    heading.className = 'chatbot__group-label';
    heading.textContent = label;
    group.appendChild(heading);
    cards.forEach((card) => group.appendChild(card));
    wrapper.appendChild(group);
}

function buildCard({ href, image, title, meta }) {
    const card = document.createElement(href ? 'a' : 'div');
    card.className = 'chatbot__card';
    if (href) card.href = href;

    const imageUrl = safeUrl(image);
    if (imageUrl) {
        const img = document.createElement('img');
        img.src = imageUrl;
        img.alt = '';
        img.loading = 'lazy';
        card.appendChild(img);
    }

    const body = document.createElement('span');
    body.className = 'chatbot__card-body';
    const titleEl = document.createElement('span');
    titleEl.className = 'chatbot__card-title';
    titleEl.textContent = title;
    body.appendChild(titleEl);
    if (meta) {
        const metaEl = document.createElement('span');
        metaEl.className = 'chatbot__card-meta';
        metaEl.textContent = meta;
        body.appendChild(metaEl);
    }
    card.appendChild(body);
    return card;
}

function productCard(product) {
    if (!product || typeof product !== 'object') return null;
    const title = [product.code, product.name].filter((part) => typeof part === 'string' && part).join(' · ');
    if (!title) return null;

    const attributes = product.attributes && typeof product.attributes === 'object' ? product.attributes : {};
    const meta = Object.entries(attributes)
        .filter(([, value]) => typeof value === 'string' || typeof value === 'number')
        .slice(0, 3)
        .map(([key, value]) => `${key}: ${value}`)
        .join(' · ');

    return buildCard({ href: safeUrl(product.url), image: product.image, title, meta });
}

function documentCard(doc) {
    if (!doc || typeof doc !== 'object' || typeof doc.title !== 'string' || !doc.title) return null;
    const page = Number.isFinite(Number(doc.page)) && Number(doc.page) > 0 ? `${doc.page}` : '';
    const meta = [typeof doc.type === 'string' ? doc.type : '', page ? `${currentStrings().page} ${page}` : '']
        .filter(Boolean)
        .join(' · ');
    return buildCard({ href: safeUrl(doc.url), title: doc.title, meta });
}

function currentStrings() {
    try {
        return JSON.parse(document.getElementById('chatbot-config').textContent).strings;
    } catch {
        return { page: 'p.' };
    }
}

/**
 * Cevaptaki basit Markdown'ı (**kalın**, - madde işaretleri, # başlık) DOM düğümleriyle çizer.
 * innerHTML kullanılmaz; ham HTML içeren bir cevap sadece düz metin olarak görünür.
 */
function renderRichText(container, text) {
    const lines = String(text ?? '').replace(/\r\n/g, '\n').split('\n');
    let list = null;
    let paragraph = null;

    lines.forEach((line) => {
        const trimmed = line.trim();
        if (!trimmed) {
            list = null;
            paragraph = null;
            return;
        }

        const bullet = trimmed.match(/^[-*•]\s+(.*)$/);
        if (bullet) {
            if (!list) {
                list = document.createElement('ul');
                container.appendChild(list);
            }
            paragraph = null;
            const item = document.createElement('li');
            appendInline(item, bullet[1]);
            list.appendChild(item);
            return;
        }

        list = null;
        const heading = trimmed.match(/^#{1,6}\s+(.*)$/);
        if (!paragraph) {
            paragraph = document.createElement('p');
            container.appendChild(paragraph);
        } else {
            paragraph.appendChild(document.createElement('br'));
        }
        appendInline(paragraph, heading ? heading[1] : trimmed, Boolean(heading));
    });
}

function appendInline(parent, text, forceBold = false) {
    text.split(/(\*\*[^*]+\*\*)/g).forEach((part) => {
        if (!part) return;
        const bold = part.match(/^\*\*([^*]+)\*\*$/);
        if (bold || forceBold) {
            const strong = document.createElement('strong');
            strong.textContent = bold ? bold[1] : part;
            parent.appendChild(strong);
        } else {
            parent.appendChild(document.createTextNode(part));
        }
    });
}
