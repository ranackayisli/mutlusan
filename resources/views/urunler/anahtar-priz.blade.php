@extends('layouts.app')

@section('title', 'Anahtar, Priz ve Grup Prizler | Mutlusan Electric')
@section('description', 'Rita, Elitra Plus, Candela, Daria ve Bron serileri ile ev ve iş yerleri için anahtar, priz ve grup priz çözümleri.')

@section('content')

    {{-- Banner görseli + üzerine bindirilmiş yazı --}}
    <section class="relative w-full pt-20 overflow-hidden" data-no-reveal>
        <div class="relative h-[240px] sm:h-[320px] lg:h-[380px]">
            <img src="{{ asset('images/anahtar-priz-banner.jpg') }}" alt="Mutlusan Modüler Seri Anahtar ve Prizler"
                 class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-black/15 to-transparent"></div>

            <div class="relative h-full flex flex-col justify-center px-6 sm:px-10 max-w-xl">
                <span class="text-white/85 font-display text-lg sm:text-xl font-medium">Yeni Trend ile Tanışın;</span>
                <span class="mt-1 text-mutlusan-red-light font-display text-2xl sm:text-3xl font-extrabold leading-tight">
                    Mutlusan Modüler Seri<br>Anahtar ve Prizler
                </span>
            </div>
        </div>
    </section>

    {{-- Üst başlık bölümü --}}
    <section class="pt-10 pb-14 px-6 bg-white">
        <div class="max-w-4xl">
            <div class="text-mutlusan-gray text-sm mb-5">
                <a href="{{ url('/') }}" class="hover:text-mutlusan-red transition-colors">Ana Sayfa</a>
                <span class="mx-2">/</span>
                <a href="{{ url('/urunler') }}" class="hover:text-mutlusan-red transition-colors">Ürünler</a>
                <span class="mx-2">/</span>
                <span class="text-mutlusan-gray-dark font-medium">Anahtar, Priz ve Grup Prizler</span>
            </div>

            <h1 class="font-display text-4xl sm:text-5xl font-bold text-mutlusan-gray-dark">
                Anahtar, Priz ve Grup Prizler
            </h1>
            <p class="mt-5 text-mutlusan-gray text-lg leading-relaxed max-w-3xl">
                Ev ve iş yerleri için tasarlanan anahtar ve priz sistemlerimiz, şık tasarımı dayanıklı
                mühendislikle birleştirir. Rita, Elitra Plus, Candela, Daria ve Bron serileriyle her
                mekâna uygun estetik ve fonksiyonel çözümler sunuyoruz.
            </p>

            <button type="button" data-toggle-more class="mt-4 inline-flex items-center gap-2 text-mutlusan-red font-semibold hover:text-mutlusan-red-dark transition-colors">
                <span data-toggle-more-label>Daha fazla bilgi</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform" data-toggle-more-icon fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <div data-more-content class="mt-4 text-mutlusan-gray leading-relaxed max-w-3xl hidden">
                <p>
                    Tüm anahtar ve priz serilerimiz, uluslararası güvenlik standartlarına uygun üretilir ve
                    yüksek kullanım ömrü için test edilir. Vidalı ve klipsli montaj seçenekleri, farklı renk
                    ve kaplama alternatifleriyle (natural beyaz, antik altın, inox, siyah vb.) mimari projelere
                    kolayca entegre olur. Işıklı anahtar, USB'li priz, dimmer ve topraklı grup priz gibi
                    fonksiyonel varyantlar da ürün gamımızda yer alır.
                </p>
            </div>
        </div>
    </section>

    {{-- Ürün kategorileri --}}
    <section class="py-14 px-6 bg-mutlusan-gray-light">
        <div class="max-w-6xl mx-auto">
            <h2 class="font-display text-3xl font-bold text-mutlusan-gray-dark mb-8">Ürün kategorileri</h2>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">

                <a href="#rita-serisi" class="group block bg-white rounded-2xl overflow-hidden">
                    <div class="aspect-square flex items-center justify-center p-6">
                        <img src="https://www.mutlusan.com.tr/images/product/thumbs/edfa346f-be7.jpg"
                             alt="Rita Serisi" class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="px-5 pb-5 text-center">
                        <h3 class="font-semibold text-mutlusan-gray-dark">Rita Serisi</h3>
                    </div>
                </a>

                @foreach (['Elitra Plus Serisi', 'Candela Serisi', 'Daria Serisi', 'Bron Serisi', 'Nemliyer', 'Grup Prizler', 'Aksesuar'] as $seri)
                    <div class="block bg-white rounded-2xl overflow-hidden opacity-60">
                        <div class="aspect-square flex items-center justify-center p-6">
                            <span class="text-mutlusan-gray text-xs text-center">İçerik<br>ekleniyor</span>
                        </div>
                        <div class="px-5 pb-5 text-center">
                            <h3 class="font-semibold text-mutlusan-gray-dark">{{ $seri }}</h3>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    {{-- Rita Serisi ürünleri --}}
    <section id="rita-serisi" class="py-16 px-6 bg-white">
        <div class="max-w-6xl mx-auto">
            <h2 class="font-display text-2xl font-bold text-mutlusan-gray-dark mb-8">Rita Serisi Ürünleri</h2>

            @php
                $ritaUrunleri = [
                    ['ad' => 'Rita Mek+Tuş Anahtar (Vidalı)', 'kod' => '2200 401 0280', 'gorsel' => 'edfa346f-be7'],
                    ['ad' => 'Rita Mek+Tuş Komütatör (Vidalı)', 'kod' => '2200 402 0280', 'gorsel' => '1eb5b814-ca6'],
                    ['ad' => 'Rita Mek+Tuş Vavien (İki Yollu) (Vidalı)', 'kod' => '2200 403 0280', 'gorsel' => 'e049ffa3-809'],
                    ['ad' => 'Rita Mek+Tuş Komütatör Vavien (Vidalı)', 'kod' => '2200 404 0280', 'gorsel' => '5bdc6092-415'],
                    ['ad' => 'Rita Mek+Tuş Çift Kutuplu Anahtar (Vidalı)', 'kod' => '2200 405 0280', 'gorsel' => '936658ff-55a'],
                    ['ad' => 'Rita Mek+Tuş Jaluzi Anahtarı (Vidalı)', 'kod' => '2200 406 0280', 'gorsel' => 'ebfa0fd2-0d7'],
                    ['ad' => 'Rita Mek+Tuş Çağırma (Vidalı)', 'kod' => '2200 407 0280', 'gorsel' => 'e4bd814d-21d'],
                    ['ad' => 'Rita Mek+Tuş Kapı Otomatiği Anahtarı (Vidalı)', 'kod' => '2200 407 0280K', 'gorsel' => '858ed52b-90e'],
                    ['ad' => 'Rita Mek+Tuş Zil Anahtarı (Vidalı)', 'kod' => '2200 407 0280Z', 'gorsel' => 'c5977bb6-82e'],
                    ['ad' => 'Rita Mek+Tuş Deviatör (Ara Vavien) (Vidalı)', 'kod' => '2200 408 0280', 'gorsel' => 'e6783947-049'],
                    ['ad' => 'Rita Mek+Tuş Üçlü Anahtar (Vidalı)', 'kod' => '2200 409 0280', 'gorsel' => '88488cb4-42f'],
                    ['ad' => 'Rita Mek+Tuş Şofben Anahtarı (Vidalı)', 'kod' => '2200 411 0280', 'gorsel' => '200b2240-34d'],
                ];
            @endphp

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-5">
                @foreach ($ritaUrunleri as $urun)
                    <div class="bg-mutlusan-gray-light rounded-2xl overflow-hidden group">
                        <div class="aspect-square flex items-center justify-center p-4">
                            <img src="https://www.mutlusan.com.tr/images/product/thumbs/{{ $urun['gorsel'] }}.jpg"
                                 alt="{{ $urun['ad'] }}"
                                 class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300"
                                 loading="lazy">
                        </div>
                        <div class="p-4 pt-0 bg-white">
                            <h4 class="text-sm font-semibold text-mutlusan-gray-dark leading-snug">{{ $urun['ad'] }}</h4>
                            <p class="text-xs text-mutlusan-gray mt-1">{{ $urun['kod'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection

@push('scripts')
<script>
(function () {
    const btn = document.querySelector('[data-toggle-more]');
    const content = document.querySelector('[data-more-content]');
    const label = document.querySelector('[data-toggle-more-label]');
    const icon = document.querySelector('[data-toggle-more-icon]');
    if (!btn || !content) return;

    btn.addEventListener('click', () => {
        const isOpen = !content.classList.contains('hidden');
        content.classList.toggle('hidden');
        label.textContent = isOpen ? 'Daha fazla bilgi' : 'Daha az göster';
        icon.style.transform = isOpen ? 'rotate(0deg)' : 'rotate(180deg)';
    });
})();
</script>
@endpush
