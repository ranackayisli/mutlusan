<section class="relative h-screen w-full overflow-hidden" data-no-reveal>
    <video
        class="absolute inset-0 w-full h-full object-cover"
        src="{{ asset('videos/hero.mp4') }}"
        autoplay
        muted
        loop
        playsinline
    ></video>

    <div class="absolute inset-0 bg-gradient-to-b from-black/45 via-transparent to-black/70"></div>

    <div class="relative h-full flex flex-col items-center justify-end text-center px-6 pb-28 sm:pb-32">
        <p class="hero-enter hero-enter--1 text-sm sm:text-base text-white/80 max-w-lg">
            1976'dan bu yana ev ve endüstriyel elektrik sistemlerinde Türkiye'nin güvenilir üreticisi.
        </p>
        <a href="#urunler"
           class="hero-enter hero-enter--2 mt-8 inline-flex items-center px-8 py-3.5 bg-mutlusan-red text-white font-semibold rounded-full hover:bg-mutlusan-red-dark transition-colors">
            Ürünleri Keşfet
        </a>
    </div>

    <a href="#urunler" class="absolute bottom-8 left-1/2 -translate-x-1/2 text-white/80 animate-bounce" aria-label="Aşağı kaydır">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
        </svg>
    </a>
</section>
