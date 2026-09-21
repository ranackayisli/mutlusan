<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mutlusan Electric')</title>
    <meta name="description" content="@yield('description', 'Mutlusan Electric - Elektrik malzemeleri üretim ve satış')">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-white">

    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <script>
        // Sayfa yenilenince tarayıcının önceki scroll konumunu hatırlamasını engelle,
        // her zaman en üstten (hero video) başlasın
        if ('scrollRestoration' in history) {
            history.scrollRestoration = 'manual';
        }
        window.scrollTo(0, 0);
        window.addEventListener('pageshow', () => window.scrollTo(0, 0));
        window.addEventListener('load', () => window.scrollTo(0, 0));

        // Header rengi: sayfada üstte koyu bir bölüm (hero video, banner vb. - [data-dark-banner]
        // işaretli ilk blok) varsa ve header hâlâ onun üzerindeyse şeffaf+beyaz; o bölüm
        // kayarak geçtiyse ya da sayfada hiç yoksa (örn. iç sayfalar) header koyu yazıya döner.
        const header = document.querySelector('.site-header');
        const darkMarker = document.querySelector('[data-dark-banner]');
        const toggleHeader = () => {
            if (!header) return;
            if (!darkMarker) {
                header.classList.remove('site-header--on-dark');
                return;
            }
            const markerBottom = darkMarker.getBoundingClientRect().bottom;
            const headerHeight = header.offsetHeight;
            if (markerBottom > headerHeight) {
                header.classList.add('site-header--on-dark');
            } else {
                header.classList.remove('site-header--on-dark');
            }
        };
        window.addEventListener('scroll', toggleHeader, { passive: true });
        window.addEventListener('resize', toggleHeader, { passive: true });
        toggleHeader();

        // Mobil menü
        const menuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        if (menuBtn && mobileMenu) {
            menuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }

        // Sayaç animasyonu (şube şeridi)
        const counters = document.querySelectorAll('[data-counter]');
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    const target = parseInt(el.dataset.counter, 10);
                    const duration = 1400;
                    const start = performance.now();
                    const animate = (now) => {
                        const progress = Math.min((now - start) / duration, 1);
                        const eased = 1 - Math.pow(1 - progress, 3);
                        el.textContent = Math.floor(eased * target).toLocaleString('tr-TR');
                        if (progress < 1) requestAnimationFrame(animate);
                        else el.textContent = target.toLocaleString('tr-TR');
                    };
                    requestAnimationFrame(animate);
                    counterObserver.unobserve(el);
                }
            });
        }, { threshold: 0.4 });
        counters.forEach(c => counterObserver.observe(c));

        // Scroll'da belirme efekti: bölümler ekrana girerken sırayla soldan/sağdan kayarak belirir
        // (hero/video bölümü hariç - o her zaman anında ve tam görünür olmalı)
        const revealTargets = document.querySelectorAll(
            'main > section:not([data-no-reveal]), main > div > section:not([data-no-reveal]), .product-carousel, .product-carousel__info'
        );
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.15 });
        revealTargets.forEach((el, i) => {
            const directions = ['reveal--left', 'reveal--right', 'reveal--up', 'reveal--down'];
            el.classList.add('reveal', directions[i % directions.length]);
            revealObserver.observe(el);
        });

        // Sayfa geçişleri: iç linklere tıklayınca yumuşak kararıp sonra git
        document.body.classList.add('page-transition');
        requestAnimationFrame(() => document.body.classList.add('page-transition--in'));

        document.querySelectorAll('a[href]').forEach(link => {
            const href = link.getAttribute('href');
            if (!href || href.startsWith('#') || href.startsWith('http') ||
                href.startsWith('mailto:') || href.startsWith('tel:') ||
                link.target === '_blank') {
                return;
            }
            link.addEventListener('click', (e) => {
                e.preventDefault();
                document.body.classList.remove('page-transition--in');
                document.body.classList.add('page-transition--out');
                setTimeout(() => { window.location.href = href; }, 280);
            });
        });

        // Hero videoda hafif parallax: scroll'da video biraz daha yavaş hareket eder
        const parallaxVideo = document.querySelector('[data-parallax-video]');
        if (parallaxVideo && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            let parallaxTicking = false;
            const applyParallax = () => {
                parallaxTicking = false;
                const offset = Math.min(window.scrollY * 0.35, 220);
                parallaxVideo.style.transform = 'translateY(' + offset + 'px) scale(1.08)';
            };
            window.addEventListener('scroll', () => {
                if (!parallaxTicking) {
                    parallaxTicking = true;
                    requestAnimationFrame(applyParallax);
                }
            }, { passive: true });
            applyParallax();
        }
    </script>

    @stack('scripts')
</body>
</html>
