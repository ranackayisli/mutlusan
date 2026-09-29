@extends('layouts.app')

{{-- Metinler: lang/en/about.php --}}
@section('title', __('about.meta_title'))
@section('description', __('about.meta_description'))

@section('content')

    {{-- Banner: başlık görselin içinde değil, HTML metni olarak (çevrilebilsin diye) --}}
    <section class="relative w-full" data-no-reveal data-dark-banner>
        <img src="{{ asset('images/hakkimizda-banner.jpg') }}" alt=""
             class="w-full h-[280px] sm:h-[360px] lg:h-[420px] object-cover">
        <h1 class="absolute inset-x-0 top-[53%] -translate-y-1/2 px-6 text-center text-white uppercase font-normal leading-none tracking-[0.04em] text-[clamp(2.25rem,6.5vw,6rem)] [text-shadow:0_2px_12px_rgba(0,0,0,0.35)]">
            {{ __('about.title') }}
        </h1>
    </section>

    {{-- Breadcrumb --}}
    <nav class="max-w-4xl mx-auto px-6 pt-6 text-sm text-mutlusan-gray" aria-label="Breadcrumb">
        <a href="{{ url('/') }}" class="hover:text-mutlusan-red transition-colors">{{ __('Home') }}</a>
        <span class="mx-2">/</span>
        <span class="text-mutlusan-gray-dark font-medium">{{ __('about.title') }}</span>
    </nav>

    {{-- Ana metin: hafif kırmızı çizgili desen arka plan --}}
    <section class="hakkimizda-texture py-16 px-6">
        <div class="relative max-w-3xl mx-auto space-y-6 text-mutlusan-gray leading-relaxed text-[1.05rem]">
            @foreach (__('about.paragraphs') as $paragraph)
                <p>{{ $paragraph }}</p>
            @endforeach
        </div>
    </section>

    {{-- Belgeler / statüler --}}
    <section class="py-16 px-6 bg-mutlusan-gray-light">
        <div class="max-w-5xl mx-auto grid sm:grid-cols-3 gap-6 text-center">
            @foreach (__('about.highlights') as $highlight)
                <div class="bg-white rounded-2xl p-8">
                    <div class="text-mutlusan-red font-display font-bold text-lg">{{ $highlight['title'] }}</div>
                    <p class="mt-2 text-sm text-mutlusan-gray">{{ $highlight['text'] }}</p>
                </div>
            @endforeach
        </div>
    </section>

@endsection
