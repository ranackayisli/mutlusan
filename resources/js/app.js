/**
 * Mutlusan Electric — site genelindeki JavaScript'in giriş noktası.
 *
 * Her modül kendi bölümünü arar; sayfada o bölüm yoksa sessizce hiçbir şey yapmaz.
 * Böylece tüm modüller her sayfada güvenle çağrılabilir.
 */
import { initScrollReset } from './modules/scroll-reset';
import { initHeader } from './modules/header';
import { initReveal } from './modules/reveal';
import { initPageTransition } from './modules/page-transition';
import { initParallax } from './modules/parallax';
import { initStatsStrip } from './modules/stats-strip';
import { initProductWheel } from './modules/product-wheel';
import { initSaltProducts } from './modules/salt-products';

initScrollReset();
initHeader();
initReveal();
initPageTransition();
initParallax();
initStatsStrip();
initProductWheel();
initSaltProducts();
