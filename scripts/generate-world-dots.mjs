/**
 * Ana sayfadaki "Global Reach" bölümünün nokta desenli dünya haritasını üretir:
 *   public/images/world-dots.svg
 *
 * Çalıştırma (sadece harita görünümünü değiştirmek istersen gerekir):
 *   npm i --no-save world-atlas topojson-client d3-geo
 *   node scripts/generate-world-dots.mjs
 *
 * ÖNEMLİ: Aşağıdaki projeksiyon sabitleri app/Support/WorldMap.php ile AYNI olmalı;
 * yoksa şehir işaretleri haritada yanlış yerde durur.
 */
import { readFileSync, writeFileSync } from 'node:fs';
import { createRequire } from 'node:module';
import { feature } from 'topojson-client';
import { geoContains } from 'd3-geo';

const require = createRequire(import.meta.url);

const W = 1000;          // viewBox genişliği
// Görünüm: Avrupa · Kuzey Afrika · Orta Doğu · Asya bandı (İstanbul merkezli, ince ve geniş).
// Daha fazla bölge göstermek istersen sınırları genişlet (harita uzar, bölüm kalınlaşır).
const LON_MIN = -25, LON_MAX = 125;
const LAT_MIN = 8, LAT_MAX = 62;
const STEP = 6.5;          // nokta aralığı (viewBox birimi)
const TWINKLE_COUNT = 55;

const rad = (deg) => (deg * Math.PI) / 180;
// Miller projeksiyonu: yatay doğrusal, dikey kutuplarda Mercator'dan çok daha az gerilir
const millerY = (latDeg) => 1.25 * Math.log(Math.tan(Math.PI / 4 + 0.4 * rad(latDeg)));
const scale = W / rad(LON_MAX - LON_MIN);
const yTop = millerY(LAT_MAX);
const H = Math.round((yTop - millerY(LAT_MIN)) * scale);

const invertY = (y) => {
    const Y = yTop - y / scale;
    return ((2.5 * Math.atan(Math.exp(0.8 * Y)) - 0.625 * Math.PI) * 180) / Math.PI;
};
const invertX = (x) => LON_MIN + (x / W) * (LON_MAX - LON_MIN);

const topo = JSON.parse(readFileSync(require.resolve('world-atlas/land-50m.json'), 'utf8'));
const land = feature(topo, topo.objects.land);

const dots = [];
for (let row = 0, y = STEP / 2; y < H; row++, y += STEP) {
    const offset = row % 2 ? STEP / 2 : 0;       // satırlar kaydırılı: daha doğal bir nokta dokusu
    for (let x = STEP / 2 + offset; x < W; x += STEP) {
        if (geoContains(land, [invertX(x), invertY(y)])) dots.push([+x.toFixed(1), +y.toFixed(1)]);
    }
}

// Sabit tohumlu rastgelelik: her üretimde aynı sonuç
let seed = 20261002;
const random = () => {
    seed |= 0; seed = (seed + 0x6d2b79f5) | 0;
    let t = Math.imul(seed ^ (seed >>> 15), 1 | seed);
    t = (t + Math.imul(t ^ (t >>> 7), 61 | t)) ^ t;
    return ((t ^ (t >>> 14)) >>> 0) / 4294967296;
};

const twinkle = new Set();
while (twinkle.size < Math.min(TWINKLE_COUNT, dots.length)) twinkle.add(Math.floor(random() * dots.length));

const base = dots.filter((_, i) => !twinkle.has(i)).map(([x, y]) => `M${x} ${y}h0`).join('');
const sparks = [...twinkle]
    .map((i) => {
        const [x, y] = dots[i];
        const delay = (random() * 6).toFixed(1);
        const duration = (3 + random() * 3).toFixed(1);
        return `<circle class="t" cx="${x}" cy="${y}" r="1.9" style="animation-delay:-${delay}s;animation-duration:${duration}s"/>`;
    })
    .join('');

const svg = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 ${W} ${H}" width="${W}" height="${H}">
<style>.t{fill:#ff8aa0;animation:tw 4s ease-in-out infinite}@keyframes tw{0%,100%{opacity:.15}50%{opacity:1}}@media (prefers-reduced-motion:reduce){.t{animation:none;opacity:.7}}</style>
<path d="${base}" stroke="#8e9199" stroke-width="3.1" stroke-linecap="round" opacity=".5"/>
<g>${sparks}</g>
</svg>
`;

writeFileSync(new URL('../public/images/world-dots.svg', import.meta.url), svg);
console.log(`viewBox ${W}x${H} · nokta: ${dots.length} (parlayan: ${twinkle.size}) · dosya: ${(svg.length / 1024).toFixed(0)} KB`);
