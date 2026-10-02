<?php

/*
 * Ana sayfadaki "Global Reach" haritasının verisi (resources/views/partials/global-network.blade.php).
 *
 * Yeni bir pazar eklemek için `markets` listesine bir satır ekle ve şunu çalıştır:
 *     ./vendor/bin/sail artisan config:clear
 *
 *   name  → haritada görünen ad
 *   lat   → enlem  (Google Maps'ten bakılabilir, ör. Belgrad 44.79)
 *   lon   → boylam (ör. Belgrad 20.45)
 *   type  → 'market' (ülke/şehir noktası) ya da 'region' (geniş bölge, yumuşak ışıma)
 *   side  → etiketin noktaya göre yeri: 'right' | 'left' | 'top' | 'bottom'
 *
 * DİKKAT: Buraya yalnızca Mutlusan'ın gerçekten çalıştığı pazarları yaz. Harita herkese açık;
 * burada görünen her nokta "burada satış yapıyoruz" iddiası taşır.
 */

return [

    // Merkez ve üretim tesisi: İkitelli OSB, Başakşehir, İstanbul
    'hub' => ['name' => 'Istanbul', 'lat' => 41.07, 'lon' => 28.80],

    'markets' => [
        // Kaynak: Mutlusan firma haberleri (2018) — Sırbistan bayisiyle ürün tanıtım toplantısı
        ['name' => 'Serbia', 'lat' => 44.79, 'lon' => 20.45, 'type' => 'market', 'side' => 'left'],

        // Kaynak: Mutlusan firma haberleri (2018) — Cezayir bayisi fabrika ziyareti
        ['name' => 'Algeria', 'lat' => 36.75, 'lon' => 3.06, 'type' => 'market', 'side' => 'right'],

        // Kaynak: firma açıklaması "Avrupalı firmaların tercihi"; VDE sertifikası; Light + Building Frankfurt katılımcısı
        ['name' => 'Europe', 'lat' => 50.50, 'lon' => 12.00, 'type' => 'region', 'side' => 'top'],

        // Kaynak: EAC (Avrasya Uygunluk) sertifikası; ihracat ekibinde Rusça bilen temsilci aranması
        ['name' => 'Eurasia', 'lat' => 54.00, 'lon' => 58.00, 'type' => 'region', 'side' => 'top'],
    ],

    // Sağdaki kart (şirketin kendi sitesindeki bilgilerle aynı)
    'stats' => [
        ['value' => 85, 'suffix' => '+',    'label' => 'Countries served',            'icon' => 'globe'],
        ['value' => 81, 'suffix' => '',     'label' => 'Provinces in Türkiye', 'icon' => 'pin'],
        ['value' => 50, 'suffix' => 'K m²', 'label' => 'Production area',  'icon' => 'factory'],
    ],
];
