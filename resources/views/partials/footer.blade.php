{{--
    Site alt kısmı: iletişim şeridi + menü sütunları + telif / sosyal medya.
    Menü öğeleri aşağıdaki dizide; yeni link eklemek için ilgili sütuna bir satır eklemen yeterli.
    Henüz sayfası olmayan linkler '#' olarak duruyor.
--}}
@php
    $footerColumns = [
        [
            ['title' => 'Corporate', 'links' => [
                ['label' => 'About Us',              'url' => url('/hakkimizda')],
                ['label' => 'Vision & Mission',      'url' => '#'],
                ['label' => 'Corporate Logo',        'url' => '#'],
                ['label' => 'Corporate Film',        'url' => '#'],
                ['label' => 'Human Resources',       'url' => '#'],
                ['label' => 'Information Society',   'url' => '#'],
                ['label' => "Chairman's Message",    'url' => '#'],
            ]],
        ],
        [
            ['title' => 'Documents', 'links' => [
                ['label' => 'E-Catalogue & Brochures',  'url' => url('/dokumanlar')],
                ['label' => 'E-Price List',             'url' => '#'],
                ['label' => 'E-Magazine',               'url' => '#'],
                ['label' => 'Press Releases',           'url' => '#'],
                ['label' => 'Corporate Identity Guide', 'url' => '#'],
                ['label' => 'Quality Certificates',     'url' => '#'],
                ['label' => 'Other',                    'url' => '#'],
            ]],
        ],
        [
            ['title' => 'Social Responsibility', 'links' => [
                ['label' => 'Overview', 'url' => '#'],
            ]],
            ['title' => 'Human Resources', 'links' => [
                ['label' => 'HR Policy',      'url' => '#'],
                ['label' => 'Open Positions', 'url' => '#'],
            ]],
        ],
        [
            ['title' => 'Information Society', 'links' => [
                ['label' => 'Information Society',            'url' => '#'],
                ['label' => 'Information Security Policy',    'url' => '#'],
                ['label' => 'Quality & OHS',                  'url' => '#'],
                ['label' => 'Personal Data Privacy Notice',   'url' => '#'],
                ['label' => 'Data Subject Application Form',  'url' => '#'],
                ['label' => 'Information Society Services',   'url' => '#'],
                ['label' => 'Cookie Policy',                  'url' => '#'],
            ]],
        ],
    ];

    $socialLinks = [
        ['label' => 'Facebook',  'short' => 'FB', 'url' => 'https://www.facebook.com/MutlusanPlastikElektrik'],
        ['label' => 'Instagram', 'short' => 'IG', 'url' => 'https://www.instagram.com/mutlusanelectric/'],
        ['label' => 'LinkedIn',  'short' => 'IN', 'url' => 'https://tr.linkedin.com/company/mutlusan'],
        ['label' => 'YouTube',   'short' => 'YT', 'url' => 'https://www.youtube.com/@MutlusanElectric'],
    ];
@endphp

{{-- İletişim şeridi --}}
<div class="bg-mutlusan-red">
    <div class="max-w-7xl mx-auto px-6 py-5 flex flex-col sm:flex-row items-center justify-between gap-4">
        <span class="text-white font-semibold tracking-wide">{{ __('Get in Touch With Us') }}</span>
        <a href="{{ url('/iletisim') }}"
           class="inline-flex items-center px-7 py-2.5 bg-white text-mutlusan-red font-semibold rounded-full hover:bg-mutlusan-gray-light transition-colors">
            {{ __('Contact Form') }}
        </a>
    </div>
</div>

<footer class="bg-mutlusan-gray-dark text-white/80">
    <div class="max-w-7xl mx-auto px-6 py-16 grid sm:grid-cols-2 lg:grid-cols-5 gap-10">

        <div>
            <img src="{{ asset('images/mutlusan-logo-white-cropped.png') }}" alt="Mutlusan Electric" class="h-9 w-auto mb-4">
        </div>

        @foreach ($footerColumns as $column)
            <div>
                @foreach ($column as $group)
                    <h4 class="text-white font-semibold mb-4 text-sm tracking-wide {{ $loop->first ? '' : 'mt-8' }}">{{ __($group['title']) }}</h4>
                    <ul class="space-y-2 text-sm">
                        @foreach ($group['links'] as $link)
                            <li><a href="{{ $link['url'] }}" class="hover:text-white transition-colors">{{ __($link['label']) }}</a></li>
                        @endforeach
                    </ul>
                @endforeach
            </div>
        @endforeach

    </div>

    <div class="border-t border-white/10 py-6">
        <div class="max-w-7xl mx-auto px-6 flex flex-col sm:flex-row items-center justify-between gap-4">
            <span class="text-xs text-white/40">&copy; {{ now()->year }} Mutlusan Electric. {{ __('All rights reserved.') }}</span>
            <div class="flex gap-3">
                @foreach ($socialLinks as $social)
                    <a href="{{ $social['url'] }}" target="_blank" rel="noopener"
                       class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-mutlusan-red transition-colors text-xs"
                       aria-label="{{ $social['label'] }}">{{ $social['short'] }}</a>
                @endforeach
            </div>
        </div>
    </div>
</footer>
