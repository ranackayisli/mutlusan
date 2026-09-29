# Mutlusan Electric — Web Sitesi

Laravel 12 + Blade + Tailwind CSS 4 + Vite. Yönetim paneli Filament ile (`/admin`).

## Geliştirme ortamı

```bash
./vendor/bin/sail up -d          # sunucuyu başlat
./vendor/bin/sail npm run dev    # geliştirirken: CSS/JS değişiklikleri anında yansır
./vendor/bin/sail npm run build  # yayına almadan önce: üretim derlemesi
```

## Klasör yapısı (ön yüz)

```
resources/
├── views/
│   ├── layouts/app.blade.php     Ortak sayfa iskeleti (head, header, footer)
│   ├── home.blade.php            Ana sayfa: bölümleri sırayla çağırır
│   ├── partials/                 Ana sayfa bölümleri ve ortak parçalar
│   │   ├── header / footer
│   │   ├── hero                  En üstteki video + başlık
│   │   ├── stats-strip           Kırmızı istatistik şeridi
│   │   ├── products              Ürün çarkı
│   │   ├── about, ai-docs, solutions, blog
│   └── urunler/                  Ürün grubu sayfaları
├── css/
│   ├── app.css                   Giriş noktası: sadece @import'lar ve renk/font teması
│   ├── base.css                  Genel ayarlar, sayfa geçişi, scroll'da belirme
│   ├── components/               Header, hero gibi ortak bileşenler
│   ├── sections/                 Ana sayfa bölümlerine özel stiller
│   └── pages/                    Belirli sayfalara özel stiller
└── js/
    ├── app.js                    Giriş noktası: modülleri başlatır
    └── modules/                  Her davranış ayrı dosyada (header, çark, sayaç...)
```

## Kurallar

- **Blade dosyalarına `<style>` veya `<script>` yazma.** Stil `resources/css/` altındaki ilgili dosyaya,
  davranış `resources/js/modules/` altında yeni bir modüle gider ve `app.js`'ten başlatılır.
- **JS modülleri kendi bölümlerini `data-*` özelliğiyle bulur** (ör. `data-stats-strip`, `data-product-wheel`).
  Bölüm sayfada yoksa modül hiçbir şey yapmaz; bu yüzden tüm modüller her sayfada güvenle çalışır.
- **Sınıf adları BEM düzeninde:** `bolum__oge--durum` (ör. `stats-strip__item`, `site-header--on-dark`).
- **Renkler tema değişkenlerinden:** `bg-mutlusan-red`, `var(--color-mutlusan-red)` vb. Yeni renk kodu yazma.
- **Animasyonlar "hareketi azalt" ayarına uyar** (`prefers-reduced-motion`).
- **Metinler çeviriye hazır yazılır.** Kısa arayüz yazıları doğrudan `{{ __('All News') }}` şeklinde;
  uzun sayfa içerikleri `lang/en/<sayfa>.php` dosyasında (ör. `lang/en/about.php`) ve `{{ __('about.title') }}` ile.
  Türkçe eklenince `lang/tr.json` ve `lang/tr/<sayfa>.php` oluşturmak yeterli olur.
- **Görsellerin içine yazı gömme.** Başlıklar HTML metni olarak görselin üstüne yazılır; böylece çevrilebilir ve
  arama motorları tarafından okunabilir.

## Değişiklikleri kaydetme (git)

Her anlamlı değişiklikten sonra:

```bash
git add -A
git commit -m "Ne değişti, kısaca"
git push
```

Bir şey bozulursa son kaydedilen hale dönmek için: `git restore .`
