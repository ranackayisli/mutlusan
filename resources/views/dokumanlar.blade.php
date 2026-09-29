@extends('layouts.app')

@section('title', 'Doküman Merkezi | Mutlusan Electric')
@section('description', 'Mutlusan Electric kataloglar, teknik föyler, sertifikalar ve uygulama kılavuzları.')

@section('content')

    <section class="relative bg-mutlusan-gray-dark pt-40 pb-16 px-6" data-no-reveal>
        <div class="max-w-4xl mx-auto text-center">
            <div class="text-white/50 text-sm mb-4">
                <a href="{{ url('/') }}" class="hover:text-white transition-colors">Ana Sayfa</a>
                <span class="mx-2">/</span>
                <span class="text-white/80">Dokümanlar</span>
            </div>
            <h1 class="font-display text-4xl sm:text-5xl font-bold text-white">Doküman Merkezi</h1>
            <p class="mt-4 text-white/60 max-w-xl mx-auto">Kataloglar, teknik föyler, sertifikalar ve uygulama kılavuzları.</p>

            <form action="{{ url('/dokumanlar') }}" method="GET" class="mt-8 relative max-w-md mx-auto">
                @if ($tur !== '')
                    <input type="hidden" name="tur" value="{{ $tur }}">
                @endif
                <input type="text" name="q" value="{{ $q }}" placeholder="Doküman ara..."
                       class="w-full rounded-full bg-white/95 px-5 py-3.5 text-sm text-mutlusan-gray-dark placeholder:text-mutlusan-gray focus:outline-none focus:ring-2 focus:ring-mutlusan-red">
            </form>
        </div>
    </section>

    <section class="py-14 px-6 bg-white" data-no-reveal>
        <div class="max-w-5xl mx-auto">

            <div class="flex flex-wrap gap-2 mb-8">
                <a href="{{ url('/dokumanlar') . ($q !== '' ? '?q=' . urlencode($q) : '') }}"
                   class="px-4 py-2 rounded-full text-sm font-semibold {{ $tur === '' ? 'bg-mutlusan-red text-white' : 'bg-mutlusan-gray-light text-mutlusan-gray hover:bg-mutlusan-gray/10' }}">Tümü</a>
                @foreach ($turler as $t)
                    <a href="{{ url('/dokumanlar') . '?' . http_build_query(array_filter(['q' => $q, 'tur' => $t])) }}"
                       class="px-4 py-2 rounded-full text-sm font-semibold {{ $tur === $t ? 'bg-mutlusan-red text-white' : 'bg-mutlusan-gray-light text-mutlusan-gray hover:bg-mutlusan-gray/10' }}">{{ $t }}</a>
                @endforeach
            </div>

            @if ($dokumanlar->isEmpty())
                <p class="text-mutlusan-gray">Aramanızla eşleşen doküman bulunamadı.</p>
            @else
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
                    @foreach ($dokumanlar as $dok)
                        <div class="bg-mutlusan-gray-light rounded-2xl p-5">
                            <span class="text-[0.65rem] font-bold tracking-wide uppercase text-mutlusan-red">{{ $dok['tur'] }}</span>
                            <h3 class="mt-1 font-display font-bold text-mutlusan-gray-dark">{{ $dok['ad'] }}</h3>
                            <p class="mt-1 text-xs text-mutlusan-gray">{{ $dok['boyut'] }}</p>
                        </div>
                    @endforeach
                </div>
            @endif

            <p class="mt-10 text-sm text-mutlusan-gray">İndirilebilir dosyalar yakında eklenecektir.</p>
        </div>
    </section>

@endsection
