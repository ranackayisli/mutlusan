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

            <form action="{{ url('/urunler') }}" method="GET" class="mt-8 relative max-w-md mx-auto">
                <input type="text" name="q" value="{{ $q ?? '' }}" placeholder="Ürün kodu veya açıklama ara..."
                       class="w-full rounded-full bg-white/95 px-5 py-3.5 pr-12 text-sm text-mutlusan-gray-dark placeholder:text-mutlusan-gray focus:outline-none focus:ring-2 focus:ring-mutlusan-red">
                <button type="submit" aria-label="Ara" class="absolute right-1.5 top-1/2 -translate-y-1/2 w-9 h-9 rounded-full bg-mutlusan-red hover:bg-mutlusan-red-dark transition-colors flex items-center justify-center text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" /></svg>
                </button>
            </form>
        </div>
    </section>

    {{-- Arama sonuçları (?q=...) --}}
    @if (($sonuclar ?? null) !== null)
        <section class="py-12 px-6 bg-mutlusan-gray-light" data-no-reveal>
            <div class="max-w-6xl mx-auto">
                <h2 class="font-display text-2xl font-bold text-mutlusan-gray-dark">
                    "{{ $q }}" için {{ $sonuclar->count() }} sonuç
                </h2>
                @if ($sonuclar->count() >= 60)
                    <p class="mt-1 text-sm text-mutlusan-gray">İlk 60 sonuç gösteriliyor, aramayı daraltabilirsiniz.</p>
                @endif

                @if ($sonuclar->isEmpty())
                    <p class="mt-6 text-mutlusan-gray">Aramanızla eşleşen ürün bulunamadı. Ürün kodunun bir kısmını yazmayı deneyin (örn. MTS06).</p>
                @else
                    <div class="mt-6 grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($sonuclar as $urun)
                            @php
                                $hedef = match ($urun->category?->parent?->slug) {
                                    'salt-urunleri' => url('/urunler/salt-urunleri'),
                                    'anahtar-priz-ve-grup-prizler' => url('/urunler/anahtar-priz'),
                                    default => url('/urunler'),
                                };
                            @endphp
                            <a href="{{ $hedef }}" class="block bg-white rounded-2xl p-5 hover:shadow-md transition-shadow">
                                <div class="flex items-center justify-between gap-2">
                                    <span class="font-display font-bold text-mutlusan-red">{{ $urun->code }}</span>
                                    @if ($urun->pole)
                                        <span class="text-xs font-semibold bg-mutlusan-gray-light rounded-full px-2.5 py-1">{{ $urun->pole }}</span>
                                    @endif
                                </div>
                                <p class="mt-2 text-sm text-mutlusan-gray-dark leading-snug">{{ $urun->description }}</p>
                                <p class="mt-3 text-xs text-mutlusan-gray">
                                    {{ $urun->category?->parent?->name }} → {{ $urun->category?->name }}
                                </p>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- Ana kategoriler - gerçek mutlusan.com.tr kategori görselleriyle --}}
    <section class="py-16 px-6 bg-white">
        <div class="max-w-6xl mx-auto">
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <a href="{{ url('/urunler/anahtar-priz') }}" class="group block rounded-2xl overflow-hidden bg-mutlusan-gray-light">
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
