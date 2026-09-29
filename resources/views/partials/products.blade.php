@php
    $urunGruplari = [
        ['ad' => 'Switchgear', 'slug' => 'salt-grubu', 'gorsel' => 'salt-grubu.jpg', 'aciklama' => 'High-security circuit breakers and fuse groups.'],
        ['ad' => 'Switches & Sockets', 'slug' => 'anahtar-priz', 'gorsel' => 'anahtar-priz.jpg', 'aciklama' => 'Stylish, durable electrical connection points.'],
        ['ad' => 'Cable Trunking', 'slug' => 'kablo-kanallari', 'gorsel' => 'kablo-kanallari.jpg', 'aciklama' => 'Neat, safe and aesthetic cable management solutions.'],
        ['ad' => 'DIN Rail Terminals', 'slug' => 'ray-klemens', 'gorsel' => 'ray-klemens.jpg', 'aciklama' => 'DIN rail compatible screw and Push-In connection terminals.'],
        ['ad' => 'Plugs & Sockets', 'slug' => 'fis-priz', 'gorsel' => 'fis-priz.jpg', 'aciklama' => 'Practical and safe power solutions for everyday use.'],
        ['ad' => 'Mutlusan Chargebox', 'slug' => 'mutlusan-chargebox', 'gorsel' => 'chargebox.jpg', 'aciklama' => 'Smart home-type EV charging station.'],
        ['ad' => 'Smart Home Systems', 'slug' => 'akilli-ev-sistemleri', 'gorsel' => 'akilli-ev.jpg', 'aciklama' => 'KNX-based, connected and comfortable living technology.'],
    ];
@endphp

<section id="urunler" class="pt-8 pb-6 sm:pt-10 sm:pb-8 relative overflow-hidden bg-mutlusan-gray-light">

    <div class="relative max-w-7xl mx-auto px-6 text-center mb-3">
        <span class="text-mutlusan-red text-sm font-semibold tracking-wide">Product Groups</span>
        <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-bold text-mutlusan-gray-dark mt-3">
            Whatever You Need
        </h2>
    </div>

    <div class="product-wheel-wrap relative flex items-center gap-4 sm:gap-6 max-w-7xl mx-auto px-4 sm:px-6">
        <button type="button" class="product-carousel__arrow product-carousel__arrow--prev" data-wheel-prev aria-label="Previous product">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg>
        </button>

        <div class="product-wheel relative" data-product-wheel>
            @foreach ($urunGruplari as $i => $grup)
                <a href="{{ url('/urunler/' . $grup['slug']) }}"
                   class="product-wheel__card"
                   data-wheel-card
                   data-index="{{ $i }}"
                   data-title="{{ $grup['ad'] }}"
                   data-desc="{{ $grup['aciklama'] }}">
                    <img src="{{ asset('images/urunler/' . $grup['gorsel']) }}" alt="{{ $grup['ad'] }}"
                         onerror="this.src='{{ asset('images/urunler/placeholder.jpg') }}'">
                </a>
            @endforeach
        </div>

        <button type="button" class="product-carousel__arrow product-carousel__arrow--next" data-wheel-next aria-label="Next product">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18l6-6-6-6"/></svg>
        </button>
    </div>

    <div class="product-carousel__info relative text-center mt-2" data-carousel-info>
        <h3 data-info-title class="text-xl font-display font-bold text-mutlusan-gray-dark">{{ $urunGruplari[0]['ad'] }}</h3>
        <p data-info-desc class="text-mutlusan-gray text-sm mt-1">{{ $urunGruplari[0]['aciklama'] }}</p>
    </div>
</section>
