@extends('layouts.app')

@section('title', 'Hakkımızda | Mutlusan Electric')
@section('description', '1983\'ten bu yana Mutlusan Electric\'in hikayesi, üretim gücü ve vizyonu.')

@section('content')

    {{-- Banner görseli - başlık zaten görselin içinde --}}
    <section class="relative w-full" data-no-reveal data-dark-banner>
        <img src="{{ asset('images/hakkimizda-banner.jpg') }}" alt="Mutlusan Electric Hakkımızda"
             class="w-full h-[280px] sm:h-[360px] lg:h-[420px] object-cover">
    </section>

    {{-- Küçük breadcrumb, banner'ın hemen altında --}}
    <div class="max-w-4xl mx-auto px-6 pt-6 text-sm text-mutlusan-gray">
        <a href="{{ url('/') }}" class="hover:text-mutlusan-red transition-colors">Ana Sayfa</a>
        <span class="mx-2">/</span>
        <span class="text-mutlusan-gray-dark font-medium">Hakkımızda</span>
    </div>

    {{-- Ana metin - hafif kırmızı çizgili desen arka plan --}}
    <section class="hakkimizda-texture py-16 px-6">
        <div class="relative max-w-3xl mx-auto space-y-6 text-mutlusan-gray leading-relaxed text-[1.05rem]">
            <p>
                1983 yılında İstanbul Karaköy'de çıktığımız bu yolda, sektöre ve ülkemize duyduğumuz güvenle
                faaliyetlerimize başladık. Bugün, 50.000 m² kapalı üretim alanımız ve 700'ün üzerinde çalışanımızla,
                elektrik sektöründe öncü bir konuma ulaşmış olmanın gururunu yaşıyoruz. %100 yerli sermaye ile
                hareket ediyor, geleneksel değerlerimizden ödün vermeden; yenilikçi, müşteri odaklı ve sürdürülebilir
                bir üretim anlayışını benimsiyoruz. Tüm süreçlerimizde uluslararası kalite standartlarını esas alarak,
                yüksek güvenilirliğe sahip ürünler geliştiriyoruz.
            </p>
            <p>
                T.C. Sanayi ve Teknoloji Bakanlığı onaylı Ar-Ge Merkezi statüsünde faaliyet gösteriyor; ürünlerimizi
                teknoloji odaklı, yenilikçi ve kullanıcı ihtiyaçlarına duyarlı bir mühendislik yaklaşımıyla
                tasarlıyoruz. Ar-Ge gücümüzle sektöre yüksek katma değerli çözümler sunuyoruz. Ayrıca, T.C. Ticaret
                Bakanlığı destekli TURQUALITY Marka Destek Programı kapsamında yer alarak, küresel pazarlarda
                markamızı daha güçlü temsil ediyoruz.
            </p>
            <p>
                Uluslararası rekabet gücümüzü her geçen gün artırıyoruz. Geniş ürün yelpazemizle; anahtar priz
                sistemlerinden modüler çözümlere, kablo taşıma sistemlerinden şalt, ray klemens, pano ve otomasyon
                ekipmanlarına, elektrikli araç şarj istasyonlarından aydınlatma ürünlerine kadar pek çok alanda
                faaliyet gösteriyoruz.
            </p>
            <p>
                Ürünlerimizde mühendislik kalitesini, performansı ve estetiği ön planda tutuyoruz. Bugün Türkiye'nin
                81 ilinde yaygın bayi ve satış ağımızla hizmet veriyor, 85'ten fazla ülkeye gerçekleştirdiğimiz
                ihracatla global ölçekte güçlü bir oyuncu olma vizyonumuzu sürdürüyoruz. Geleceğe yaptığımız
                yatırımlarla büyümeye devam ederken, teknoloji, kalite ve güven odaklı üretim anlayışımızla
                sektörümüze değer katmayı sürdürüyoruz.
            </p>
        </div>
    </section>

    {{-- Belgeler / statüler --}}
    <section class="py-16 px-6 bg-mutlusan-gray-light">
        <div class="max-w-5xl mx-auto grid sm:grid-cols-3 gap-6 text-center">
            <div class="bg-white rounded-2xl p-8">
                <div class="text-mutlusan-red font-display font-bold text-lg">Ar-Ge Merkezi</div>
                <p class="mt-2 text-sm text-mutlusan-gray">T.C. Sanayi ve Teknoloji Bakanlığı onaylı</p>
            </div>
            <div class="bg-white rounded-2xl p-8">
                <div class="text-mutlusan-red font-display font-bold text-lg">TURQUALITY</div>
                <p class="mt-2 text-sm text-mutlusan-gray">T.C. Ticaret Bakanlığı destekli Marka Destek Programı</p>
            </div>
            <div class="bg-white rounded-2xl p-8">
                <div class="text-mutlusan-red font-display font-bold text-lg">%100 Yerli Sermaye</div>
                <p class="mt-2 text-sm text-mutlusan-gray">Köklü, bağımsız ve sürdürülebilir üretim</p>
            </div>
        </div>
    </section>

@endsection
