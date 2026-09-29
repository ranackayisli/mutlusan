<section class="relative h-screen w-full overflow-hidden" data-no-reveal data-dark-banner>
    <video
        class="absolute inset-0 w-full h-full object-cover"
        data-parallax-video
        src="{{ asset('videos/hero.mp4') }}"
        autoplay
        muted
        loop
        playsinline
    ></video>

    <div class="absolute inset-0 bg-gradient-to-r from-black/75 via-black/35 to-black/10"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-black/20"></div>

    <div class="relative h-full flex items-center px-6 sm:px-10 lg:px-16">
        <div class="max-w-xl">
            <span class="hero-enter hero-enter--0 inline-flex items-center gap-2 text-mutlusan-red-light text-xs sm:text-sm font-bold tracking-wide uppercase">
                Since 1983, Building the Future
            </span>

            <h1 class="hero-enter hero-enter--1 mt-4 font-display text-3xl sm:text-4xl lg:text-5xl font-bold text-white leading-tight">
                Manufacturing Power Shaping the Future of Electricity
            </h1>

            <p class="hero-enter hero-enter--2 mt-5 text-white/80 text-sm sm:text-base max-w-md">
                Trusted electrical solutions on a global scale, backed by local manufacturing strength and exported to more than 40 countries.
            </p>

            <form action="{{ url('/urunler') }}" method="GET" class="hero-enter hero-enter--3 mt-7 relative max-w-md">
                <input type="text" name="q" placeholder="Search products, documents or solutions..."
                       class="w-full rounded-full bg-white/95 backdrop-blur px-5 py-3.5 pr-12 text-sm text-mutlusan-gray-dark placeholder:text-mutlusan-gray focus:outline-none focus:ring-2 focus:ring-mutlusan-red">
                <button type="submit" class="absolute right-1.5 top-1/2 -translate-y-1/2 w-9 h-9 rounded-full bg-mutlusan-red hover:bg-mutlusan-red-dark transition-colors flex items-center justify-center text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
                    </svg>
                </button>
            </form>

            <div class="hero-enter hero-enter--4 mt-7 flex flex-wrap items-center gap-3">
                <a href="#urunler"
                   class="inline-flex items-center px-7 py-3 bg-mutlusan-red text-white text-sm font-semibold rounded-full hover:bg-mutlusan-red-dark transition-colors">
                    Explore Products
                </a>
                <a href="{{ url('/urunler') }}"
                   class="inline-flex items-center px-7 py-3 bg-white/10 border border-white/30 text-white text-sm font-semibold rounded-full backdrop-blur hover:bg-white/20 transition-colors">
                    Document Center
                </a>
            </div>
        </div>
    </div>
</section>
