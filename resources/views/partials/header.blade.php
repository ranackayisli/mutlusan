<header class="site-header fixed top-0 left-0 right-0 z-50" data-site-header>
    <div class="max-w-7xl mx-auto px-6 lg:px-10 flex items-center justify-between h-20">

        <a href="{{ url('/') }}" class="relative flex items-center h-14">
            <img src="{{ asset('images/mutlusan-logo.png') }}" alt="Mutlusan Electric" class="h-14 w-auto site-header__logo site-header__logo--default">
            <img src="{{ asset('images/mutlusan-logo-white.png') }}" alt="Mutlusan Electric" class="h-14 w-auto absolute inset-0 site-header__logo site-header__logo--dark">
        </a>

        <nav class="hidden lg:flex items-center gap-7 site-header__nav">
            <div class="nav-dropdown">
                <button type="button" class="nav-dropdown__trigger">
                    Kurumsal
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="nav-dropdown__panel nav-dropdown__panel--mega">
                    <div class="nav-dropdown__panel-links">
                        <a href="{{ url('/hakkimizda') }}">Hakkımızda</a>
                        <a href="#">Vizyon ve Misyon</a>
                        <a href="#">Kurumsal Logo</a>
                        <a href="#">Kurumsal Tanıtım Filmi</a>
                        <a href="#">İnsan Kaynakları</a>
                        <a href="#">Bilgi Toplumu</a>
                    </div>
                    <a href="{{ url('/hakkimizda') }}" class="nav-dropdown__feature">
                        <img src="{{ asset('images/hakkimizda-banner.jpg') }}" alt="Hakkımızda">
                        <span class="nav-dropdown__feature-overlay"></span>
                        <span class="nav-dropdown__feature-text">
                            <strong>Hakkımızda</strong>
                            1983'ten bu yana elektrikte köklü tecrübe.
                        </span>
                    </a>
                </div>
            </div>

            <div class="nav-dropdown">
                <button type="button" class="nav-dropdown__trigger">
                    Ürünler
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="nav-dropdown__panel nav-dropdown__panel--mega">
                    <div class="nav-dropdown__panel-links">
                        <a href="{{ url('/urunler/salt-grubu') }}">Şalt Grubu</a>
                        <a href="{{ url('/urunler/anahtar-priz') }}">Anahtar Priz</a>
                        <a href="{{ url('/urunler/kablo-kanallari') }}">Kablo Kanalları</a>
                        <a href="{{ url('/urunler/ray-klemens') }}">Ray Klemens</a>
                        <a href="{{ url('/urunler/fis-priz') }}">Fiş Priz</a>
                        <a href="{{ url('/urunler/mutlusan-chargebox') }}">Mutlusan Chargebox</a>
                        <a href="{{ url('/urunler/akilli-ev-sistemleri') }}">Akıllı Ev Sistemleri</a>
                    </div>
                    <a href="{{ url('/urunler/anahtar-priz-ve-grup-prizler') }}" class="nav-dropdown__feature">
                        <img src="{{ asset('images/anahtar-priz-banner.jpg') }}" alt="Anahtar, Priz ve Grup Prizler">
                        <span class="nav-dropdown__feature-overlay"></span>
                        <span class="nav-dropdown__feature-text">
                            <strong>Yeni Trend</strong>
                            Modüler seri anahtar ve prizlerle tanışın.
                        </span>
                    </a>
                </div>
            </div>

            <a href="#">Dokümanlar</a>
            <a href="{{ url('/iletisim') }}">İletişim</a>
            <a href="https://post.mutlusan.com.tr" target="_blank" rel="noopener">Mutlusan Post</a>
            <a href="#" class="nav-b2b">B2B</a>
        </nav>

        <div class="hidden lg:flex items-center gap-4">
            <button type="button" class="site-header__icon-btn" data-search-toggle aria-label="Ara">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
                </svg>
            </button>

            <div class="site-header__lang">
                <button type="button" class="is-active">TR</button>
                <span>/</span>
                <a href="#">EN</a>
            </div>

            <a href="{{ url('/iletisim') }}" class="inline-flex items-center px-5 py-2.5 bg-mutlusan-red text-white text-sm font-semibold rounded-full hover:bg-mutlusan-red-dark transition-colors whitespace-nowrap">
                Bize Ulaşın
            </a>
        </div>

        <button id="mobile-menu-btn" class="lg:hidden p-2 site-header__nav" aria-label="Menüyü aç">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    {{-- Açılır arama kutusu --}}
    <div class="site-header__search-panel" data-search-panel hidden>
        <form action="{{ url('/urunler') }}" method="GET" class="max-w-7xl mx-auto px-6 lg:px-10 py-4">
            <input type="text" name="q" placeholder="Ürün ara..." aria-label="Ürün ara" autofocus>
        </form>
    </div>

    <div id="mobile-menu" class="hidden lg:hidden bg-mutlusan-gray-dark px-6 py-4 space-y-1 max-h-[70vh] overflow-y-auto">
        <details class="group">
            <summary class="py-2 text-white font-medium cursor-pointer list-none flex items-center justify-between">
                Kurumsal
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform group-open:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
            </summary>
            <div class="pl-4 pb-2 space-y-2">
                <a href="{{ url('/hakkimizda') }}" class="block text-white/80 text-sm">Hakkımızda</a>
                <a href="#" class="block text-white/80 text-sm">Vizyon ve Misyon</a>
                <a href="#" class="block text-white/80 text-sm">Kurumsal Logo</a>
                <a href="#" class="block text-white/80 text-sm">İnsan Kaynakları</a>
                <a href="#" class="block text-white/80 text-sm">Bilgi Toplumu</a>
            </div>
        </details>
        <a href="{{ url('/urunler') }}" class="block text-white font-medium py-2">Ürünler</a>
        <details class="group">
            <summary class="py-2 text-white/80 text-sm cursor-pointer list-none pl-4">Tüm ürün grupları ↓</summary>
            <div class="pl-4 pb-2 space-y-2">
                <a href="{{ url('/urunler/salt-grubu') }}" class="block text-white/70 text-sm">Şalt Grubu</a>
                <a href="{{ url('/urunler/anahtar-priz') }}" class="block text-white/70 text-sm">Anahtar Priz</a>
                <a href="{{ url('/urunler/kablo-kanallari') }}" class="block text-white/70 text-sm">Kablo Kanalları</a>
                <a href="{{ url('/urunler/ray-klemens') }}" class="block text-white/70 text-sm">Ray Klemens</a>
                <a href="{{ url('/urunler/fis-priz') }}" class="block text-white/70 text-sm">Fiş Priz</a>
                <a href="{{ url('/urunler/mutlusan-chargebox') }}" class="block text-white/70 text-sm">Mutlusan Chargebox</a>
                <a href="{{ url('/urunler/akilli-ev-sistemleri') }}" class="block text-white/70 text-sm">Akıllı Ev Sistemleri</a>
            </div>
        </details>
        <a href="#" class="block text-white font-medium py-2">Dokümanlar</a>
        <a href="{{ url('/iletisim') }}" class="block text-white font-medium py-2">İletişim</a>
        <a href="https://post.mutlusan.com.tr" target="_blank" rel="noopener" class="block text-white font-medium py-2">Mutlusan Post</a>
        <a href="#" class="block text-mutlusan-red-light font-medium py-2">B2B</a>
        <div class="flex items-center gap-3 pt-2 text-white/70 text-sm">
            <button type="button" class="text-white font-semibold">TR</button>
            <span>/</span>
            <a href="#">EN</a>
        </div>
    </div>
</header>

@push('scripts')
<script>
(function () {
    const searchToggle = document.querySelector('[data-search-toggle]');
    const searchPanel = document.querySelector('[data-search-panel]');
    if (searchToggle && searchPanel) {
        searchToggle.addEventListener('click', () => {
            searchPanel.hidden = !searchPanel.hidden;
            if (!searchPanel.hidden) {
                const input = searchPanel.querySelector('input');
                if (input) input.focus();
            }
        });
    }
})();
</script>
@endpush
