@extends('layouts.app')

@section('title', 'Ürünler | Mutlusan Electric')
@section('description', 'Mutlusan Electric ürün grupları: anahtar-priz sistemleri, kablo kanalları, aydınlatma, tesisat ve endüstriyel çözümler.')

@section('content')

    {{-- Üst banner --}}
    <section class="relative bg-mutlusan-gray-dark pt-40 pb-16 px-6" data-no-reveal>
        <div class="max-w-4xl mx-auto text-center">
            <div class="text-white/50 text-sm mb-4">
                <a href="{{ url('/') }}" class="hover:text-white transition-colors">Ana Sayfa</a>
                <span class="mx-2">/</span>
                <span class="text-white/80">Ürünler</span>
            </div>
            <h1 class="font-display text-4xl sm:text-5xl font-bold text-white">Ürün Grupları</h1>
            <p class="mt-4 text-white/60 max-w-xl mx-auto">
                10.000'in üzerinde ürünle elektrik sektöründe geniş bir çözüm yelpazesi sunuyoruz.
            </p>
        </div>
    </section>

    {{-- Ana kategoriler - gerçek mutlusan.com.tr kategori görselleriyle --}}
    <section class="py-16 px-6 bg-white">
        <div class="max-w-6xl mx-auto">
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <a href="{{ url('/urunler/anahtar-priz-ve-grup-prizler') }}" class="group block rounded-2xl overflow-hidden bg-mutlusan-gray-light">
                    <div class="aspect-square bg-white flex items-center justify-center p-8">
                        <img src="https://www.mutlusan.com.tr/Images/product/5826e1b9-346e-4671-8900-9fe8f757a197.jpg"
                             alt="Anahtar, Priz ve Grup Prizler" class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-5 text-center">
                        <h3 class="font-display font-bold text-mutlusan-gray-dark">Anahtar, Priz ve Grup Prizler</h3>
                    </div>
                </a>

                <a href="#" class="group block rounded-2xl overflow-hidden bg-mutlusan-gray-light">
                    <div class="aspect-square bg-white flex items-center justify-center p-8">
                        <img src="https://www.mutlusan.com.tr/Images/product/801ec891-29c7-48cc-8b7f-68ecb659bd6d.jpg"
                             alt="Kablo Kanalları Grubu" class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-5 text-center">
                        <h3 class="font-display font-bold text-mutlusan-gray-dark">Kablo Kanalları Grubu</h3>
                    </div>
                </a>

                <a href="#" class="group block rounded-2xl overflow-hidden bg-mutlusan-gray-light">
                    <div class="aspect-square bg-white flex items-center justify-center p-8">
                        <img src="https://www.mutlusan.com.tr/Images/product/d71b4672-f36e-4112-bf83-ca88094e2a06.jpg"
                             alt="Tesisat Grubu" class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-5 text-center">
                        <h3 class="font-display font-bold text-mutlusan-gray-dark">Tesisat Grubu</h3>
                    </div>
                </a>

                <a href="#" class="group block rounded-2xl overflow-hidden bg-mutlusan-gray-light">
                    <div class="aspect-square bg-white flex items-center justify-center p-8">
                        <img src="https://www.mutlusan.com.tr/Images/product/959a2597-26ea-4f97-8ad7-7e1413efb3e4.jpg"
                             alt="Aydınlatma Grubu" class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-5 text-center">
                        <h3 class="font-display font-bold text-mutlusan-gray-dark">Aydınlatma Grubu</h3>
                    </div>
                </a>

                <a href="#" class="group block rounded-2xl overflow-hidden bg-mutlusan-gray-light">
                    <div class="aspect-square bg-white flex items-center justify-center p-8">
                        <span class="text-mutlusan-gray text-sm text-center px-4">Otomasyon Grubu<br><span class="text-xs opacity-60">(görsel yakında)</span></span>
                    </div>
                    <div class="p-5 text-center">
                        <h3 class="font-display font-bold text-mutlusan-gray-dark">Otomasyon Grubu</h3>
                    </div>
                </a>

                <a href="{{ url('/urunler/salt-urunleri') }}" class="group block rounded-2xl overflow-hidden bg-mutlusan-gray-light">
                    <div class="aspect-square bg-white flex items-center justify-center p-8">
                        <img src="{{ asset('images/urunler/salt-grubu.jpg') }}" alt="Şalt Ürünleri" class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-5 text-center">
                        <h3 class="font-display font-bold text-mutlusan-gray-dark">Şalt Ürünleri</h3>
                    </div>
                </a>

            </div>
        </div>
    </section>


@endsection
