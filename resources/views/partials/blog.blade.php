<section class="pt-8 pb-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">

        <div class="flex items-end justify-between mb-10 flex-wrap gap-4">
            <div>
                <span class="text-mutlusan-red text-sm font-semibold tracking-wide">Mutlusan Post</span>
                <h2 class="font-display text-4xl font-semibold text-mutlusan-gray-dark mt-2">
                    Geleceği Şekillendiren İçgörüler
                </h2>
            </div>
            <a href="https://post.mutlusan.com.tr" target="_blank" rel="noopener"
               class="text-mutlusan-red font-semibold hover:text-mutlusan-red-dark transition-colors">
                Tüm haberler
            </a>
        </div>

        @if (count($posts ?? []) > 0)
            <div class="grid md:grid-cols-3 gap-8">
                @foreach ($posts as $post)
                    <a href="{{ $post['link'] }}" target="_blank" rel="noopener" class="group block">
                        <div class="aspect-[4/3] rounded-lg overflow-hidden bg-mutlusan-gray-light">
                            @if ($post['image'])
                                <img src="{{ $post['image'] }}" alt="{{ $post['title'] }}"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @endif
                        </div>
                        @if ($post['date'])
                            <div class="mt-4 text-xs text-mutlusan-gray tracking-wide">{{ $post['date'] }}</div>
                        @endif
                        <h3 class="mt-2 font-semibold text-lg text-mutlusan-gray-dark leading-snug group-hover:text-mutlusan-red transition-colors">
                            {{ $post['title'] }}
                        </h3>
                        @if ($post['excerpt'])
                            <p class="mt-2 text-sm text-mutlusan-gray line-clamp-2">{{ $post['excerpt'] }}</p>
                        @endif
                    </a>
                @endforeach
            </div>
        @else
            {{-- Blog sitesine geçici olarak erişilemediğinde gösterilir --}}
            <p class="text-mutlusan-gray text-sm">
                Haberler şu anda yüklenemiyor. Tüm haberleri
                <a href="https://post.mutlusan.com.tr" target="_blank" rel="noopener" class="text-mutlusan-red font-semibold">post.mutlusan.com.tr</a>
                adresinden görebilirsiniz.
            </p>
        @endif

    </div>
</section>
