@extends('layouts.app')

@section('title', 'Şalt Ürünleri | Mutlusan Electric')
@section('description', 'Otomatik sigortalar, kaçak akım koruma röleleri, kontaktörler, termik röleler ve motor koruma şalterleri.')

@section('content')

    {{-- Banner görseli - "Şalt Grubu" başlığı zaten görselin içinde --}}
    <section class="relative w-full pt-24" data-no-reveal>
        <img src="{{ asset('images/salt-urunleri-banner.jpg') }}" alt="{{ $kategori->name }}"
             class="w-full h-[220px] sm:h-[300px] lg:h-[360px] object-cover">
    </section>

    {{-- Breadcrumb + açıklama --}}
    <section class="pt-8 pb-14 px-6 bg-white">
        <div class="max-w-4xl">
            <div class="text-mutlusan-gray text-sm mb-5">
                <a href="{{ url('/') }}" class="hover:text-mutlusan-red transition-colors">Ana Sayfa</a>
                <span class="mx-2">/</span>
                <a href="{{ url('/urunler') }}" class="hover:text-mutlusan-red transition-colors">Ürünler</a>
                <span class="mx-2">/</span>
                <span class="text-mutlusan-gray-dark font-medium">{{ $kategori->name }}</span>
            </div>

            <h1 class="sr-only">{{ $kategori->name }}</h1>

            <p class="text-mutlusan-gray text-lg leading-relaxed max-w-3xl">
                {{ $kategori->description }}
            </p>
        </div>
    </section>

    {{-- Alt kategori sekmeleri + animasyonlu ürün paneli --}}
    <section class="py-14 px-6 bg-mutlusan-gray-light" data-salt-section>
        <div class="max-w-7xl mx-auto">

            {{-- Sekme butonları --}}
            <div class="flex flex-wrap gap-3 mb-10" data-salt-tabs>
                @foreach ($kategori->children as $i => $altKategori)
                    <button type="button"
                            class="salt-tab {{ $i === 0 ? 'salt-tab--active' : '' }}"
                            data-salt-tab
                            data-target="salt-panel-{{ $i }}">
                        {{ $altKategori->name }}
                        <span class="salt-tab__count">{{ $altKategori->products->count() }}</span>
                    </button>
                @endforeach
            </div>

            {{-- Ürün panelleri --}}
            <div class="relative" data-salt-panels>
                @foreach ($kategori->children as $i => $altKategori)
                    <div id="salt-panel-{{ $i }}" class="salt-panel {{ $i === 0 ? 'salt-panel--active' : '' }}" data-salt-panel>
                        <div class="salt-pole-filter" data-salt-pole-filter></div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4" data-salt-grid data-no-reveal-items>
                            @foreach ($altKategori->products as $urun)
                                <div class="salt-card" data-salt-card data-kutup="{{ $urun->pole }}">
                                    <div class="salt-card__code">{{ $urun->code }}</div>
                                    @if (!empty($urun->pole))
                                        <div class="salt-card__pole">{{ $urun->pole }}</div>
                                    @endif
                                    <div class="salt-card__desc">{{ $urun->description }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
