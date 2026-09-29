@extends('layouts.app')

@section('title', 'Anahtar, Priz ve Grup Prizler | Mutlusan Electric')
@section('description', 'Rita, Elitra Plus, Candela, Daria ve Bron serileri ile ev ve iş yerleri için anahtar, priz ve grup priz çözümleri.')

@section('content')

    {{-- Banner görseli + üzerine bindirilmiş yazı --}}
    <section class="relative w-full pt-24 overflow-hidden" data-no-reveal>
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
                <span class="text-mutlusan-gray-dark font-medium">{{ $kategori->name }}</span>
            </div>

            <h1 class="font-display text-4xl sm:text-5xl font-bold text-mutlusan-gray-dark">
                {{ $kategori->name }}
            </h1>
            <p class="mt-5 text-mutlusan-gray text-lg leading-relaxed max-w-3xl">
                {{ $kategori->description }}
            </p>
        </div>
    </section>

    {{-- Ürün kategorileri --}}
    <section class="py-14 px-6 bg-mutlusan-gray-light">
        <div class="max-w-6xl mx-auto">
            <h2 class="font-display text-3xl font-bold text-mutlusan-gray-dark mb-8">Ürün kategorileri</h2>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse ($kategori->children as $altKategori)
                    <a href="#{{ $altKategori->slug }}" class="group block bg-white rounded-2xl overflow-hidden">
                        <div class="aspect-square flex items-center justify-center p-6">
                            @if ($altKategori->image)
                                <img src="{{ \Illuminate\Support\Str::startsWith($altKategori->image, 'http') ? $altKategori->image : asset('storage/' . $altKategori->image) }}"
                                     alt="{{ $altKategori->name }}" class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300">
                            @elseif ($altKategori->products->first()?->image)
                                <img src="{{ $altKategori->products->first()->image }}"
                                     alt="{{ $altKategori->name }}" class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300">
                            @else
                                <span class="text-mutlusan-gray text-xs text-center">Görsel<br>yok</span>
                            @endif
                        </div>
                        <div class="px-5 pb-5 text-center">
                            <h3 class="font-semibold text-mutlusan-gray-dark">{{ $altKategori->name }}</h3>
                        </div>
                    </a>
                @empty
                    <p class="text-mutlusan-gray col-span-full">Bu kategoriye henüz alt kategori eklenmedi. Admin panelinden "Kategoriler" &rarr; "Yeni Kategori" ile ekleyebilirsin.</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- Her alt kategorinin ürünleri --}}
    @foreach ($kategori->children as $altKategori)
        <section id="{{ $altKategori->slug }}" class="py-16 px-6 bg-white">
            <div class="max-w-6xl mx-auto">
                <h2 class="font-display text-2xl font-bold text-mutlusan-gray-dark mb-8">{{ $altKategori->name }} Ürünleri</h2>

                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-5">
                    @forelse ($altKategori->products as $urun)
                        <div class="bg-mutlusan-gray-light rounded-2xl overflow-hidden group">
                            <div class="aspect-square flex items-center justify-center p-4">
                                @if ($urun->image)
                                    <img src="{{ \Illuminate\Support\Str::startsWith($urun->image, 'http') ? $urun->image : asset('storage/' . $urun->image) }}"
                                         alt="{{ $urun->description }}"
                                         class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300"
                                         loading="lazy">
                                @endif
                            </div>
                            <div class="p-4 pt-0 bg-white">
                                <h4 class="text-sm font-semibold text-mutlusan-gray-dark leading-snug">{{ $urun->description }}</h4>
                                <p class="text-xs text-mutlusan-gray mt-1">{{ $urun->code }}</p>
                            </div>
                        </div>
                    @empty
                        <p class="text-mutlusan-gray col-span-full">Henüz ürün eklenmedi.</p>
                    @endforelse
                </div>
            </div>
        </section>
    @endforeach

@endsection
