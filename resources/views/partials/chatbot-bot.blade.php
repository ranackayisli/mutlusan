{{--
    Sohbet asistanının robot kafası (SVG). Dairenin dibinden yukarı doğru bakan küçük bir robot:
    antenli, gözleri parlayan, arada göz kırpıp etrafa bakan. Hareketler chatbot.css'te.

    $id    → aynı sayfadaki kopyaların SVG tanımlarının çakışmaması için benzersiz ek
    $class → isteğe bağlı ek sınıf
--}}
<svg class="chatbot__bot {{ $class ?? '' }}" viewBox="0 0 64 64" aria-hidden="true" focusable="false">
    <defs>
        <linearGradient id="chatbot-dome-{{ $id }}" x1="0" y1="0" x2="1" y2="1">
            <stop offset="0" stop-color="#f7f9fc"/>
            <stop offset="1" stop-color="#b4bcc9"/>
        </linearGradient>
        <clipPath id="chatbot-clip-{{ $id }}"><circle cx="32" cy="32" r="31"/></clipPath>
    </defs>
    <g clip-path="url(#chatbot-clip-{{ $id }})">
        <g class="chatbot__bot-head">
            <g class="chatbot__bot-antenna">
                <rect x="30.8" y="12" width="2.4" height="12" rx="1.2" fill="#d3d8e0"/>
                <circle class="chatbot__bot-tip" cx="32" cy="11" r="3.4" fill="#fff"/>
            </g>
            <path d="M10 66V47C10 33.5 19.5 24 32 24s22 9.5 22 23v19z" fill="url(#chatbot-dome-{{ $id }})"/>
            <rect x="15" y="35" width="34" height="19" rx="9.5" fill="#1d1f24"/>
            <g class="chatbot__bot-eyes">
                <ellipse class="chatbot__bot-eye" cx="25" cy="44.5" rx="4" ry="5.2"/>
                <ellipse class="chatbot__bot-eye" cx="39" cy="44.5" rx="4" ry="5.2"/>
            </g>
            <g class="chatbot__bot-happy" fill="none" stroke-linecap="round">
                <path d="M20.6 46.2Q25 40 29.4 46.2"/>
                <path d="M34.6 46.2Q39 40 43.4 46.2"/>
            </g>
        </g>
    </g>
</svg>
