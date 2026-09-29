@extends('layouts.app')

@section('title', 'İletişim | Mutlusan Electric')
@section('description', 'Mutlusan Electric ile iletişime geçin.')

@section('content')

    <section class="relative bg-mutlusan-gray-dark pt-40 pb-16 px-6" data-no-reveal>
        <div class="max-w-4xl mx-auto text-center">
            <div class="text-white/50 text-sm mb-4">
                <a href="{{ url('/') }}" class="hover:text-white transition-colors">Ana Sayfa</a>
                <span class="mx-2">/</span>
                <span class="text-white/80">İletişim</span>
            </div>
            <h1 class="font-display text-4xl sm:text-5xl font-bold text-white">İletişim</h1>
            <p class="mt-4 text-white/60 max-w-xl mx-auto">Sorularınız ve talepleriniz için bize ulaşın.</p>
        </div>
    </section>

    {{-- TODO: Telefon, adres ve e-posta bilgileri ile iletişim formu eklenecek (bilgiler gelince) --}}
    <section class="py-16 px-6 bg-white" data-no-reveal>
        <div class="max-w-4xl mx-auto grid sm:grid-cols-2 gap-6">

            <div class="bg-mutlusan-gray-light rounded-2xl p-8">
                <h2 class="font-display text-xl font-bold text-mutlusan-gray-dark">Sosyal Medya</h2>
                <p class="mt-2 text-sm text-mutlusan-gray">Bizi sosyal medya hesaplarımızdan takip edebilir, mesaj gönderebilirsiniz.</p>
                <ul class="mt-5 space-y-3 text-sm font-semibold">
                    <li><a href="https://www.facebook.com/MutlusanPlastikElektrik" target="_blank" rel="noopener" class="text-mutlusan-red hover:text-mutlusan-red-dark">Facebook</a></li>
                    <li><a href="https://www.instagram.com/mutlusanelectric/" target="_blank" rel="noopener" class="text-mutlusan-red hover:text-mutlusan-red-dark">Instagram</a></li>
                    <li><a href="https://tr.linkedin.com/company/mutlusan" target="_blank" rel="noopener" class="text-mutlusan-red hover:text-mutlusan-red-dark">LinkedIn</a></li>
                    <li><a href="https://www.youtube.com/@MutlusanElectric" target="_blank" rel="noopener" class="text-mutlusan-red hover:text-mutlusan-red-dark">YouTube</a></li>
                </ul>
            </div>

            <div class="bg-mutlusan-gray-light rounded-2xl p-8">
                <h2 class="font-display text-xl font-bold text-mutlusan-gray-dark">Mutlusan Post</h2>
                <p class="mt-2 text-sm text-mutlusan-gray">Haberler, duyurular ve sektörel içerikler için blog sitemizi ziyaret edin.</p>
                <a href="https://post.mutlusan.com.tr" target="_blank" rel="noopener"
                   class="inline-flex items-center mt-5 px-6 py-2.5 bg-mutlusan-red text-white text-sm font-semibold rounded-full hover:bg-mutlusan-red-dark transition-colors">
                    post.mutlusan.com.tr
                </a>
            </div>

        </div>
    </section>

@endsection
