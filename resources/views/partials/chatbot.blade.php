{{--
    Sağ alttaki yapay zekâ asistanı (açılır / kapanır sohbet penceresi).
    Her sayfada layouts/app.blade.php içinden yüklenir.

    Sunucu:     app/Http/Controllers/AiChatController.php  (POST /ai/query)
    Stiller:    resources/css/components/chatbot.css
    Davranış:   resources/js/modules/chatbot.js
    Servis adresi: .env → MUTLUSAN_AI_URL

    Tüm yazılar __() içinde; Türkçe eklenince lang/tr.json'a çevirileri yazmak yeterli.
--}}
@php
    $strings = [
        'open' => __('Open Mutlusan AI assistant'),
        'close' => __('Close chat'),
        'restart' => __('Start a new conversation'),
        'title' => __('Mutlusan AI Assistant'),
        'subtitle' => __('Ask about products, documents and solutions'),
        'welcome' => __('Hello! I am the Mutlusan AI assistant. How can I help you?'),
        'placeholder' => __('Type your question...'),
        'send' => __('Send'),
        'typing' => __('Mutlusan AI is typing'),
        'demo' => __('Demo mode'),
        'products' => __('Suggested products'),
        'documents' => __('Related documents'),
        'disclaimer' => __('AI can make mistakes. Please verify technical values in the product documents.'),
        'errorGeneric' => __('The assistant is temporarily unavailable. Please try again in a moment or use the Document Center.'),
        'errorRate' => __('You are asking very quickly. Please wait a minute and try again.'),
        'errorSession' => __('Your session has expired. Please refresh the page.'),
        'errorEmpty' => __('I could not find an answer to that. Could you rephrase your question?'),
        'page' => __('p.'),
        'dismiss' => __('Dismiss'),
    ];

    $config = [
        'endpoint' => route('ai.query'),
        'csrf' => csrf_token(),
        'language' => str_starts_with(app()->getLocale(), 'tr') ? 'tr' : 'en',
        'strings' => $strings,
        // Sohbet kapalıyken arada beliren kısa balon mesajlar
        'teasers' => [
            __('Need help finding a product?'),
            __('Looking for a catalog or datasheet? Just ask.'),
            __('I can help you choose the right product.'),
            __('Have a technical question? Ask the Mutlusan AI assistant.'),
        ],
        'initialSuggestions' => [
            __('Show product families'),
            __('Find a catalog or datasheet'),
            __('Help me choose a product'),
        ],
    ];
@endphp

<div class="chatbot" data-chatbot>
    {{-- Arada beliren balon: sadece görsel bir hatırlatma; klavye ve ekran okuyucu için düğme zaten var --}}
    <div class="chatbot__teaser" data-chatbot-teaser aria-hidden="true">
        <button type="button" class="chatbot__teaser-text" data-chatbot-teaser-open tabindex="-1"></button>
        <button type="button" class="chatbot__teaser-close" data-chatbot-teaser-close tabindex="-1" title="{{ $strings['dismiss'] }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true"><path d="M18 6 6 18M6 6l12 12"/></svg>
        </button>
    </div>

    <section class="chatbot__panel" id="chatbot-panel" role="dialog" aria-modal="false"
             aria-labelledby="chatbot-title" data-chatbot-panel>

        <header class="chatbot__header">
            <span class="chatbot__avatar" aria-hidden="true">
                @include('partials.chatbot-bot', ['id' => 'header'])
            </span>
            <div class="chatbot__heading">
                <h2 id="chatbot-title" class="chatbot__title">{{ $strings['title'] }}</h2>
                <p class="chatbot__subtitle">{{ $strings['subtitle'] }}</p>
            </div>
            <button type="button" class="chatbot__icon-btn" data-chatbot-restart
                    aria-label="{{ $strings['restart'] }}" title="{{ $strings['restart'] }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 12a9 9 0 1 0 3-6.7"/><path d="M3 4v5h5"/></svg>
            </button>
            <button type="button" class="chatbot__icon-btn" data-chatbot-close
                    aria-label="{{ $strings['close'] }}" title="{{ $strings['close'] }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 6 6 18M6 6l12 12"/></svg>
            </button>
        </header>

        <div class="chatbot__messages" data-chatbot-messages role="log" aria-live="polite" tabindex="0"></div>

        <form class="chatbot__form" data-chatbot-form autocomplete="off">
            <label class="sr-only" for="chatbot-input">{{ $strings['placeholder'] }}</label>
            <textarea id="chatbot-input" class="chatbot__input" rows="1" maxlength="2000"
                      placeholder="{{ $strings['placeholder'] }}" data-chatbot-input></textarea>
            <button type="submit" class="chatbot__send" data-chatbot-send aria-label="{{ $strings['send'] }}" disabled>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
            </button>
        </form>

        <p class="chatbot__disclaimer">{{ $strings['disclaimer'] }}</p>
    </section>

    <button type="button" class="chatbot__launcher" data-chatbot-launcher
            aria-expanded="false" aria-controls="chatbot-panel" aria-label="{{ $strings['open'] }}">
        <span class="chatbot__pulse" aria-hidden="true"></span>
        <span class="chatbot__badge" aria-hidden="true">AI</span>
        @include('partials.chatbot-bot', ['id' => 'launcher'])
        <svg class="chatbot__launcher-close" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 6 6 18M6 6l12 12"/></svg>
    </button>

    <script type="application/json" id="chatbot-config">{!! json_encode($config, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE) !!}</script>
</div>
