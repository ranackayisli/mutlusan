@extends('layouts.app')

@section('title', $grup['ad'] . ' | Mutlusan Electric')
@section('description', $grup['aciklama'])

@section('content')

    <section class="relative bg-mutlusan-gray-dark pt-40 pb-16 px-6" data-no-reveal>
        <div class="max-w-4xl mx-auto text-center">
            <div class="text-white/50 text-sm mb-4">
                <a href="{{ url('/') }}" class="hover:text-white transition-colors">Ana Sayfa</a>
                <span class="mx-2">/</span>
                <a href="{{ url('/urunler') }}" class="hover:text-white transition-colors">Ürünler</a>
                <span class="mx-2">/</span>
                <span class="text-white/80">{{ $grup['ad'] }}</span>
            </div>
            <h1 class="font-display text-4xl sm:text-5xl font-bold text-white">{{ $grup['ad'] }}</h1>
            <p class="mt-4 text-white/60 max-w-xl mx-auto">{{ $grup['aciklama'] }}</p>
        </div>
    </section>

    <section class="py-20 px-6 bg-white" data-no-reveal>
        <div class="max-w-2xl mx-auto text-center">
            <h2 class="font-display text-2xl font-bold text-mutlusan-gray-dark">Bu ürün grubunun sayfası hazırlanıyor</h2>
            <p class="mt-4 text-mutlusan-gray leading-relaxed">
                {{ $grup['ad'] }} ürünlerimizi çok yakında burada bulabileceksiniz.
                Bu sırada diğer ürün gruplarımıza göz atabilir veya bizimle iletişime geçebilirsiniz.
            </p>
            <div class="mt-8 flex flex-wrap justify-center gap-3">
                <a href="{{ url('/urunler') }}" class="inline-flex items-center px-7 py-3 bg-mutlusan-red text-white text-sm font-semibold rounded-full hover:bg-mutlusan-red-dark transition-colors">Tüm Ürün Grupları</a>
                <a href="{{ url('/iletisim') }}" class="inline-flex items-center px-7 py-3 border border-mutlusan-gray/30 text-mutlusan-gray-dark text-sm font-semibold rounded-full hover:bg-mutlusan-gray-light transition-colors">İletişim</a>
            </div>
        </div>
    </section>

@endsection
