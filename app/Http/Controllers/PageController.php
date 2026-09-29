<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /** Sayfası henüz hazır olmayan ürün grupları: slug => [ad, açıklama] */
    public const YAKINDA_GRUPLARI = [
        'kablo-kanallari' => ['ad' => 'Kablo Kanalları', 'aciklama' => 'Düzenli, güvenli ve estetik kablo tesisatı çözümleri.'],
        'ray-klemens' => ['ad' => 'Ray Klemens', 'aciklama' => 'DIN ray uyumlu vidalı ve Push-In bağlantı terminalleri.'],
        'fis-priz' => ['ad' => 'Fiş Priz', 'aciklama' => 'Çoklu kullanım için pratik ve güvenli güç çözümleri.'],
        'mutlusan-chargebox' => ['ad' => 'Mutlusan Chargebox', 'aciklama' => 'Elektrikli araçlar için akıllı ev tipi şarj istasyonu.'],
        'akilli-ev-sistemleri' => ['ad' => 'Akıllı Ev Sistemleri', 'aciklama' => 'KNX tabanlı, bağlantılı ve konforlu yaşam teknolojileri.'],
    ];

    /** Doküman merkezi örnek listesi (dosyalar yüklenince veritabanına taşınabilir) */
    private const DOKUMANLAR = [
        ['tur' => 'Katalog', 'ad' => 'Genel Katalog 2025', 'boyut' => 'PDF · 28 MB'],
        ['tur' => 'Teknik Föy', 'ad' => 'Kablo Kanalı Föy', 'boyut' => 'PDF · 1.2 MB'],
        ['tur' => 'Sertifika', 'ad' => 'ISO 9001:2015', 'boyut' => 'PDF · 0.8 MB'],
    ];

    public function hakkimizda()
    {
        return view('hakkimizda');
    }

    public function urunler(Request $request)
    {
        $q = trim((string) $request->query('q', ''));
        $sonuclar = null;

        if ($q !== '') {
            $sonuclar = Product::query()
                ->where('is_active', true)
                ->where(function ($w) use ($q) {
                    $w->where('code', 'like', "%{$q}%")
                        ->orWhere('description', 'like', "%{$q}%");
                })
                ->with('category.parent')
                ->orderBy('sort_order')
                ->limit(60)
                ->get();
        }

        return view('urunler', compact('q', 'sonuclar'));
    }

    public function urunGrubu(string $slug)
    {
        abort_unless(isset(self::YAKINDA_GRUPLARI[$slug]), 404);

        return view('urunler.yakinda', ['grup' => self::YAKINDA_GRUPLARI[$slug]]);
    }

    public function iletisim()
    {
        return view('iletisim');
    }

    public function dokumanlar(Request $request)
    {
        $q = trim((string) $request->query('q', ''));
        $tur = (string) $request->query('tur', '');

        $dokumanlar = collect(self::DOKUMANLAR)
            ->when($q !== '', fn ($c) => $c->filter(fn ($d) => mb_stripos($d['ad'].' '.$d['tur'], $q) !== false))
            ->when($tur !== '', fn ($c) => $c->filter(fn ($d) => $d['tur'] === $tur))
            ->values();

        $turler = collect(self::DOKUMANLAR)->pluck('tur')->unique()->values();

        return view('dokumanlar', compact('q', 'tur', 'dokumanlar', 'turler'));
    }

    public function anahtarPriz()
    {
        $kategori = Category::where('slug', 'anahtar-priz-ve-grup-prizler')
            ->with(['children' => fn ($q) => $q->where('is_active', true)->with(['products' => fn ($p) => $p->where('is_active', true)])])
            ->firstOrFail();

        return view('urunler.anahtar-priz', compact('kategori'));
    }

    public function saltUrunleri()
    {
        $kategori = Category::where('slug', 'salt-urunleri')
            ->with(['children' => fn ($q) => $q->where('is_active', true)->with(['products' => fn ($p) => $p->where('is_active', true)])])
            ->firstOrFail();

        return view('urunler.salt-urunleri', compact('kategori'));
    }
}
