@extends('layouts.app')

@section('title', 'Şalt Ürünleri | Mutlusan Electric')
@section('description', 'Otomatik sigortalar, kaçak akım koruma röleleri, kontaktörler, termik röleler ve motor koruma şalterleri.')

@section('content')

    {{-- Banner görseli - "Şalt Grubu" başlığı zaten görselin içinde --}}
    <section class="relative w-full pt-20" data-no-reveal>
        <img src="{{ asset('images/salt-urunleri-banner.jpg') }}" alt="Şalt Grubu - Ultra Enerji Kontrolü"
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
                <span class="text-mutlusan-gray-dark font-medium">Şalt Ürünleri</span>
            </div>

            {{-- Görselde başlık zaten var; bu H1 sadece SEO/erişilebilirlik için, görsel olarak gizli --}}
            <h1 class="sr-only">Şalt Ürünleri</h1>

            <p class="text-mutlusan-gray text-lg leading-relaxed max-w-3xl">
                Otomatik sigortalardan kaçak akım koruma rölelerine, kontaktörlerden motor koruma
                şalterlerine kadar; konut ve endüstriyel tesisatlarda güvenli enerji dağıtımı için
                geniş bir şalt ürünleri yelpazesi sunuyoruz.
            </p>
        </div>
    </section>

    {{-- Alt kategori sekmeleri + animasyonlu ürün paneli --}}
    <section class="py-14 px-6 bg-mutlusan-gray-light" data-salt-section>
        <div class="max-w-7xl mx-auto">

            @php
    $saltGruplari = [
        'Otomatik Sigortalar' => [
            ['kod' => 'MTS06-1001C', 'kutup' => '1P', 'aciklama' => '6kA 1P 1A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-1002C', 'kutup' => '1P', 'aciklama' => '6kA 1P 2A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-1003C', 'kutup' => '1P', 'aciklama' => '6kA 1P 3A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-1004C', 'kutup' => '1P', 'aciklama' => '6kA 1P 4A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-1005C', 'kutup' => '1P', 'aciklama' => '6kA 1P 5A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-1006C', 'kutup' => '1P', 'aciklama' => '6kA 1P 6A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-1010C', 'kutup' => '1P', 'aciklama' => '6kA 1P 10A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-1016C', 'kutup' => '1P', 'aciklama' => '6kA 1P 16A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-1020C', 'kutup' => '1P', 'aciklama' => '6kA 1P 20A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-1025C', 'kutup' => '1P', 'aciklama' => '6kA 1P 25A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-1032C', 'kutup' => '1P', 'aciklama' => '6kA 1P 32A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-1040C', 'kutup' => '1P', 'aciklama' => '6kA 1P 40A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-1050C', 'kutup' => '1P', 'aciklama' => '6kA 1P 50A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-1063C', 'kutup' => '1P', 'aciklama' => '6kA 1P 63A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-2001C', 'kutup' => '2P', 'aciklama' => '6kA 2P 1A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-2002C', 'kutup' => '2P', 'aciklama' => '6kA 2P 2A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-2003C', 'kutup' => '2P', 'aciklama' => '6kA 2P 3A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-2004C', 'kutup' => '2P', 'aciklama' => '6kA 2P 4A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-2005C', 'kutup' => '2P', 'aciklama' => '6kA 2P 5A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-2006C', 'kutup' => '2P', 'aciklama' => '6kA 2P 6A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-2010C', 'kutup' => '2P', 'aciklama' => '6kA 2P 10A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-2016C', 'kutup' => '2P', 'aciklama' => '6kA 2P 16A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-2020C', 'kutup' => '2P', 'aciklama' => '6kA 2P 20A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-2025C', 'kutup' => '2P', 'aciklama' => '6kA 2P 25A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-2032C', 'kutup' => '2P', 'aciklama' => '6kA 2P 32A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-2040C', 'kutup' => '2P', 'aciklama' => '6kA 2P 40A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-2050C', 'kutup' => '2P', 'aciklama' => '6kA 2P 50A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-2063C', 'kutup' => '2P', 'aciklama' => '6kA 2P 63A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-3001C', 'kutup' => '3P', 'aciklama' => '6kA 3P 1A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-3002C', 'kutup' => '3P', 'aciklama' => '6kA 3P 2A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-3003C', 'kutup' => '3P', 'aciklama' => '6kA 3P 3A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-3004C', 'kutup' => '3P', 'aciklama' => '6kA 3P 4A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-3005C', 'kutup' => '3P', 'aciklama' => '6kA 3P 5A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-3006C', 'kutup' => '3P', 'aciklama' => '6kA 3P 6A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-3010C', 'kutup' => '3P', 'aciklama' => '6kA 3P 10A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-3016C', 'kutup' => '3P', 'aciklama' => '6kA 3P 16A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-3020C', 'kutup' => '3P', 'aciklama' => '6kA 3P 20A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-3025C', 'kutup' => '3P', 'aciklama' => '6kA 3P 25A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-3032C', 'kutup' => '3P', 'aciklama' => '6kA 3P 32A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-3040C', 'kutup' => '3P', 'aciklama' => '6kA 3P 40A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-3050C', 'kutup' => '3P', 'aciklama' => '6kA 3P 50A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-3063C', 'kutup' => '3P', 'aciklama' => '6kA 3P 63A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-4001C', 'kutup' => '4P', 'aciklama' => '6kA 4P 1A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-4002C', 'kutup' => '4P', 'aciklama' => '6kA 4P 2A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-4003C', 'kutup' => '4P', 'aciklama' => '6kA 4P 3A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-4004C', 'kutup' => '4P', 'aciklama' => '6kA 4P 4A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-4005C', 'kutup' => '4P', 'aciklama' => '6kA 4P 5A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-4006C', 'kutup' => '4P', 'aciklama' => '6kA 4P 6A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-4010C', 'kutup' => '4P', 'aciklama' => '6kA 4P 10A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-4016C', 'kutup' => '4P', 'aciklama' => '6kA 4P 16A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-4020C', 'kutup' => '4P', 'aciklama' => '6kA 4P 20A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-4025C', 'kutup' => '4P', 'aciklama' => '6kA 4P 25A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-4032C', 'kutup' => '4P', 'aciklama' => '6kA 4P 32A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-4040C', 'kutup' => '4P', 'aciklama' => '6kA 4P 40A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-4050C', 'kutup' => '4P', 'aciklama' => '6kA 4P 50A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS06-4063C', 'kutup' => '4P', 'aciklama' => '6kA 4P 63A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTH10-1080C', 'kutup' => '1P', 'aciklama' => '10kA 1P 80A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTH10-1100C', 'kutup' => '1P', 'aciklama' => '10kA 1P 100A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTH10-1125C', 'kutup' => '1P', 'aciklama' => '10kA 1P 125A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTH10-2080C', 'kutup' => '2P', 'aciklama' => '10kA 2P 80A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTH10-2100C', 'kutup' => '2P', 'aciklama' => '10kA 2P 100A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTH10-2125C', 'kutup' => '2P', 'aciklama' => '10kA 2P 125A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTH10-3080C', 'kutup' => '3P', 'aciklama' => '10kA 3P 80A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTH10-3100C', 'kutup' => '3P', 'aciklama' => '10kA 3P 100A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTH10-3125C', 'kutup' => '3P', 'aciklama' => '10kA 3P 125A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTH10-4080C', 'kutup' => '4P', 'aciklama' => '10kA 4P 80A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTH10-4100C', 'kutup' => '4P', 'aciklama' => '10kA 4P 100A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTH10-4125C', 'kutup' => '4P', 'aciklama' => '10kA 4P 125A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)'],
            ['kod' => 'MTS04-106CN', 'kutup' => '1P', 'aciklama' => '+ N         4.5kA 1P+N 6A OTOMATİK SİGORTA MINIATURE CIRCUIT BREAKER'],
            ['kod' => 'MTS04-110CN', 'kutup' => '1P', 'aciklama' => '+ N         4.5kA 1P+N 10A OTOMATİK SİGORTA MINIATURE CIRCUIT BREAKER'],
            ['kod' => 'MTS04-116CN', 'kutup' => '1P', 'aciklama' => '+ N         4.5kA 1P+N 16A OTOMATİK SİGORTA MINIATURE CIRCUIT BREAKER'],
            ['kod' => 'MTS04-120CN', 'kutup' => '1P', 'aciklama' => '+ N         4.5kA 1P+N 20A OTOMATİK SİGORTA MINIATURE CIRCUIT BREAKER'],
            ['kod' => 'MTS04-125CN', 'kutup' => '1P', 'aciklama' => '+ N         4.5kA 1P+N 25A OTOMATİK SİGORTA MINIATURE CIRCUIT BREAKER'],
            ['kod' => 'MTS04-132CN', 'kutup' => '1P', 'aciklama' => '+ N         4.5kA 1P+N 32A OTOMATİK SİGORTA MINIATURE CIRCUIT BREAKER'],
            ['kod' => 'MTS04-140CN', 'kutup' => '1P', 'aciklama' => '+ N         4.5kA 1P+N 40A OTOMATİK SİGORTA MINIATURE CIRCUIT BREAKER'],
        ],
        'Kaçak Akım Koruma Röleleri' => [
            ['kod' => 'MRC06-201016A', 'kutup' => '2P', 'aciklama' => '6kA 10mA 16A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC06-201025A', 'kutup' => '2P', 'aciklama' => '6kA 10mA 25A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC06-203016A', 'kutup' => '2P', 'aciklama' => '6kA 30mA 16A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC06-203020A', 'kutup' => '2P', 'aciklama' => '6kA 30mA 20A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC06-203025A', 'kutup' => '2P', 'aciklama' => '6kA 30mA 25A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC06-203032A', 'kutup' => '2P', 'aciklama' => '6kA 30mA 32A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC06-203040A', 'kutup' => '2P', 'aciklama' => '6kA 30mA 40A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC06-203050A', 'kutup' => '2P', 'aciklama' => '6kA 30mA 50A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC06-203063A', 'kutup' => '2P', 'aciklama' => '6kA 30mA 63A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC06-203080A', 'kutup' => '2P', 'aciklama' => '6kA 30mA 80A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC06-230016A', 'kutup' => '2P', 'aciklama' => '6kA 300mA 16A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC06-230020A', 'kutup' => '2P', 'aciklama' => '6kA 300mA 20A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC06-230025A', 'kutup' => '2P', 'aciklama' => '6kA 300mA 25A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC06-230032A', 'kutup' => '2P', 'aciklama' => '6kA 300mA 32A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC06-230040A', 'kutup' => '2P', 'aciklama' => '6kA 300mA 40A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC06-230050A', 'kutup' => '2P', 'aciklama' => '6kA 300mA 50A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC06-230063A', 'kutup' => '2P', 'aciklama' => '6kA 300mA 63A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC06-230080A', 'kutup' => '2P', 'aciklama' => '6kA 300mA 80A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC06-403016A', 'kutup' => '4P', 'aciklama' => '6kA 30mA 16A KAÇAK AKIM KORUMA     RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC06-403020A', 'kutup' => '4P', 'aciklama' => '6kA 30mA 20A KAÇAK AKIM KORUMA     RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC06-403025A', 'kutup' => '4P', 'aciklama' => '6kA 30mA 25A KAÇAK AKIM KORUMA     RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC06-403032A', 'kutup' => '4P', 'aciklama' => '6kA 30mA 32A KAÇAK AKIM KORUMA     RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC06-403040A', 'kutup' => '4P', 'aciklama' => '6kA 30mA 40A KAÇAK AKIM KORUMA     RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC06-403050A', 'kutup' => '4P', 'aciklama' => '6kA 30mA 50A KAÇAK AKIM KORUMA     RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC06-403063A', 'kutup' => '4P', 'aciklama' => '6kA 30mA 63A KAÇAK AKIM KORUMA     RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC06-403080A', 'kutup' => '4P', 'aciklama' => '6kA 30mA 80A KAÇAK AKIM KORUMA     RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC06-4030100A', 'kutup' => '4P', 'aciklama' => '6kA 30mA 100A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC06-430016A', 'kutup' => '4P', 'aciklama' => '6kA 30mA 16A KAÇAK AKIM KORUMA     RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC06-430020A', 'kutup' => '4P', 'aciklama' => '6kA 30mA 20A KAÇAK AKIM KORUMA     RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC06-430025A', 'kutup' => '4P', 'aciklama' => '6kA 300mA 25A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC06-430032A', 'kutup' => '4P', 'aciklama' => '6kA 300mA 32A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC06-430040A', 'kutup' => '4P', 'aciklama' => '6kA 300mA 40A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC06-430050A', 'kutup' => '4P', 'aciklama' => '6kA 300mA 50A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC06-430063A', 'kutup' => '4P', 'aciklama' => '6kA 300mA 63A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC06-430080A', 'kutup' => '4P', 'aciklama' => '6kA 300mA 80A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC06-4300100A', 'kutup' => '4P', 'aciklama' => '6kA 300mA 100A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC10-403016', 'kutup' => '4P', 'aciklama' => '10kA 30mA 16A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC10-403020', 'kutup' => '4P', 'aciklama' => '10kA 30mA 20A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC10-403025', 'kutup' => '4P', 'aciklama' => '10kA 30mA 25A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC10-403032', 'kutup' => '4P', 'aciklama' => '10kA 30mA 32A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC10-403040', 'kutup' => '4P', 'aciklama' => '10kA 30mA 40A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC10-403050', 'kutup' => '4P', 'aciklama' => '10kA 30mA 50A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC10-403063', 'kutup' => '4P', 'aciklama' => '10kA 30mA 63A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC10-403080', 'kutup' => '4P', 'aciklama' => '10kA 30mA 80A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC10-4030100', 'kutup' => '4P', 'aciklama' => '10kA 30mA 100A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC10-430016', 'kutup' => '4P', 'aciklama' => '10kA 30mA 16A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC10-430020', 'kutup' => '4P', 'aciklama' => '10kA 30mA 20A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC10-430025', 'kutup' => '4P', 'aciklama' => '10kA 300mA 25A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC10-430032', 'kutup' => '4P', 'aciklama' => '10kA 300mA 32A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC10-430040', 'kutup' => '4P', 'aciklama' => '10kA 300mA 40A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC10-430050', 'kutup' => '4P', 'aciklama' => '10kA 300mA 50A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC10-430063', 'kutup' => '4P', 'aciklama' => '10kA 300mA 63A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC10-430080', 'kutup' => '4P', 'aciklama' => '10kA 300mA 80A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC10-4300100', 'kutup' => '4P', 'aciklama' => '10kA 300mA 100A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC10-403016A', 'kutup' => '4P', 'aciklama' => '10kA 30mA 16A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC10-403020A', 'kutup' => '4P', 'aciklama' => '10kA 30mA 20A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC10-403025A', 'kutup' => '4P', 'aciklama' => '10kA 30mA 25A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC10-403032A', 'kutup' => '4P', 'aciklama' => '10kA 30mA 32A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC10-403050A', 'kutup' => '4P', 'aciklama' => '10kA 30mA 50A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC10-403063A', 'kutup' => '4P', 'aciklama' => '10kA 30mA 63A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC10-403080A', 'kutup' => '4P', 'aciklama' => '10kA 30mA 80A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC10-4030100A', 'kutup' => '4P', 'aciklama' => '10kA 30mA 100A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC10-430016A', 'kutup' => '4P', 'aciklama' => '10kA 30mA 16A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC10-430020A', 'kutup' => '4P', 'aciklama' => '10kA 30mA 20A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC10-430025A', 'kutup' => '4P', 'aciklama' => '10kA 300mA 25A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC10-430032A', 'kutup' => '4P', 'aciklama' => '10kA 300mA 32A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC10-430040A', 'kutup' => '4P', 'aciklama' => '10kA 300mA 40A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC10-430050A', 'kutup' => '4P', 'aciklama' => '10kA 300mA 50A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC10-430063A', 'kutup' => '4P', 'aciklama' => '10kA 300mA 63A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC10-430080A', 'kutup' => '4P', 'aciklama' => '10kA 300mA 80A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MRC10-4300100A', 'kutup' => '4P', 'aciklama' => '10kA 300mA 100A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
        ],
        'Kaçak Akım Korumalı Sigortalar (Elektronik)' => [
            ['kod' => 'MREO06-201006AC', 'kutup' => '2P', 'aciklama' => '6kA 10mA 6A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-201016AC', 'kutup' => '2P', 'aciklama' => '6kA 10mA 16A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-201020AC', 'kutup' => '2P', 'aciklama' => '6kA 10mA 20A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-201025AC', 'kutup' => '2P', 'aciklama' => '6kA 10mA 25A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-203006AC', 'kutup' => '2P', 'aciklama' => '6kA 30mA 6A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-203016AC', 'kutup' => '2P', 'aciklama' => '6kA 30mA 16A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-203020AC', 'kutup' => '2P', 'aciklama' => '6kA 30mA 20A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-203025AC', 'kutup' => '2P', 'aciklama' => '6kA 30mA 25A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-203032AC', 'kutup' => '2P', 'aciklama' => '6kA 30mA 32A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-203063AC', 'kutup' => '2P', 'aciklama' => '6kA 30mA 63A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-210006AC', 'kutup' => '2P', 'aciklama' => '6kA 100mA 6A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-210016AC', 'kutup' => '2P', 'aciklama' => '6kA 100mA 16A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-210020AC', 'kutup' => '2P', 'aciklama' => '6kA 100mA 20A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-210025AC', 'kutup' => '2P', 'aciklama' => '6kA 100mA 25A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-210032AC', 'kutup' => '2P', 'aciklama' => '6kA 100mA 32A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-210040AC', 'kutup' => '2P', 'aciklama' => '6kA 100mA 40A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-210063AC', 'kutup' => '2P', 'aciklama' => '6kA 100mA 63A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-230006AC', 'kutup' => '2P', 'aciklama' => '6kA 300mA 6A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-230016AC', 'kutup' => '2P', 'aciklama' => '6kA 300mA 16A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-230020AC', 'kutup' => '2P', 'aciklama' => '6kA 300mA 20A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-230025AC', 'kutup' => '2P', 'aciklama' => '6kA 300mA 25A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-230032AC', 'kutup' => '2P', 'aciklama' => '6kA 300mA 32A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-230063AC', 'kutup' => '2P', 'aciklama' => '6kA 300mA 63A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-201020A', 'kutup' => '2P', 'aciklama' => '6kA 10mA 20A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-201025A', 'kutup' => '2P', 'aciklama' => '6kA 10mA 25A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-203006A', 'kutup' => '2P', 'aciklama' => '6kA 30mA 6A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-203016A', 'kutup' => '2P', 'aciklama' => '6kA 30mA 16A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-203020A', 'kutup' => '2P', 'aciklama' => '6kA 30mA 20A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-203025A', 'kutup' => '2P', 'aciklama' => '6kA 30mA 25A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-203032A', 'kutup' => '2P', 'aciklama' => '6kA 30mA 32A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-203040A', 'kutup' => '2P', 'aciklama' => '6kA 30mA 40A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-203063A', 'kutup' => '2P', 'aciklama' => '6kA 30mA 63A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-210006A', 'kutup' => '2P', 'aciklama' => '6kA 100mA 6A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-210016A', 'kutup' => '2P', 'aciklama' => '6kA 100mA 16A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-210020A', 'kutup' => '2P', 'aciklama' => '6kA 100mA 20A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-210025A', 'kutup' => '2P', 'aciklama' => '6kA 100mA 25A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-210032A', 'kutup' => '2P', 'aciklama' => '6kA 100mA 32A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-210040A', 'kutup' => '2P', 'aciklama' => '6kA 100mA 40A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-210063A', 'kutup' => '2P', 'aciklama' => '6kA 100mA 63A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-230006A', 'kutup' => '2P', 'aciklama' => '6kA 300mA 6A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-230016A', 'kutup' => '2P', 'aciklama' => '6kA 300mA 16A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-230020A', 'kutup' => '2P', 'aciklama' => '6kA 300mA 20A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-230025A', 'kutup' => '2P', 'aciklama' => '6kA 300mA 25A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-230032A', 'kutup' => '2P', 'aciklama' => '6kA 300mA 32A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-230040A', 'kutup' => '2P', 'aciklama' => '6kA 300mA 40A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
            ['kod' => 'MREO06-230063A', 'kutup' => '2P', 'aciklama' => '6kA 300mA 63A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER'],
        ],
        'Kaçak Akım Korumalı Sigortalar (Mekanik)' => [
            ['kod' => 'MRCO06-201006AC', 'kutup' => '2P', 'aciklama' => '6kA AC TİPİ 10mA 6A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-201016AC', 'kutup' => '2P', 'aciklama' => '6kA AC TİPİ 10mA 16A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-201020AC', 'kutup' => '2P', 'aciklama' => '6kA AC TİPİ 10mA 20A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-203025AC', 'kutup' => '2P', 'aciklama' => '6kA AC TİPİ 10mA 25A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-203006AC', 'kutup' => '2P', 'aciklama' => '6kA AC TİPİ 30mA 6A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-203016AC', 'kutup' => '2P', 'aciklama' => '6kA AC TİPİ 30mA 16A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-203020AC', 'kutup' => '2P', 'aciklama' => '6kA AC TİPİ 30mA 20A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-203025AC', 'kutup' => '2P', 'aciklama' => '6kA AC TİPİ 30mA 25A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-203032AC', 'kutup' => '2P', 'aciklama' => '6kA AC TİPİ 30mA 32A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-203040AC', 'kutup' => '2P', 'aciklama' => '6kA AC TİPİ 30mA 40A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-203063AC', 'kutup' => '2P', 'aciklama' => '6kA AC TİPİ 30mA 63A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-210006AC', 'kutup' => '2P', 'aciklama' => '6kA AC TİPİ 100mA 6A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-210016AC', 'kutup' => '2P', 'aciklama' => '6kA AC TİPİ 100mA 16A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-210020AC', 'kutup' => '2P', 'aciklama' => '6kA AC TİPİ 100mA 20A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-210025AC', 'kutup' => '2P', 'aciklama' => '6kA AC TİPİ 100mA 25A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-210032AC', 'kutup' => '2P', 'aciklama' => '6kA AC TİPİ 100mA 32A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-210040AC', 'kutup' => '2P', 'aciklama' => '6kA AC TİPİ 100mA 40A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-230063AC', 'kutup' => '2P', 'aciklama' => '6kA AC TİPİ 300mA 63A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-230006AC', 'kutup' => '2P', 'aciklama' => '6kA AC TİPİ 300mA 6A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-230016AC', 'kutup' => '2P', 'aciklama' => '6kA AC TİPİ 300mA 16A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-230020AC', 'kutup' => '2P', 'aciklama' => '6kA AC TİPİ 300mA 20A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-230025AC', 'kutup' => '2P', 'aciklama' => '6kA AC TİPİ 300mA 25A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-230032AC', 'kutup' => '2P', 'aciklama' => '6kA AC TİPİ 300mA 32A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-230040AC', 'kutup' => '2P', 'aciklama' => '6kA AC TİPİ 300mA 40A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-230063AC', 'kutup' => '2P', 'aciklama' => '6kA AC TİPİ 300mA 63A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-201006A', 'kutup' => '2P', 'aciklama' => '6kA A TİPİ 10mA 6A SİGORTALI KAÇAK AKIM KORUMA        RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-201016A', 'kutup' => '2P', 'aciklama' => '6kA A TİPİ 10mA 16A SİGORTALI KAÇAK AKIM KORUMA       RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-201020A', 'kutup' => '2P', 'aciklama' => '6kA A TİPİ 10mA 20A SİGORTALI KAÇAK AKIM KORUMA       RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-203025A', 'kutup' => '2P', 'aciklama' => '6kA A TİPİ 10mA 25A SİGORTALI KAÇAK AKIM KORUMA       RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-203006A', 'kutup' => '2P', 'aciklama' => '6kA A TİPİ 30mA 6A SİGORTALI KAÇAK AKIM KORUMA        RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-203016A', 'kutup' => '2P', 'aciklama' => '6kA A TİPİ 30mA 16A SİGORTALI KAÇAK AKIM KORUMA       RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-203020A', 'kutup' => '2P', 'aciklama' => '6kA A TİPİ 30mA 20A SİGORTALI KAÇAK AKIM KORUMA       RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-203025A', 'kutup' => '2P', 'aciklama' => '6kA A TİPİ 30mA 25A SİGORTALI KAÇAK AKIM KORUMA       RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-203032A', 'kutup' => '2P', 'aciklama' => '6kA A TİPİ 30mA 32A SİGORTALI KAÇAK AKIM KORUMA       RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-203040A', 'kutup' => '2P', 'aciklama' => '6kA A TİPİ 30mA 40A SİGORTALI KAÇAK AKIM KORUMA       RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-203063A', 'kutup' => '2P', 'aciklama' => '6kA A TİPİ 30mA 63A SİGORTALI KAÇAK AKIM KORUMA       RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-210006A', 'kutup' => '2P', 'aciklama' => '6kA A TİPİ 100mA 6A SİGORTALI KAÇAK AKIM KORUMA       RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-210016A', 'kutup' => '2P', 'aciklama' => '6kA A TİPİ 100mA 16A SİGORTALI KAÇAK AKIM KORUMA      RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-210020A', 'kutup' => '2P', 'aciklama' => '6kA A TİPİ 100mA 20A SİGORTALI KAÇAK AKIM KORUMA      RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-210025A', 'kutup' => '2P', 'aciklama' => '6kA A TİPİ 100mA 25A SİGORTALI KAÇAK AKIM KORUMA      RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-210032A', 'kutup' => '2P', 'aciklama' => '6kA A TİPİ 100mA 32A SİGORTALI KAÇAK AKIM KORUMA      RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-210040A', 'kutup' => '2P', 'aciklama' => '6kA A TİPİ 100mA 40A SİGORTALI KAÇAK AKIM KORUMA      RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-230063A', 'kutup' => '2P', 'aciklama' => '6kA A TİPİ 300mA 63A SİGORTALI KAÇAK AKIM KORUMA      RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-230006A', 'kutup' => '2P', 'aciklama' => '6kA A TİPİ 300mA 6A SİGORTALI KAÇAK AKIM KORUMA       RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-230016A', 'kutup' => '2P', 'aciklama' => '6kA A TİPİ 300mA 16A SİGORTALI KAÇAK AKIM KORUMA      RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-230020A', 'kutup' => '2P', 'aciklama' => '6kA A TİPİ 300mA 20A SİGORTALI KAÇAK AKIM KORUMA      RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-230025A', 'kutup' => '2P', 'aciklama' => '6kA A TİPİ 300mA 25A SİGORTALI KAÇAK AKIM KORUMA      RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-230032A', 'kutup' => '2P', 'aciklama' => '6kA A TİPİ 300mA 32A SİGORTALI KAÇAK AKIM KORUMA      RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-230040A', 'kutup' => '2P', 'aciklama' => '6kA A TİPİ 300mA 40A SİGORTALI KAÇAK AKIM KORUMA      RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
            ['kod' => 'MRCO06-230063A', 'kutup' => '2P', 'aciklama' => '6kA A TİPİ 300mA 63A SİGORTALI KAÇAK AKIM KORUMA      RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC'],
        ],
        'Termik Manyetik Şalterler' => [
            ['kod' => 'MTA25-3016', 'kutup' => '3P', 'aciklama' => '25kA 16A TERMİK MANYETİK ŞALTER - AYAR SAHALI   MODEL CASE CIRCUIT BREAKER 12-16'],
            ['kod' => 'MTA25-3025', 'kutup' => '3P', 'aciklama' => '25kA 25A TERMİK MANYETİK ŞALTER - AYAR SAHALI   MODEL CASE CIRCUIT BREAKER 16-25'],
            ['kod' => 'MTA25-3032', 'kutup' => '3P', 'aciklama' => '25kA 32A TERMİK MANYETİK ŞALTER - AYAR SAHALI   MODEL CASE CIRCUIT BREAKER 25-32'],
            ['kod' => 'MTA25-3040', 'kutup' => '3P', 'aciklama' => '25kA 40A TERMİK MANYETİK ŞALTER - AYAR SAHALI   MODEL CASE CIRCUIT BREAKER 32-40'],
            ['kod' => 'MTA25-3050', 'kutup' => '3P', 'aciklama' => '25kA 50A TERMİK MANYETİK ŞALTER - AYAR SAHALI   MODEL CASE CIRCUIT BREAKER 40-50'],
            ['kod' => 'MTA25-3063', 'kutup' => '3P', 'aciklama' => '25kA 63A TERMİK MANYETİK ŞALTER - AYAR SAHALI   MODEL CASE CIRCUIT BREAKER 50-63'],
            ['kod' => 'MTA25-3080', 'kutup' => '3P', 'aciklama' => '25kA 80A TERMİK MANYETİK ŞALTER - AYAR SAHALI   MODEL CASE CIRCUIT BREAKER 63-80'],
            ['kod' => 'MTA25-3100', 'kutup' => '3P', 'aciklama' => '25kA 100A TERMİK MANYETİK ŞALTER - AYAR SAHALI MODEL CASE CIRCUIT BREAKER 80-100'],
            ['kod' => 'MTA25-3125', 'kutup' => '3P', 'aciklama' => '25kA 125A TERMİK MANYETİK ŞALTER - AYAR SAHALI MODEL CASE CIRCUIT BREAKER 100-125'],
            ['kod' => 'MTA25-3160', 'kutup' => '3P', 'aciklama' => '25kA 160A TERMİK MANYETİK ŞALTER - AYAR SAHALI MODEL CASE CIRCUIT BREAKER 125-160'],
            ['kod' => 'MTA35-3100', 'kutup' => '3P', 'aciklama' => '35kA 100A TERMİK MANYETİK ŞALTER - AYAR SAHALI MODEL CASE CIRCUIT BREAKER 80-100'],
            ['kod' => 'MTA35-3125', 'kutup' => '3P', 'aciklama' => '35kA 125A TERMİK MANYETİK ŞALTER - AYAR SAHALI MODEL CASE CIRCUIT BREAKER 100-125'],
            ['kod' => 'MTA35-3160', 'kutup' => '3P', 'aciklama' => '35kA 160A TERMİK MANYETİK ŞALTER - AYAR SAHALI MODEL CASE CIRCUIT BREAKER 125-160'],
            ['kod' => 'MTA35-3200', 'kutup' => '3P', 'aciklama' => '35kA 200A TERMİK MANYETİK ŞALTER - AYAR SAHALI MODEL CASE CIRCUIT BREAKER 160-200'],
            ['kod' => 'MTA35-3250', 'kutup' => '3P', 'aciklama' => '35kA 250A TERMİK MANYETİK ŞALTER - AYAR SAHALI MODEL CASE CIRCUIT BREAKER 200-250'],
            ['kod' => 'MTA25-4016', 'kutup' => '4P', 'aciklama' => '25kA 16A TERMİK MANYETİK ŞALTER - AYAR SAHALI   MODEL CASE CIRCUIT BREAKER 12-16'],
            ['kod' => 'MTA25-4025', 'kutup' => '4P', 'aciklama' => '25kA 25A TERMİK MANYETİK ŞALTER - AYAR SAHALI   MODEL CASE CIRCUIT BREAKER 16-25'],
            ['kod' => 'MTA25-4032', 'kutup' => '4P', 'aciklama' => '25kA 32A TERMİK MANYETİK ŞALTER - AYAR SAHALI   MODEL CASE CIRCUIT BREAKER 25-32'],
            ['kod' => 'MTA25-4040', 'kutup' => '4P', 'aciklama' => '25kA 40A TERMİK MANYETİK ŞALTER - AYAR SAHALI   MODEL CASE CIRCUIT BREAKER 32-40'],
            ['kod' => 'MTA25-4050', 'kutup' => '4P', 'aciklama' => '25kA 50A TERMİK MANYETİK ŞALTER - AYAR SAHALI   MODEL CASE CIRCUIT BREAKER 40-50'],
            ['kod' => 'MTA25-4063', 'kutup' => '4P', 'aciklama' => '25kA 63A TERMİK MANYETİK ŞALTER - AYAR SAHALI   MODEL CASE CIRCUIT BREAKER 50-63'],
            ['kod' => 'MTA25-4080', 'kutup' => '4P', 'aciklama' => '25kA 80A TERMİK MANYETİK ŞALTER - AYAR SAHALI   MODEL CASE CIRCUIT BREAKER 63-80'],
            ['kod' => 'MTA25-4100', 'kutup' => '4P', 'aciklama' => '25kA 100A TERMİK MANYETİK ŞALTER - AYAR SAHALI MODEL CASE CIRCUIT BREAKER 80-100'],
            ['kod' => 'MTA25-4125', 'kutup' => '4P', 'aciklama' => '25kA 125A TERMİK MANYETİK ŞALTER - AYAR SAHALI MODEL CASE CIRCUIT BREAKER 100-125'],
            ['kod' => 'MTA25-4160', 'kutup' => '4P', 'aciklama' => '25kA 160A TERMİK MANYETİK ŞALTER - AYAR SAHALI MODEL CASE CIRCUIT BREAKER 125-160'],
            ['kod' => 'MTA35-4100', 'kutup' => '4P', 'aciklama' => '35kA 100A TERMİK MANYETİK ŞALTER - AYAR SAHALI MODEL CASE CIRCUIT BREAKER 80-100'],
            ['kod' => 'MTA35-4125', 'kutup' => '4P', 'aciklama' => '35kA 125A TERMİK MANYETİK ŞALTER - AYAR SAHALI MODEL CASE CIRCUIT BREAKER 100-125'],
            ['kod' => 'MTA35-4160', 'kutup' => '4P', 'aciklama' => '35kA 160A TERMİK MANYETİK ŞALTER - AYAR SAHALI MODEL CASE CIRCUIT BREAKER 125-160'],
            ['kod' => 'MTA35-4200', 'kutup' => '4P', 'aciklama' => '35kA 200A TERMİK MANYETİK ŞALTER - AYAR SAHALI MODEL CASE CIRCUIT BREAKER 160-200'],
            ['kod' => 'MTA35-4250', 'kutup' => '4P', 'aciklama' => '35kA 250A TERMİK MANYETİK ŞALTER - AYAR SAHALI MODEL CASE CIRCUIT BREAKER 200-250'],
        ],
        'Kaçak Akım Algılama Röleleri' => [
            ['kod' => 'MTC00-040', 'kutup' => '40MM', 'aciklama' => 'TOROID AKIM TRAFOSU TOROID CURRENT TRANSFORMER'],
            ['kod' => 'MTC00-080', 'kutup' => '80MM', 'aciklama' => 'TOROID AKIM TRAFOSU TOROID CURRENT TRANSFORMER'],
            ['kod' => 'MTC00-120', 'kutup' => '120MM', 'aciklama' => 'TOROID AKIM TRAFOSU TOROID CURRENT TRANSFORMER'],
            ['kod' => 'MTC00-160', 'kutup' => '160MM', 'aciklama' => 'TOROID AKIM TRAFOSU TOROID CURRENT TRANSFORMER'],
            ['kod' => 'MELR00-01', 'kutup' => 'KAÇAK', 'aciklama' => 'ALGILAMA RÖLESİ EARTH LEAKAGE RELAY'],
        ],
        'Kontaktörler' => [
            ['kod' => 'MTMA10-3009', 'kutup' => '3P', 'aciklama' => '9A 4kW KONTAKTÖR       CONTACTOR         (1NO) 230V AC'],
            ['kod' => 'MTMA01-3009', 'kutup' => '3P', 'aciklama' => '9A 4kW KONTAKTÖR       CONTACTOR         (1NC) 230V AC'],
            ['kod' => 'MTMA10-3012', 'kutup' => '3P', 'aciklama' => '12A 5,5kW KONTAKTÖR    CONTACTOR         (1NO) 230V AC'],
            ['kod' => 'MTMA01-3012', 'kutup' => '3P', 'aciklama' => '12A 5,5kW KONTAKTÖR    CONTACTOR         (1NC) 230V AC'],
            ['kod' => 'MTMA10-3018', 'kutup' => '3P', 'aciklama' => '18A 7,5kW KONTAKTÖR    CONTACTOR         (1NO) 230V AC'],
            ['kod' => 'MTMA01-3018', 'kutup' => '3P', 'aciklama' => '18A 7,5kW KONTAKTÖR    CONTACTOR         (1NC) 230V AC'],
            ['kod' => 'MTMA10-3025', 'kutup' => '3P', 'aciklama' => '25A 11kW KONTAKTÖR     CONTACTOR         (1NO) 230V AC'],
            ['kod' => 'MTMA01-3025', 'kutup' => '3P', 'aciklama' => '25A 11kW KONTAKTÖR     CONTACTOR         (1NC) 230V AC'],
            ['kod' => 'MTMA10-3032', 'kutup' => '3P', 'aciklama' => '32A 15kW KONTAKTÖR     CONTACTOR         (1NO) 230V AC'],
            ['kod' => 'MTMA01-3032', 'kutup' => '3P', 'aciklama' => '32A 15kW KONTAKTÖR     CONTACTOR         (1NC) 230V AC'],
            ['kod' => 'MTMK10-3009', 'kutup' => '3P', 'aciklama' => '3P 9A 4KW MİNİ KONTAKTÖR           MINI CONTACTORS    (1NO) 230V AC'],
            ['kod' => 'MTMK10-3012', 'kutup' => '3P', 'aciklama' => '3P 12A 5,5KW MİNİ KONTAKTÖR        MINI CONTACTORS    (1NO) 230V AC'],
            ['kod' => 'MTMK10-3016', 'kutup' => '3P', 'aciklama' => '3P 16A 7,5KW MİNİ KONTAKTÖR        MINI CONTACTORS    (1NO) 230V AC'],
            ['kod' => 'MTMK01-3009', 'kutup' => '3P', 'aciklama' => 'MINI CONTACTORS    (1NC) 230C AC'],
            ['kod' => 'MTMK01-3012', 'kutup' => '3P', 'aciklama' => '3P 12A 5.5KW MİNİ KONTAKTÖR        MINI CONTACTORS'],
            ['kod' => 'MTMK01-3016', 'kutup' => '3P', 'aciklama' => '3P 16A 7.5KW MİNİ KONTAKTÖR        MINI CONTACTORS'],
            ['kod' => 'MTMK10-3009DC24', 'kutup' => '3P', 'aciklama' => 'MINI CONTACTORS    (1NO) 24V DC'],
            ['kod' => 'MTMK10-3012DC24', 'kutup' => '3P', 'aciklama' => '3P 12A 5.5KW MİNİ KONTAKTÖR        MINI CONTACTORS'],
            ['kod' => 'MTMK10-3016DC24', 'kutup' => '3P', 'aciklama' => '3P 16A 7.5KW MİNİ KONTAKTÖR        MINI CONTACTORS'],
            ['kod' => 'MTMK01-3009DC24', 'kutup' => '3P', 'aciklama' => 'MINI CONTACTORS    (1NC) 24V DC'],
            ['kod' => 'MTMK01-3012DC24', 'kutup' => '3P', 'aciklama' => '3P 12A 5.5KW MİNİ KONTAKTÖR        MINI CONTACTORS'],
            ['kod' => 'MTMK01-3016DC24', 'kutup' => '3P', 'aciklama' => '3P 16A 7.5KW MİNİ KONTAKTÖR        MINI CONTACTORS'],
            ['kod' => 'MTMAC1-318', 'kutup' => '3P', 'aciklama' => '18A 7,5KVAR'],
            ['kod' => 'MTMAC1-325', 'kutup' => '3P', 'aciklama' => '25A 12KVAR'],
            ['kod' => 'MTMAC1-332', 'kutup' => '3P', 'aciklama' => '32A 18KVAR'],
            ['kod' => 'MTMAC1-343', 'kutup' => '3P', 'aciklama' => '43A 20KVAR'],
            ['kod' => 'MTMAC1-350', 'kutup' => '3P', 'aciklama' => '50A 25KVAR'],
            ['kod' => 'MTMAC1-365', 'kutup' => '3P', 'aciklama' => '65A 30KVAR'],
            ['kod' => 'MTMAC1-380', 'kutup' => '3P', 'aciklama' => '80A 40KVAR'],
            ['kod' => 'MTMAC1-395', 'kutup' => '3P', 'aciklama' => '95A 50KVAR'],
        ],
        'Termik Röleler' => [
            ['kod' => 'MTTR1-M1301', 'kutup' => '3P', 'aciklama' => '0.1~0.16A TERMİK RÖLE THERMAL RELAYS'],
            ['kod' => 'MTTR1-M1302', 'kutup' => '3P', 'aciklama' => '0.16~0.25A TERMİK RÖLE THERMAL RELAYS'],
            ['kod' => 'MTTR1-M1303', 'kutup' => '3P', 'aciklama' => '0.25~0.4A TERMİK RÖLE THERMAL RELAYS'],
            ['kod' => 'MTTR1-M1304', 'kutup' => '3P', 'aciklama' => '0.4~0.63A TERMİK RÖLE THERMAL RELAYS'],
            ['kod' => 'MTTR1-M1305', 'kutup' => '3P', 'aciklama' => '0.63~1A TERMİK RÖLE THERMAL RELAYS'],
            ['kod' => 'MTTR1-M1306', 'kutup' => '3P', 'aciklama' => '1~1.6A TERMİK RÖLE THERMAL RELAYS'],
            ['kod' => 'MTTR1-M1307', 'kutup' => '3P', 'aciklama' => '1.6~2.5A TERMİK RÖLE THERMAL RELAYS'],
            ['kod' => 'MTTR1-M1308', 'kutup' => '3P', 'aciklama' => '2.5~4A TERMİK RÖLE THERMAL RELAYS'],
            ['kod' => 'MTTR1-M1310', 'kutup' => '3P', 'aciklama' => '4~6A TERMİK RÖLE THERMAL RELAYS'],
            ['kod' => 'MTTR1-M1312', 'kutup' => '3P', 'aciklama' => '5.5~8A TERMİK RÖLE THERMAL RELAYS'],
            ['kod' => 'MTTR1-M1314', 'kutup' => '3P', 'aciklama' => '7~10A TERMİK RÖLE THERMAL RELAYS'],
            ['kod' => 'MTTR1-M1316', 'kutup' => '3P', 'aciklama' => '9~13A TERMİK RÖLE THERMAL RELAYS'],
            ['kod' => 'MTTR1-M1321', 'kutup' => '3P', 'aciklama' => '12~18A TERMİK RÖLE THERMAL RELAYS'],
            ['kod' => 'MTTR1-M1322', 'kutup' => '3P', 'aciklama' => '17~25A TERMİK RÖLE THERMAL RELAYS'],
            ['kod' => 'MTTR2-M2353', 'kutup' => '3P', 'aciklama' => '23~32A TERMİK RÖLE THERMAL RELAYS'],
            ['kod' => 'MTTR2-M2355', 'kutup' => '3P', 'aciklama' => '30~40A TERMİK RÖLE THERMAL RELAYS'],
            ['kod' => 'MTTR3-M3322', 'kutup' => '3P', 'aciklama' => '17~25A TERMİK RÖLE (BÜYÜK) THERMAL RELAYS (BIG)'],
            ['kod' => 'MTTR3-M3353', 'kutup' => '3P', 'aciklama' => '23~32A TERMİK RÖLE (BÜYÜK) THERMAL RELAYS (BIG)'],
            ['kod' => 'MTTR3-M3355', 'kutup' => '3P', 'aciklama' => '30~40A TERMİK RÖLE (BÜYÜK) THERMAL RELAYS (BIG)'],
            ['kod' => 'MTTR3-M3357', 'kutup' => '3P', 'aciklama' => '37~50A TERMİK RÖLE THERMAL RELAYS'],
            ['kod' => 'MTTR3-M3359', 'kutup' => '3P', 'aciklama' => '48~65A TERMİK RÖLE THERMAL RELAYS'],
            ['kod' => 'MTTR3-M3361', 'kutup' => '3P', 'aciklama' => '55~70A TERMİK RÖLE THERMAL RELAYS'],
            ['kod' => 'MTTR3-M3363', 'kutup' => '3P', 'aciklama' => '63~80A TERMİK RÖLE THERMAL RELAYS'],
            ['kod' => 'MTTR3-M3365', 'kutup' => '3P', 'aciklama' => '80~93A TERMİK RÖLE THERMAL RELAYS'],
        ],
        'Motor Koruma Şalterleri' => [
            ['kod' => 'MTPS0-250016', 'kutup' => '3P', 'aciklama' => '0,1-0,16A MOTOR KORUMA ŞALTERİ MOTOR PROTECTION SWITCHES'],
            ['kod' => 'MTPS0-250025', 'kutup' => '3P', 'aciklama' => '0,16-0,25A MOTOR KORUMA ŞALTERİ MOTOR PROTECTION SWITCHES'],
            ['kod' => 'MTPS0-250040', 'kutup' => '3P', 'aciklama' => '0,25-0,4A MOTOR KORUMA ŞALTERİ MOTOR PROTECTION SWITCHES'],
            ['kod' => 'MTPS0-250063', 'kutup' => '3P', 'aciklama' => '0,40-0,63A MOTOR KORUMA ŞALTERİ MOTOR PROTECTION SWITCHES'],
            ['kod' => 'MTPS0-250100', 'kutup' => '3P', 'aciklama' => '0,63-1A MOTOR KORUMA ŞALTERİ MOTOR PROTECTION SWITCHES'],
            ['kod' => 'MTPS0-250160', 'kutup' => '3P', 'aciklama' => '1-1,6A MOTOR KORUMA ŞALTERİ MOTOR PROTECTION SWITCHES'],
            ['kod' => 'MTPS0-250250', 'kutup' => '3P', 'aciklama' => '1,6-2,5A MOTOR KORUMA ŞALTERİ MOTOR PROTECTION SWITCHES'],
            ['kod' => 'MTPS0-250400', 'kutup' => '3P', 'aciklama' => '2,5-4A MOTOR KORUMA ŞALTERİ MOTOR PROTECTION SWITCHES'],
            ['kod' => 'MTPS0-250630', 'kutup' => '3P', 'aciklama' => '4-6,3A MOTOR KORUMA ŞALTERİ MOTOR PROTECTION SWITCHES'],
            ['kod' => 'MTPS0-251000', 'kutup' => '3P', 'aciklama' => '6-10A MOTOR KORUMA ŞALTERİ MOTOR PROTECTION SWITCHES'],
            ['kod' => 'MTPS0-251400', 'kutup' => '3P', 'aciklama' => '9-14A MOTOR KORUMA ŞALTERİ MOTOR PROTECTION SWITCHES'],
            ['kod' => 'MTPS0-251800', 'kutup' => '3P', 'aciklama' => '13-18A MOTOR KORUMA ŞALTERİ MOTOR PROTECTION SWITCHES'],
            ['kod' => 'MTPS0-252300', 'kutup' => '3P', 'aciklama' => '17-23A MOTOR KORUMA ŞALTERİ MOTOR PROTECTION SWITCHES'],
            ['kod' => 'MTPS0-252500', 'kutup' => '3P', 'aciklama' => '20-25A MOTOR KORUMA ŞALTERİ MOTOR PROTECTION SWITCHES'],
            ['kod' => 'MTPS0-253200', 'kutup' => '3P', 'aciklama' => '24-32A MOTOR KORUMA ŞALTERİ MOTOR PROTECTION SWITCHES'],
            ['kod' => 'MTPS1-804000', 'kutup' => '3P', 'aciklama' => '25-40A MOTOR KORUMA ŞALTERİ MOTOR PROTECTION SWITCHES'],
            ['kod' => 'MTPS1-805000', 'kutup' => '3P', 'aciklama' => '36-50A MOTOR KORUMA ŞALTERİ MOTOR PROTECTION SWITCHES'],
            ['kod' => 'MTPS1-806300', 'kutup' => '3P', 'aciklama' => '40-63A MOTOR KORUMA ŞALTERİ MOTOR PROTECTION SWITCHES'],
            ['kod' => 'MTPS1-808000', 'kutup' => '3P', 'aciklama' => '56-80A MOTOR KORUMA ŞALTERİ MOTOR PROTECTION SWITCHES'],
            ['kod' => 'MTPS0-F11', 'kutup' => '1NO', 'aciklama' => '+ 1NC YARDIMCI KONTAK - ÖNDEN MONTELİ AUXILIARY CONTACT - FRONT MOUNTED'],
            ['kod' => 'MTPS0-F20', 'kutup' => '2NO', 'aciklama' => 'YARDIMCI KONTAK- ÖNDEN MONTELİ AUXILIARY CONTACT - FRONT MOUNTED'],
            ['kod' => 'MTPS0-L11', 'kutup' => 'MTMP-25', 'aciklama' => '1NO + 1NC YARDIMCI KONTAK - YANDAN MONTELİ AUXILIARY CONTACT - SIDE MOUNTED'],
            ['kod' => 'MTPS0-L20', 'kutup' => 'MTMP-25', 'aciklama' => '2NO YARDIMCI KONTAK- YANDAN MONTELİ AUXILIARY CONTACT - SIDE MOUNTED'],
            ['kod' => 'MTPS1-L11', 'kutup' => 'MTMP-80', 'aciklama' => '1NO + 1NC YARDIMCI KONTAK - YANDAN MONTELİ AUXILIARY CONTACT - SIDE MOUNTED'],
            ['kod' => 'MTPS1-L20', 'kutup' => 'MTMP-80', 'aciklama' => '2NO YARDIMCI KONTAK - YANDAN MONTELİ AUXILIARY CONTACT - SIDE MOUNTED'],
            ['kod' => 'MTPS0-AB', 'kutup' => '230V', 'aciklama' => 'ŞANT AÇTIRMA BOBİNİ'],
            ['kod' => 'MTPS0-DG', 'kutup' => '400V', 'aciklama' => 'DÜŞÜK GERİLİM AÇTIRMA BOBİNİ'],
            ['kod' => 'MTPS0-IP55K', 'kutup' => 'IP', 'aciklama' => '55 KUTU - MOTOR KORUMA ŞALTERİ'],
        ],
    ];
            @endphp

            {{-- Sekme butonları --}}
            <div class="flex flex-wrap gap-3 mb-10" data-salt-tabs>
                @foreach (array_keys($saltGruplari) as $i => $kategori)
                    <button type="button"
                            class="salt-tab {{ $i === 0 ? 'salt-tab--active' : '' }}"
                            data-salt-tab
                            data-target="salt-panel-{{ $i }}">
                        {{ $kategori }}
                        <span class="salt-tab__count">{{ count($saltGruplari[$kategori]) }}</span>
                    </button>
                @endforeach
            </div>

            {{-- Ürün panelleri --}}
            <div class="relative" data-salt-panels>
                @php $i = 0; @endphp
                @foreach ($saltGruplari as $kategori => $urunler)
                    <div id="salt-panel-{{ $i }}" class="salt-panel {{ $i === 0 ? 'salt-panel--active' : '' }}" data-salt-panel>
                        <div class="salt-pole-filter" data-salt-pole-filter></div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4" data-salt-grid>
                            @foreach ($urunler as $urun)
                                <div class="salt-card" data-salt-card data-kutup="{{ $urun['kutup'] }}">
                                    <div class="salt-card__code">{{ $urun['kod'] }}</div>
                                    @if (!empty($urun['kutup']))
                                        <div class="salt-card__pole">{{ $urun['kutup'] }}</div>
                                    @endif
                                    <div class="salt-card__desc">{{ $urun['aciklama'] }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @php $i++; @endphp
                @endforeach
            </div>
        </div>
    </section>

@endsection

@push('scripts')
<script>
(function () {
    const tabs = document.querySelectorAll('[data-salt-tab]');
    const panels = document.querySelectorAll('[data-salt-panel]');

    // Doğal sıralama: 1P, 2P, 3P, 4P önce; sonra geri kalanı alfabetik
    function poleSortKey(v) {
        const m = v.match(/^(\d+)P$/);
        return m ? [0, parseInt(m[1], 10)] : [1, v];
    }

    // Görünen kartları kademeli (staggered) bir animasyonla belirt
    function staggerReveal(cards) {
        let visibleIndex = 0;
        cards.forEach((card) => {
            card.classList.remove('salt-card--in');
            if (card.style.display === 'none') return;
            card.style.animationDelay = (Math.min(visibleIndex, 24) * 28) + 'ms';
            // reflow zorla, animasyon her seferinde yeniden tetiklensin
            void card.offsetWidth;
            card.classList.add('salt-card--in');
            visibleIndex++;
        });
    }

    // Her panel için kutup filtresi kur (birden fazla kutup çeşidi varsa)
    function setupPoleFilter(panel) {
        const grid = panel.querySelector('[data-salt-grid]');
        const filterWrap = panel.querySelector('[data-salt-pole-filter]');
        const cards = Array.from(grid.querySelectorAll('[data-salt-card]'));

        const poles = [...new Set(cards.map(c => c.dataset.kutup).filter(Boolean))];
        if (poles.length <= 1) {
            staggerReveal(cards);
            return;
        }
        poles.sort((a, b) => {
            const ka = poleSortKey(a), kb = poleSortKey(b);
            if (ka[0] !== kb[0]) return ka[0] - kb[0];
            return ka[1] > kb[1] ? 1 : ka[1] < kb[1] ? -1 : 0;
        });

        filterWrap.innerHTML = '';
        const allBtn = document.createElement('button');
        allBtn.type = 'button';
        allBtn.className = 'salt-pole-pill salt-pole-pill--active';
        allBtn.textContent = 'Tümü';
        allBtn.dataset.pole = '__all__';
        filterWrap.appendChild(allBtn);

        poles.forEach((pole) => {
            const count = cards.filter(c => c.dataset.kutup === pole).length;
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'salt-pole-pill';
            btn.dataset.pole = pole;
            btn.innerHTML = pole + ' <span>' + count + '</span>';
            filterWrap.appendChild(btn);
        });

        filterWrap.querySelectorAll('.salt-pole-pill').forEach((pill) => {
            pill.addEventListener('click', () => {
                filterWrap.querySelectorAll('.salt-pole-pill').forEach(p => p.classList.remove('salt-pole-pill--active'));
                pill.classList.add('salt-pole-pill--active');

                const chosen = pill.dataset.pole;
                cards.forEach((card) => {
                    const match = chosen === '__all__' || card.dataset.kutup === chosen;
                    card.style.display = match ? '' : 'none';
                });
                staggerReveal(cards);
            });
        });

        staggerReveal(cards);
    }

    panels.forEach(setupPoleFilter);

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const targetId = tab.dataset.target;

            tabs.forEach(t => t.classList.remove('salt-tab--active'));
            tab.classList.add('salt-tab--active');

            panels.forEach(p => {
                if (p.id === targetId) {
                    p.classList.add('salt-panel--active');
                    const cards = Array.from(p.querySelectorAll('[data-salt-card]'));
                    staggerReveal(cards);
                } else {
                    p.classList.remove('salt-panel--active');
                }
            });

            const panelsWrap = document.querySelector('[data-salt-panels]');
            if (panelsWrap) {
                const rect = panelsWrap.getBoundingClientRect();
                if (rect.top < 80) {
                    window.scrollTo({ top: window.scrollY + rect.top - 100, behavior: 'smooth' });
                }
            }
        });
    });
})();
</script>
@endpush
