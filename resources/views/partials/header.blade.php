<header class="site-header fixed top-0 left-0 right-0 z-50" data-site-header>
    <div class="max-w-7xl mx-auto px-6 lg:px-10 flex items-center justify-between h-24">

        {{-- İki logo aynı hücrede üst üste durur (grid); zemine göre biri belirir, diğeri kaybolur --}}
        <a href="{{ url('/') }}" class="grid items-center">
            <img src="{{ asset('images/mutlusan-logo-cropped.png') }}" alt="Mutlusan Electric" class="col-start-1 row-start-1 h-8 lg:h-9 w-auto site-header__logo site-header__logo--default">
            <img src="{{ asset('images/mutlusan-logo-white-cropped.png') }}" alt="" aria-hidden="true" class="col-start-1 row-start-1 h-8 lg:h-9 w-auto site-header__logo site-header__logo--dark">
        </a>

        <nav class="hidden lg:flex items-center gap-7 site-header__nav">
            <div class="nav-dropdown">
                <button type="button" class="nav-dropdown__trigger">
                    Corporate
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="nav-dropdown__panel nav-dropdown__panel--mega">
                    <div class="nav-dropdown__panel-links">
                        <a href="{{ url('/hakkimizda') }}">About Us</a>
                        <a href="#">Vision & Mission</a>
                        <a href="#">Corporate Logo</a>
                        <a href="#">Corporate Video</a>
                        <a href="#">Human Resources</a>
                        <a href="#">Information Society</a>
                    </div>
                    <a href="{{ url('/hakkimizda') }}" class="nav-dropdown__feature">
                        <img src="{{ asset('images/hakkimizda-banner.jpg') }}" alt="About Us">
                        <span class="nav-dropdown__feature-overlay"></span>
                        <span class="nav-dropdown__feature-text">
                            <strong>About Us</strong>
                            Decades of electrical expertise since 1983.
                        </span>
                    </a>
                </div>
            </div>

            <div class="nav-dropdown">
                <button type="button" class="nav-dropdown__trigger">
                    Products
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="nav-dropdown__panel nav-dropdown__panel--mega">
                    <div class="nav-dropdown__panel-links">
                        <a href="{{ url('/urunler/salt-grubu') }}">Switchgear</a>
                        <a href="{{ url('/urunler/anahtar-priz') }}">Switches & Sockets</a>
                        <a href="{{ url('/urunler/kablo-kanallari') }}">Cable Trunking</a>
                        <a href="{{ url('/urunler/ray-klemens') }}">DIN Rail Terminals</a>
                        <a href="{{ url('/urunler/fis-priz') }}">Plugs & Sockets</a>
                        <a href="{{ url('/urunler/mutlusan-chargebox') }}">Mutlusan Chargebox</a>
                        <a href="{{ url('/urunler/akilli-ev-sistemleri') }}">Smart Home Systems</a>
                    </div>
                    <a href="{{ url('/urunler/anahtar-priz') }}" class="nav-dropdown__feature">
                        <img src="{{ asset('images/anahtar-priz-banner.jpg') }}" alt="Switches, Sockets & Power Strips">
                        <span class="nav-dropdown__feature-overlay"></span>
                        <span class="nav-dropdown__feature-text">
                            <strong>New Trend</strong>
                            Discover our modular switch and socket series.
                        </span>
                    </a>
                </div>
            </div>

            <a href="{{ url('/dokumanlar') }}">Documents</a>
            <a href="{{ url('/iletisim') }}">Contact</a>
            <a href="https://post.mutlusan.com.tr" target="_blank" rel="noopener">Mutlusan Post</a>
            <a href="#" class="nav-b2b">B2B</a>
        </nav>

        <div class="hidden lg:flex items-center gap-4">
            <button type="button" class="site-header__icon-btn" data-search-toggle aria-label="Search" aria-expanded="false" aria-controls="site-search">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
                </svg>
            </button>

            <a href="{{ url('/iletisim') }}" class="inline-flex items-center px-5 py-2.5 bg-mutlusan-red text-white text-sm font-semibold rounded-full hover:bg-mutlusan-red-dark transition-colors whitespace-nowrap">
                Contact Us
            </a>
        </div>

        <button id="mobile-menu-btn" class="lg:hidden p-2 site-header__nav" aria-label="Open menu" aria-expanded="false" aria-controls="mobile-menu">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    {{-- Açılır arama kutusu --}}
    <div id="site-search" class="site-header__search-panel" data-search-panel hidden>
        <form action="{{ url('/urunler') }}" method="GET" class="max-w-7xl mx-auto px-6 lg:px-10 py-4">
            <input type="text" name="q" placeholder="Search products..." aria-label="Search products" autofocus>
        </form>
    </div>

    <div id="mobile-menu" class="hidden lg:hidden bg-mutlusan-gray-dark px-6 py-4 space-y-1 max-h-[70vh] overflow-y-auto">
        <details class="group">
            <summary class="py-2 text-white font-medium cursor-pointer list-none flex items-center justify-between">
                Corporate
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform group-open:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
            </summary>
            <div class="pl-4 pb-2 space-y-2">
                <a href="{{ url('/hakkimizda') }}" class="block text-white/80 text-sm">About Us</a>
                <a href="#" class="block text-white/80 text-sm">Vision & Mission</a>
                <a href="#" class="block text-white/80 text-sm">Corporate Logo</a>
                <a href="#" class="block text-white/80 text-sm">Human Resources</a>
                <a href="#" class="block text-white/80 text-sm">Information Society</a>
            </div>
        </details>
        <a href="{{ url('/urunler') }}" class="block text-white font-medium py-2">Products</a>
        <details class="group">
            <summary class="py-2 text-white/80 text-sm cursor-pointer list-none pl-4">All product categories ↓</summary>
            <div class="pl-4 pb-2 space-y-2">
                <a href="{{ url('/urunler/salt-grubu') }}" class="block text-white/70 text-sm">Switchgear</a>
                <a href="{{ url('/urunler/anahtar-priz') }}" class="block text-white/70 text-sm">Switches & Sockets</a>
                <a href="{{ url('/urunler/kablo-kanallari') }}" class="block text-white/70 text-sm">Cable Trunking</a>
                <a href="{{ url('/urunler/ray-klemens') }}" class="block text-white/70 text-sm">DIN Rail Terminals</a>
                <a href="{{ url('/urunler/fis-priz') }}" class="block text-white/70 text-sm">Plugs & Sockets</a>
                <a href="{{ url('/urunler/mutlusan-chargebox') }}" class="block text-white/70 text-sm">Mutlusan Chargebox</a>
                <a href="{{ url('/urunler/akilli-ev-sistemleri') }}" class="block text-white/70 text-sm">Smart Home Systems</a>
            </div>
        </details>
        <a href="{{ url('/dokumanlar') }}" class="block text-white font-medium py-2">Documents</a>
        <a href="{{ url('/iletisim') }}" class="block text-white font-medium py-2">Contact</a>
        <a href="https://post.mutlusan.com.tr" target="_blank" rel="noopener" class="block text-white font-medium py-2">Mutlusan Post</a>
        <a href="#" class="block text-mutlusan-red-light font-medium py-2">B2B</a>
    </div>
</header>
