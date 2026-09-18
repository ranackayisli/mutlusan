<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class BTypeBreakerSeeder extends Seeder
{
    public function run(): void
    {
        // 'Otomatik Sigortalar' alt kategorisini bul (Şalt Ürünleri > Otomatik Sigortalar)
        $kategori = Category::where('name', 'Otomatik Sigortalar')->firstOrFail();

        // Bu kategoride şu anki en yüksek sıralamayı bul, yenileri onun devamına ekle
        $siraBaslangic = (int) $kategori->products()->max('sort_order') + 1;

        $urunler = [
            ['code' => 'MTS06-1001B', 'pole' => '1P', 'description' => '6kA 1P 1A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-1001B.png'],
            ['code' => 'MTS06-1002B', 'pole' => '1P', 'description' => '6kA 1P 2A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-1002B.png'],
            ['code' => 'MTS06-1003B', 'pole' => '1P', 'description' => '6kA 1P 3A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-1003B.png'],
            ['code' => 'MTS06-1004B', 'pole' => '1P', 'description' => '6kA 1P 4A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-1004B.png'],
            ['code' => 'MTS06-1005B', 'pole' => '1P', 'description' => '6kA 1P 5A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-1005B.png'],
            ['code' => 'MTS06-1006B', 'pole' => '1P', 'description' => '6kA 1P 6A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-1006B.png'],
            ['code' => 'MTS06-1010B', 'pole' => '1P', 'description' => '6kA 1P 10A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-1010B.png'],
            ['code' => 'MTS06-1016B', 'pole' => '1P', 'description' => '6kA 1P 16A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-1016B.png'],
            ['code' => 'MTS06-1020B', 'pole' => '1P', 'description' => '6kA 1P 20A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-1020B.png'],
            ['code' => 'MTS06-1025B', 'pole' => '1P', 'description' => '6kA 1P 25A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-1025B.png'],
            ['code' => 'MTS06-1032B', 'pole' => '1P', 'description' => '6kA 1P 32A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-1032B.png'],
            ['code' => 'MTS06-1040B', 'pole' => '1P', 'description' => '6kA 1P 40A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-1040B.png'],
            ['code' => 'MTS06-1050B', 'pole' => '1P', 'description' => '6kA 1P 50A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-1050B.png'],
            ['code' => 'MTS06-1063B', 'pole' => '1P', 'description' => '6kA 1P 63A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-1063B.png'],
            ['code' => 'MTS06-2001B', 'pole' => '2P', 'description' => '6kA 2P 1A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-2001B.png'],
            ['code' => 'MTS06-2002B', 'pole' => '2P', 'description' => '6kA 2P 2A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-2002B.png'],
            ['code' => 'MTS06-2003B', 'pole' => '2P', 'description' => '6kA 2P 3A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-2003B.png'],
            ['code' => 'MTS06-2004B', 'pole' => '2P', 'description' => '6kA 2P 4A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-2004B.png'],
            ['code' => 'MTS06-2005B', 'pole' => '2P', 'description' => '6kA 2P 5A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-2005B.png'],
            ['code' => 'MTS06-2006B', 'pole' => '2P', 'description' => '6kA 2P 6A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-2006B.png'],
            ['code' => 'MTS06-2010B', 'pole' => '2P', 'description' => '6kA 2P 10A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-2010B.png'],
            ['code' => 'MTS06-2016B', 'pole' => '2P', 'description' => '6kA 2P 16A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-2016B.png'],
            ['code' => 'MTS06-2020B', 'pole' => '2P', 'description' => '6kA 2P 20A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-2020B.png'],
            ['code' => 'MTS06-2025B', 'pole' => '2P', 'description' => '6kA 2P 25A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-2025B.png'],
            ['code' => 'MTS06-2032B', 'pole' => '2P', 'description' => '6kA 2P 32A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-2032B.png'],
            ['code' => 'MTS06-2040B', 'pole' => '2P', 'description' => '6kA 2P 40A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-2040B.png'],
            ['code' => 'MTS06-2050B', 'pole' => '2P', 'description' => '6kA 2P 50A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-2050B.png'],
            ['code' => 'MTS06-2063B', 'pole' => '2P', 'description' => '6kA 2P 63A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-2063B.png'],
            ['code' => 'MTS06-3001B', 'pole' => '3P', 'description' => '6kA 3P 1A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-3001B.png'],
            ['code' => 'MTS06-3002B', 'pole' => '3P', 'description' => '6kA 3P 2A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-3002B.png'],
            ['code' => 'MTS06-3003B', 'pole' => '3P', 'description' => '6kA 3P 3A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-3003B.png'],
            ['code' => 'MTS06-3004B', 'pole' => '3P', 'description' => '6kA 3P 4A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-3004B.png'],
            ['code' => 'MTS06-3005B', 'pole' => '3P', 'description' => '6kA 3P 5A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-3005B.png'],
            ['code' => 'MTS06-3006B', 'pole' => '3P', 'description' => '6kA 3P 6A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-3006B.png'],
            ['code' => 'MTS06-3010B', 'pole' => '3P', 'description' => '6kA 3P 10A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-3010B.png'],
            ['code' => 'MTS06-3016B', 'pole' => '3P', 'description' => '6kA 3P 16A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-3016B.png'],
            ['code' => 'MTS06-3020B', 'pole' => '3P', 'description' => '6kA 3P 20A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-3020B.png'],
            ['code' => 'MTS06-3025B', 'pole' => '3P', 'description' => '6kA 3P 25A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-3025B.png'],
            ['code' => 'MTS06-3032B', 'pole' => '3P', 'description' => '6kA 3P 32A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-3032B.png'],
            ['code' => 'MTS06-3040B', 'pole' => '3P', 'description' => '6kA 3P 40A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-3040B.png'],
            ['code' => 'MTS06-3050B', 'pole' => '3P', 'description' => '6kA 3P 50A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-3050B.png'],
            ['code' => 'MTS06-3063B', 'pole' => '3P', 'description' => '6kA 3P 63A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-3063B.png'],
            ['code' => 'MTS06-4001B', 'pole' => '4P', 'description' => '6kA 4P 1A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-4001B.png'],
            ['code' => 'MTS06-4002B', 'pole' => '4P', 'description' => '6kA 4P 2A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-4002B.png'],
            ['code' => 'MTS06-4003B', 'pole' => '4P', 'description' => '6kA 4P 3A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-4003B.png'],
            ['code' => 'MTS06-4004B', 'pole' => '4P', 'description' => '6kA 4P 4A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-4004B.png'],
            ['code' => 'MTS06-4005B', 'pole' => '4P', 'description' => '6kA 4P 5A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-4005B.png'],
            ['code' => 'MTS06-4006B', 'pole' => '4P', 'description' => '6kA 4P 6A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-4006B.png'],
            ['code' => 'MTS06-4010B', 'pole' => '4P', 'description' => '6kA 4P 10A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-4010B.png'],
            ['code' => 'MTS06-4016B', 'pole' => '4P', 'description' => '6kA 4P 16A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-4016B.png'],
            ['code' => 'MTS06-4020B', 'pole' => '4P', 'description' => '6kA 4P 20A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-4020B.png'],
            ['code' => 'MTS06-4025B', 'pole' => '4P', 'description' => '6kA 4P 25A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-4025B.png'],
            ['code' => 'MTS06-4032B', 'pole' => '4P', 'description' => '6kA 4P 32A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-4032B.png'],
            ['code' => 'MTS06-4040B', 'pole' => '4P', 'description' => '6kA 4P 40A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-4040B.png'],
            ['code' => 'MTS06-4050B', 'pole' => '4P', 'description' => '6kA 4P 50A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-4050B.png'],
            ['code' => 'MTS06-4063B', 'pole' => '4P', 'description' => '6kA 4P 63A B TİPİ OTOMATİK SİGORTA B TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'image' => 'products/MTS06-4063B.png'],
        ];

        foreach ($urunler as $i => $urun) {
            Product::updateOrCreate(
                ['category_id' => $kategori->id, 'code' => $urun['code']],
                [
                    'pole' => $urun['pole'],
                    'description' => $urun['description'],
                    'image' => $urun['image'],
                    'sort_order' => $siraBaslangic + $i,
                ]
            );
        }

        $this->command->info(count($urunler) . ' adet B Tipi otomatik sigorta eklendi/güncellendi.');
    }
}
