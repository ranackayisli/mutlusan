{{--
    Rakamlar post.mutlusan.com.tr resmi footer metninden doğrulandı:
    "1983 yılında İstanbul Karaköy'de temelleri atılan firmamız... 50.000 m² üretim alanı...
    85'ten fazla ülkeye ihracatıyla..."
--}}
<section class="stat-section relative overflow-hidden bg-mutlusan-red-dark py-12" data-particle-section>
    <canvas class="stat-section__canvas" data-particle-canvas></canvas>

    <div class="relative max-w-6xl mx-auto px-6 grid grid-cols-2 md:grid-cols-4 gap-8 text-center">

        <div class="stat-item">
            <div class="stat-number text-4xl lg:text-5xl font-display font-extrabold tracking-tight text-white" data-counter="{{ date('Y') - 1983 }}">0</div>
            <div class="mt-2 text-sm text-white/70 tracking-wide">Yıllık Tecrübe (1983'ten beri)</div>
        </div>

        <div class="stat-item">
            <div class="stat-number text-4xl lg:text-5xl font-display font-extrabold tracking-tight text-white" data-counter="50">0</div>
            <div class="mt-2 text-sm text-white/70 tracking-wide">Bin m² Üretim Alanı</div>
        </div>

        <div class="stat-item">
            <div class="stat-number text-4xl lg:text-5xl font-display font-extrabold tracking-tight text-white" data-counter="85">0</div>
            <div class="mt-2 text-sm text-white/70 tracking-wide">Ülkeye İhracat</div>
        </div>

        <div class="stat-item">
            <div class="stat-number text-4xl lg:text-5xl font-display font-extrabold tracking-tight text-white">%100</div>
            <div class="mt-2 text-sm text-white/70 tracking-wide">Yerli Sermaye</div>
        </div>

    </div>
</section>

@push('scripts')
<script>
(function () {
    const section = document.querySelector('[data-particle-section]');
    const canvas = document.querySelector('[data-particle-canvas]');
    if (!section || !canvas) return;

    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
    if (window.matchMedia('(pointer: coarse)').matches) return; // dokunmatikte gerek yok

    const ctx = canvas.getContext('2d');
    let particles = [];
    let width, height;
    let mouseX = -999, mouseY = -999;
    let lastSpawn = 0;

    const COLORS = ['#4A0F1B', '#6E1526', '#7A1729', '#8C1B30'];

    function resize() {
        width = section.clientWidth;
        height = section.clientHeight;
        canvas.width = width * window.devicePixelRatio;
        canvas.height = height * window.devicePixelRatio;
        canvas.style.width = width + 'px';
        canvas.style.height = height + 'px';
        ctx.setTransform(window.devicePixelRatio, 0, 0, window.devicePixelRatio, 0, 0);
    }

    function spawnParticle(x, y) {
        particles.push({
            x, y,
            vx: (Math.random() - 0.5) * 1.6,
            vy: (Math.random() - 0.5) * 1.6 - 0.3,
            radius: 10 + Math.random() * 16,
            alpha: 0.7 + Math.random() * 0.3,
            color: COLORS[Math.floor(Math.random() * COLORS.length)],
            decay: 0.01 + Math.random() * 0.012,
        });
    }

    function loop(now) {
        ctx.clearRect(0, 0, width, height);

        // Mouse hareket ederken sık aralıklarla, her seferinde birkaç baloncuk doğur
        if (now - lastSpawn > 16 && mouseX > 0) {
            spawnParticle(mouseX, mouseY);
            spawnParticle(mouseX + (Math.random() - 0.5) * 10, mouseY + (Math.random() - 0.5) * 10);
            lastSpawn = now;
        }

        particles.forEach((p) => {
            p.x += p.vx;
            p.y += p.vy;
            p.vy -= 0.01; // hafifçe yukarı süzülsün
            p.alpha -= p.decay;
            p.radius *= 0.985;

            if (p.alpha > 0) {
                ctx.beginPath();
                const gradient = ctx.createRadialGradient(p.x, p.y, 0, p.x, p.y, p.radius);
                gradient.addColorStop(0, p.color);
                gradient.addColorStop(1, 'rgba(0,0,0,0)');
                ctx.fillStyle = gradient;
                ctx.globalAlpha = Math.max(p.alpha, 0);
                ctx.arc(p.x, p.y, p.radius, 0, Math.PI * 2);
                ctx.fill();
            }
        });

        ctx.globalAlpha = 1;
        particles = particles.filter((p) => p.alpha > 0 && p.radius > 0.3);

        requestAnimationFrame(loop);
    }

    section.addEventListener('mousemove', (e) => {
        const rect = section.getBoundingClientRect();
        mouseX = e.clientX - rect.left;
        mouseY = e.clientY - rect.top;
    });
    section.addEventListener('mouseleave', () => {
        mouseX = -999;
        mouseY = -999;
    });

    window.addEventListener('resize', resize);
    resize();
    requestAnimationFrame(loop);
})();
</script>
@endpush
