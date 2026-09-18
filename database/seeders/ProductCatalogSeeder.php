<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductCatalogSeeder extends Seeder
{
    public function run(): void
    {
        // ================= ŞALT ÜRÜNLERİ =================
        $salt = Category::create([
            'name' => 'Şalt Ürünleri',
            'slug' => 'salt-urunleri',
            'description' => 'Otomatik sigortalardan kaçak akım koruma rölelerine, kontaktörlerden motor koruma şalterlerine kadar.',
            'sort_order' => 1,
        ]);

        $saltSub1 = Category::create([
            'name' => 'Otomatik Sigortalar',
            'parent_id' => $salt->id,
            'sort_order' => 1,
        ]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-1001C', 'pole' => '1P', 'description' => '6kA 1P 1A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 1]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-1002C', 'pole' => '1P', 'description' => '6kA 1P 2A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 2]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-1003C', 'pole' => '1P', 'description' => '6kA 1P 3A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 3]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-1004C', 'pole' => '1P', 'description' => '6kA 1P 4A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 4]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-1005C', 'pole' => '1P', 'description' => '6kA 1P 5A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 5]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-1006C', 'pole' => '1P', 'description' => '6kA 1P 6A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 6]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-1010C', 'pole' => '1P', 'description' => '6kA 1P 10A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 7]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-1016C', 'pole' => '1P', 'description' => '6kA 1P 16A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 8]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-1020C', 'pole' => '1P', 'description' => '6kA 1P 20A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 9]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-1025C', 'pole' => '1P', 'description' => '6kA 1P 25A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 10]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-1032C', 'pole' => '1P', 'description' => '6kA 1P 32A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 11]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-1040C', 'pole' => '1P', 'description' => '6kA 1P 40A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 12]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-1050C', 'pole' => '1P', 'description' => '6kA 1P 50A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 13]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-1063C', 'pole' => '1P', 'description' => '6kA 1P 63A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 14]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-2001C', 'pole' => '2P', 'description' => '6kA 2P 1A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 15]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-2002C', 'pole' => '2P', 'description' => '6kA 2P 2A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 16]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-2003C', 'pole' => '2P', 'description' => '6kA 2P 3A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 17]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-2004C', 'pole' => '2P', 'description' => '6kA 2P 4A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 18]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-2005C', 'pole' => '2P', 'description' => '6kA 2P 5A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 19]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-2006C', 'pole' => '2P', 'description' => '6kA 2P 6A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 20]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-2010C', 'pole' => '2P', 'description' => '6kA 2P 10A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 21]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-2016C', 'pole' => '2P', 'description' => '6kA 2P 16A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 22]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-2020C', 'pole' => '2P', 'description' => '6kA 2P 20A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 23]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-2025C', 'pole' => '2P', 'description' => '6kA 2P 25A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 24]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-2032C', 'pole' => '2P', 'description' => '6kA 2P 32A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 25]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-2040C', 'pole' => '2P', 'description' => '6kA 2P 40A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 26]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-2050C', 'pole' => '2P', 'description' => '6kA 2P 50A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 27]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-2063C', 'pole' => '2P', 'description' => '6kA 2P 63A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 28]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-3001C', 'pole' => '3P', 'description' => '6kA 3P 1A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 29]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-3002C', 'pole' => '3P', 'description' => '6kA 3P 2A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 30]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-3003C', 'pole' => '3P', 'description' => '6kA 3P 3A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 31]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-3004C', 'pole' => '3P', 'description' => '6kA 3P 4A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 32]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-3005C', 'pole' => '3P', 'description' => '6kA 3P 5A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 33]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-3006C', 'pole' => '3P', 'description' => '6kA 3P 6A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 34]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-3010C', 'pole' => '3P', 'description' => '6kA 3P 10A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 35]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-3016C', 'pole' => '3P', 'description' => '6kA 3P 16A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 36]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-3020C', 'pole' => '3P', 'description' => '6kA 3P 20A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 37]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-3025C', 'pole' => '3P', 'description' => '6kA 3P 25A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 38]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-3032C', 'pole' => '3P', 'description' => '6kA 3P 32A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 39]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-3040C', 'pole' => '3P', 'description' => '6kA 3P 40A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 40]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-3050C', 'pole' => '3P', 'description' => '6kA 3P 50A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 41]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-3063C', 'pole' => '3P', 'description' => '6kA 3P 63A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 42]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-4001C', 'pole' => '4P', 'description' => '6kA 4P 1A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 43]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-4002C', 'pole' => '4P', 'description' => '6kA 4P 2A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 44]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-4003C', 'pole' => '4P', 'description' => '6kA 4P 3A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 45]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-4004C', 'pole' => '4P', 'description' => '6kA 4P 4A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 46]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-4005C', 'pole' => '4P', 'description' => '6kA 4P 5A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 47]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-4006C', 'pole' => '4P', 'description' => '6kA 4P 6A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 48]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-4010C', 'pole' => '4P', 'description' => '6kA 4P 10A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 49]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-4016C', 'pole' => '4P', 'description' => '6kA 4P 16A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 50]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-4020C', 'pole' => '4P', 'description' => '6kA 4P 20A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 51]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-4025C', 'pole' => '4P', 'description' => '6kA 4P 25A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 52]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-4032C', 'pole' => '4P', 'description' => '6kA 4P 32A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 53]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-4040C', 'pole' => '4P', 'description' => '6kA 4P 40A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 54]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-4050C', 'pole' => '4P', 'description' => '6kA 4P 50A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 55]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS06-4063C', 'pole' => '4P', 'description' => '6kA 4P 63A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 56]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTH10-1080C', 'pole' => '1P', 'description' => '10kA 1P 80A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 57]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTH10-1100C', 'pole' => '1P', 'description' => '10kA 1P 100A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 58]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTH10-1125C', 'pole' => '1P', 'description' => '10kA 1P 125A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 59]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTH10-2080C', 'pole' => '2P', 'description' => '10kA 2P 80A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 60]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTH10-2100C', 'pole' => '2P', 'description' => '10kA 2P 100A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 61]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTH10-2125C', 'pole' => '2P', 'description' => '10kA 2P 125A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 62]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTH10-3080C', 'pole' => '3P', 'description' => '10kA 3P 80A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 63]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTH10-3100C', 'pole' => '3P', 'description' => '10kA 3P 100A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 64]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTH10-3125C', 'pole' => '3P', 'description' => '10kA 3P 125A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 65]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTH10-4080C', 'pole' => '4P', 'description' => '10kA 4P 80A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 66]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTH10-4100C', 'pole' => '4P', 'description' => '10kA 4P 100A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 67]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTH10-4125C', 'pole' => '4P', 'description' => '10kA 4P 125A C TİPİ OTOMATİK SİGORTA C TYPE MINIATURE CIRCUIT BREAKER (MCB)', 'sort_order' => 68]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS04-106CN', 'pole' => '1P', 'description' => '+ N         4.5kA 1P+N 6A OTOMATİK SİGORTA MINIATURE CIRCUIT BREAKER', 'sort_order' => 69]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS04-110CN', 'pole' => '1P', 'description' => '+ N         4.5kA 1P+N 10A OTOMATİK SİGORTA MINIATURE CIRCUIT BREAKER', 'sort_order' => 70]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS04-116CN', 'pole' => '1P', 'description' => '+ N         4.5kA 1P+N 16A OTOMATİK SİGORTA MINIATURE CIRCUIT BREAKER', 'sort_order' => 71]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS04-120CN', 'pole' => '1P', 'description' => '+ N         4.5kA 1P+N 20A OTOMATİK SİGORTA MINIATURE CIRCUIT BREAKER', 'sort_order' => 72]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS04-125CN', 'pole' => '1P', 'description' => '+ N         4.5kA 1P+N 25A OTOMATİK SİGORTA MINIATURE CIRCUIT BREAKER', 'sort_order' => 73]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS04-132CN', 'pole' => '1P', 'description' => '+ N         4.5kA 1P+N 32A OTOMATİK SİGORTA MINIATURE CIRCUIT BREAKER', 'sort_order' => 74]);
        Product::create(['category_id' => $saltSub1->id, 'code' => 'MTS04-140CN', 'pole' => '1P', 'description' => '+ N         4.5kA 1P+N 40A OTOMATİK SİGORTA MINIATURE CIRCUIT BREAKER', 'sort_order' => 75]);

        $saltSub2 = Category::create([
            'name' => 'Kaçak Akım Koruma Röleleri',
            'parent_id' => $salt->id,
            'sort_order' => 2,
        ]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC06-201016A', 'pole' => '2P', 'description' => '6kA 10mA 16A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 1]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC06-201025A', 'pole' => '2P', 'description' => '6kA 10mA 25A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 2]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC06-203016A', 'pole' => '2P', 'description' => '6kA 30mA 16A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 3]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC06-203020A', 'pole' => '2P', 'description' => '6kA 30mA 20A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 4]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC06-203025A', 'pole' => '2P', 'description' => '6kA 30mA 25A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 5]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC06-203032A', 'pole' => '2P', 'description' => '6kA 30mA 32A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 6]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC06-203040A', 'pole' => '2P', 'description' => '6kA 30mA 40A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 7]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC06-203050A', 'pole' => '2P', 'description' => '6kA 30mA 50A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 8]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC06-203063A', 'pole' => '2P', 'description' => '6kA 30mA 63A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 9]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC06-203080A', 'pole' => '2P', 'description' => '6kA 30mA 80A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 10]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC06-230016A', 'pole' => '2P', 'description' => '6kA 300mA 16A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 11]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC06-230020A', 'pole' => '2P', 'description' => '6kA 300mA 20A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 12]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC06-230025A', 'pole' => '2P', 'description' => '6kA 300mA 25A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 13]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC06-230032A', 'pole' => '2P', 'description' => '6kA 300mA 32A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 14]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC06-230040A', 'pole' => '2P', 'description' => '6kA 300mA 40A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 15]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC06-230050A', 'pole' => '2P', 'description' => '6kA 300mA 50A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 16]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC06-230063A', 'pole' => '2P', 'description' => '6kA 300mA 63A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 17]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC06-230080A', 'pole' => '2P', 'description' => '6kA 300mA 80A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 18]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC06-403016A', 'pole' => '4P', 'description' => '6kA 30mA 16A KAÇAK AKIM KORUMA     RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 19]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC06-403020A', 'pole' => '4P', 'description' => '6kA 30mA 20A KAÇAK AKIM KORUMA     RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 20]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC06-403025A', 'pole' => '4P', 'description' => '6kA 30mA 25A KAÇAK AKIM KORUMA     RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 21]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC06-403032A', 'pole' => '4P', 'description' => '6kA 30mA 32A KAÇAK AKIM KORUMA     RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 22]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC06-403040A', 'pole' => '4P', 'description' => '6kA 30mA 40A KAÇAK AKIM KORUMA     RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 23]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC06-403050A', 'pole' => '4P', 'description' => '6kA 30mA 50A KAÇAK AKIM KORUMA     RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 24]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC06-403063A', 'pole' => '4P', 'description' => '6kA 30mA 63A KAÇAK AKIM KORUMA     RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 25]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC06-403080A', 'pole' => '4P', 'description' => '6kA 30mA 80A KAÇAK AKIM KORUMA     RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 26]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC06-4030100A', 'pole' => '4P', 'description' => '6kA 30mA 100A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 27]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC06-430016A', 'pole' => '4P', 'description' => '6kA 30mA 16A KAÇAK AKIM KORUMA     RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 28]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC06-430020A', 'pole' => '4P', 'description' => '6kA 30mA 20A KAÇAK AKIM KORUMA     RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 29]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC06-430025A', 'pole' => '4P', 'description' => '6kA 300mA 25A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 30]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC06-430032A', 'pole' => '4P', 'description' => '6kA 300mA 32A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 31]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC06-430040A', 'pole' => '4P', 'description' => '6kA 300mA 40A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 32]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC06-430050A', 'pole' => '4P', 'description' => '6kA 300mA 50A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 33]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC06-430063A', 'pole' => '4P', 'description' => '6kA 300mA 63A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 34]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC06-430080A', 'pole' => '4P', 'description' => '6kA 300mA 80A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 35]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC06-4300100A', 'pole' => '4P', 'description' => '6kA 300mA 100A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 36]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC10-403016', 'pole' => '4P', 'description' => '10kA 30mA 16A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 37]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC10-403020', 'pole' => '4P', 'description' => '10kA 30mA 20A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 38]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC10-403025', 'pole' => '4P', 'description' => '10kA 30mA 25A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 39]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC10-403032', 'pole' => '4P', 'description' => '10kA 30mA 32A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 40]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC10-403040', 'pole' => '4P', 'description' => '10kA 30mA 40A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 41]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC10-403050', 'pole' => '4P', 'description' => '10kA 30mA 50A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 42]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC10-403063', 'pole' => '4P', 'description' => '10kA 30mA 63A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 43]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC10-403080', 'pole' => '4P', 'description' => '10kA 30mA 80A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 44]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC10-4030100', 'pole' => '4P', 'description' => '10kA 30mA 100A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 45]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC10-430016', 'pole' => '4P', 'description' => '10kA 30mA 16A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 46]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC10-430020', 'pole' => '4P', 'description' => '10kA 30mA 20A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 47]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC10-430025', 'pole' => '4P', 'description' => '10kA 300mA 25A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 48]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC10-430032', 'pole' => '4P', 'description' => '10kA 300mA 32A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 49]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC10-430040', 'pole' => '4P', 'description' => '10kA 300mA 40A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 50]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC10-430050', 'pole' => '4P', 'description' => '10kA 300mA 50A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 51]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC10-430063', 'pole' => '4P', 'description' => '10kA 300mA 63A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 52]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC10-430080', 'pole' => '4P', 'description' => '10kA 300mA 80A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 53]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC10-4300100', 'pole' => '4P', 'description' => '10kA 300mA 100A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 54]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC10-403016A', 'pole' => '4P', 'description' => '10kA 30mA 16A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 55]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC10-403020A', 'pole' => '4P', 'description' => '10kA 30mA 20A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 56]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC10-403025A', 'pole' => '4P', 'description' => '10kA 30mA 25A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 57]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC10-403032A', 'pole' => '4P', 'description' => '10kA 30mA 32A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 58]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC10-403050A', 'pole' => '4P', 'description' => '10kA 30mA 50A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 59]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC10-403063A', 'pole' => '4P', 'description' => '10kA 30mA 63A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 60]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC10-403080A', 'pole' => '4P', 'description' => '10kA 30mA 80A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 61]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC10-4030100A', 'pole' => '4P', 'description' => '10kA 30mA 100A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 62]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC10-430016A', 'pole' => '4P', 'description' => '10kA 30mA 16A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 63]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC10-430020A', 'pole' => '4P', 'description' => '10kA 30mA 20A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 64]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC10-430025A', 'pole' => '4P', 'description' => '10kA 300mA 25A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 65]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC10-430032A', 'pole' => '4P', 'description' => '10kA 300mA 32A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 66]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC10-430040A', 'pole' => '4P', 'description' => '10kA 300mA 40A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 67]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC10-430050A', 'pole' => '4P', 'description' => '10kA 300mA 50A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 68]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC10-430063A', 'pole' => '4P', 'description' => '10kA 300mA 63A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 69]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC10-430080A', 'pole' => '4P', 'description' => '10kA 300mA 80A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 70]);
        Product::create(['category_id' => $saltSub2->id, 'code' => 'MRC10-4300100A', 'pole' => '4P', 'description' => '10kA 300mA 100A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 71]);

        $saltSub3 = Category::create([
            'name' => 'Kaçak Akım Korumalı Sigortalar (Elektronik)',
            'parent_id' => $salt->id,
            'sort_order' => 3,
        ]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-201006AC', 'pole' => '2P', 'description' => '6kA 10mA 6A KAÇAK AKIM KORUMA    RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 1]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-201016AC', 'pole' => '2P', 'description' => '6kA 10mA 16A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 2]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-201020AC', 'pole' => '2P', 'description' => '6kA 10mA 20A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 3]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-201025AC', 'pole' => '2P', 'description' => '6kA 10mA 25A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 4]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-203006AC', 'pole' => '2P', 'description' => '6kA 30mA 6A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 5]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-203016AC', 'pole' => '2P', 'description' => '6kA 30mA 16A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 6]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-203020AC', 'pole' => '2P', 'description' => '6kA 30mA 20A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 7]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-203025AC', 'pole' => '2P', 'description' => '6kA 30mA 25A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 8]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-203032AC', 'pole' => '2P', 'description' => '6kA 30mA 32A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 9]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-203063AC', 'pole' => '2P', 'description' => '6kA 30mA 63A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 10]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-210006AC', 'pole' => '2P', 'description' => '6kA 100mA 6A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 11]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-210016AC', 'pole' => '2P', 'description' => '6kA 100mA 16A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 12]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-210020AC', 'pole' => '2P', 'description' => '6kA 100mA 20A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 13]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-210025AC', 'pole' => '2P', 'description' => '6kA 100mA 25A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 14]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-210032AC', 'pole' => '2P', 'description' => '6kA 100mA 32A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 15]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-210040AC', 'pole' => '2P', 'description' => '6kA 100mA 40A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 16]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-210063AC', 'pole' => '2P', 'description' => '6kA 100mA 63A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 17]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-230006AC', 'pole' => '2P', 'description' => '6kA 300mA 6A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 18]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-230016AC', 'pole' => '2P', 'description' => '6kA 300mA 16A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 19]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-230020AC', 'pole' => '2P', 'description' => '6kA 300mA 20A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 20]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-230025AC', 'pole' => '2P', 'description' => '6kA 300mA 25A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 21]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-230032AC', 'pole' => '2P', 'description' => '6kA 300mA 32A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 22]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-230063AC', 'pole' => '2P', 'description' => '6kA 300mA 63A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 23]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-201020A', 'pole' => '2P', 'description' => '6kA 10mA 20A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 24]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-201025A', 'pole' => '2P', 'description' => '6kA 10mA 25A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 25]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-203006A', 'pole' => '2P', 'description' => '6kA 30mA 6A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 26]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-203016A', 'pole' => '2P', 'description' => '6kA 30mA 16A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 27]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-203020A', 'pole' => '2P', 'description' => '6kA 30mA 20A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 28]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-203025A', 'pole' => '2P', 'description' => '6kA 30mA 25A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 29]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-203032A', 'pole' => '2P', 'description' => '6kA 30mA 32A KAÇAK AKIM KORUMA   RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 30]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-203040A', 'pole' => '2P', 'description' => '6kA 30mA 40A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 31]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-203063A', 'pole' => '2P', 'description' => '6kA 30mA 63A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 32]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-210006A', 'pole' => '2P', 'description' => '6kA 100mA 6A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 33]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-210016A', 'pole' => '2P', 'description' => '6kA 100mA 16A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 34]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-210020A', 'pole' => '2P', 'description' => '6kA 100mA 20A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 35]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-210025A', 'pole' => '2P', 'description' => '6kA 100mA 25A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 36]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-210032A', 'pole' => '2P', 'description' => '6kA 100mA 32A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 37]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-210040A', 'pole' => '2P', 'description' => '6kA 100mA 40A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 38]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-210063A', 'pole' => '2P', 'description' => '6kA 100mA 63A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 39]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-230006A', 'pole' => '2P', 'description' => '6kA 300mA 6A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 40]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-230016A', 'pole' => '2P', 'description' => '6kA 300mA 16A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 41]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-230020A', 'pole' => '2P', 'description' => '6kA 300mA 20A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 42]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-230025A', 'pole' => '2P', 'description' => '6kA 300mA 25A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 43]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-230032A', 'pole' => '2P', 'description' => '6kA 300mA 32A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 44]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-230040A', 'pole' => '2P', 'description' => '6kA 300mA 40A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 45]);
        Product::create(['category_id' => $saltSub3->id, 'code' => 'MREO06-230063A', 'pole' => '2P', 'description' => '6kA 300mA 63A KAÇAK AKIM KORUMA RESIDUAL CURRENT CIRCUIT BREAKER', 'sort_order' => 46]);

        $saltSub4 = Category::create([
            'name' => 'Kaçak Akım Korumalı Sigortalar (Mekanik)',
            'parent_id' => $salt->id,
            'sort_order' => 4,
        ]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-201006AC', 'pole' => '2P', 'description' => '6kA AC TİPİ 10mA 6A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 1]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-201016AC', 'pole' => '2P', 'description' => '6kA AC TİPİ 10mA 16A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 2]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-201020AC', 'pole' => '2P', 'description' => '6kA AC TİPİ 10mA 20A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 3]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-203025AC', 'pole' => '2P', 'description' => '6kA AC TİPİ 10mA 25A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 4]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-203006AC', 'pole' => '2P', 'description' => '6kA AC TİPİ 30mA 6A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 5]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-203016AC', 'pole' => '2P', 'description' => '6kA AC TİPİ 30mA 16A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 6]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-203020AC', 'pole' => '2P', 'description' => '6kA AC TİPİ 30mA 20A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 7]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-203025AC', 'pole' => '2P', 'description' => '6kA AC TİPİ 30mA 25A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 8]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-203032AC', 'pole' => '2P', 'description' => '6kA AC TİPİ 30mA 32A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 9]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-203040AC', 'pole' => '2P', 'description' => '6kA AC TİPİ 30mA 40A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 10]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-203063AC', 'pole' => '2P', 'description' => '6kA AC TİPİ 30mA 63A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 11]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-210006AC', 'pole' => '2P', 'description' => '6kA AC TİPİ 100mA 6A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 12]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-210016AC', 'pole' => '2P', 'description' => '6kA AC TİPİ 100mA 16A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 13]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-210020AC', 'pole' => '2P', 'description' => '6kA AC TİPİ 100mA 20A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 14]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-210025AC', 'pole' => '2P', 'description' => '6kA AC TİPİ 100mA 25A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 15]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-210032AC', 'pole' => '2P', 'description' => '6kA AC TİPİ 100mA 32A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 16]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-210040AC', 'pole' => '2P', 'description' => '6kA AC TİPİ 100mA 40A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 17]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-230063AC', 'pole' => '2P', 'description' => '6kA AC TİPİ 300mA 63A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 18]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-230006AC', 'pole' => '2P', 'description' => '6kA AC TİPİ 300mA 6A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 19]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-230016AC', 'pole' => '2P', 'description' => '6kA AC TİPİ 300mA 16A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 20]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-230020AC', 'pole' => '2P', 'description' => '6kA AC TİPİ 300mA 20A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 21]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-230025AC', 'pole' => '2P', 'description' => '6kA AC TİPİ 300mA 25A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 22]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-230032AC', 'pole' => '2P', 'description' => '6kA AC TİPİ 300mA 32A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 23]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-230040AC', 'pole' => '2P', 'description' => '6kA AC TİPİ 300mA 40A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 24]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-230063AC', 'pole' => '2P', 'description' => '6kA AC TİPİ 300mA 63A SİGORTALI KAÇAK AKIM KORUMA RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 25]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-201006A', 'pole' => '2P', 'description' => '6kA A TİPİ 10mA 6A SİGORTALI KAÇAK AKIM KORUMA        RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 26]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-201016A', 'pole' => '2P', 'description' => '6kA A TİPİ 10mA 16A SİGORTALI KAÇAK AKIM KORUMA       RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 27]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-201020A', 'pole' => '2P', 'description' => '6kA A TİPİ 10mA 20A SİGORTALI KAÇAK AKIM KORUMA       RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 28]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-203025A', 'pole' => '2P', 'description' => '6kA A TİPİ 10mA 25A SİGORTALI KAÇAK AKIM KORUMA       RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 29]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-203006A', 'pole' => '2P', 'description' => '6kA A TİPİ 30mA 6A SİGORTALI KAÇAK AKIM KORUMA        RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 30]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-203016A', 'pole' => '2P', 'description' => '6kA A TİPİ 30mA 16A SİGORTALI KAÇAK AKIM KORUMA       RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 31]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-203020A', 'pole' => '2P', 'description' => '6kA A TİPİ 30mA 20A SİGORTALI KAÇAK AKIM KORUMA       RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 32]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-203025A', 'pole' => '2P', 'description' => '6kA A TİPİ 30mA 25A SİGORTALI KAÇAK AKIM KORUMA       RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 33]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-203032A', 'pole' => '2P', 'description' => '6kA A TİPİ 30mA 32A SİGORTALI KAÇAK AKIM KORUMA       RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 34]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-203040A', 'pole' => '2P', 'description' => '6kA A TİPİ 30mA 40A SİGORTALI KAÇAK AKIM KORUMA       RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 35]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-203063A', 'pole' => '2P', 'description' => '6kA A TİPİ 30mA 63A SİGORTALI KAÇAK AKIM KORUMA       RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 36]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-210006A', 'pole' => '2P', 'description' => '6kA A TİPİ 100mA 6A SİGORTALI KAÇAK AKIM KORUMA       RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 37]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-210016A', 'pole' => '2P', 'description' => '6kA A TİPİ 100mA 16A SİGORTALI KAÇAK AKIM KORUMA      RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 38]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-210020A', 'pole' => '2P', 'description' => '6kA A TİPİ 100mA 20A SİGORTALI KAÇAK AKIM KORUMA      RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 39]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-210025A', 'pole' => '2P', 'description' => '6kA A TİPİ 100mA 25A SİGORTALI KAÇAK AKIM KORUMA      RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 40]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-210032A', 'pole' => '2P', 'description' => '6kA A TİPİ 100mA 32A SİGORTALI KAÇAK AKIM KORUMA      RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 41]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-210040A', 'pole' => '2P', 'description' => '6kA A TİPİ 100mA 40A SİGORTALI KAÇAK AKIM KORUMA      RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 42]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-230063A', 'pole' => '2P', 'description' => '6kA A TİPİ 300mA 63A SİGORTALI KAÇAK AKIM KORUMA      RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 43]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-230006A', 'pole' => '2P', 'description' => '6kA A TİPİ 300mA 6A SİGORTALI KAÇAK AKIM KORUMA       RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 44]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-230016A', 'pole' => '2P', 'description' => '6kA A TİPİ 300mA 16A SİGORTALI KAÇAK AKIM KORUMA      RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 45]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-230020A', 'pole' => '2P', 'description' => '6kA A TİPİ 300mA 20A SİGORTALI KAÇAK AKIM KORUMA      RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 46]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-230025A', 'pole' => '2P', 'description' => '6kA A TİPİ 300mA 25A SİGORTALI KAÇAK AKIM KORUMA      RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 47]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-230032A', 'pole' => '2P', 'description' => '6kA A TİPİ 300mA 32A SİGORTALI KAÇAK AKIM KORUMA      RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 48]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-230040A', 'pole' => '2P', 'description' => '6kA A TİPİ 300mA 40A SİGORTALI KAÇAK AKIM KORUMA      RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 49]);
        Product::create(['category_id' => $saltSub4->id, 'code' => 'MRCO06-230063A', 'pole' => '2P', 'description' => '6kA A TİPİ 300mA 63A SİGORTALI KAÇAK AKIM KORUMA      RESIDUAL CURRENT BREAKER WHITE OVERCURRENT PROTEC', 'sort_order' => 50]);

        $saltSub5 = Category::create([
            'name' => 'Termik Manyetik Şalterler',
            'parent_id' => $salt->id,
            'sort_order' => 5,
        ]);
        Product::create(['category_id' => $saltSub5->id, 'code' => 'MTA25-3016', 'pole' => '3P', 'description' => '25kA 16A TERMİK MANYETİK ŞALTER - AYAR SAHALI   MODEL CASE CIRCUIT BREAKER 12-16', 'sort_order' => 1]);
        Product::create(['category_id' => $saltSub5->id, 'code' => 'MTA25-3025', 'pole' => '3P', 'description' => '25kA 25A TERMİK MANYETİK ŞALTER - AYAR SAHALI   MODEL CASE CIRCUIT BREAKER 16-25', 'sort_order' => 2]);
        Product::create(['category_id' => $saltSub5->id, 'code' => 'MTA25-3032', 'pole' => '3P', 'description' => '25kA 32A TERMİK MANYETİK ŞALTER - AYAR SAHALI   MODEL CASE CIRCUIT BREAKER 25-32', 'sort_order' => 3]);
        Product::create(['category_id' => $saltSub5->id, 'code' => 'MTA25-3040', 'pole' => '3P', 'description' => '25kA 40A TERMİK MANYETİK ŞALTER - AYAR SAHALI   MODEL CASE CIRCUIT BREAKER 32-40', 'sort_order' => 4]);
        Product::create(['category_id' => $saltSub5->id, 'code' => 'MTA25-3050', 'pole' => '3P', 'description' => '25kA 50A TERMİK MANYETİK ŞALTER - AYAR SAHALI   MODEL CASE CIRCUIT BREAKER 40-50', 'sort_order' => 5]);
        Product::create(['category_id' => $saltSub5->id, 'code' => 'MTA25-3063', 'pole' => '3P', 'description' => '25kA 63A TERMİK MANYETİK ŞALTER - AYAR SAHALI   MODEL CASE CIRCUIT BREAKER 50-63', 'sort_order' => 6]);
        Product::create(['category_id' => $saltSub5->id, 'code' => 'MTA25-3080', 'pole' => '3P', 'description' => '25kA 80A TERMİK MANYETİK ŞALTER - AYAR SAHALI   MODEL CASE CIRCUIT BREAKER 63-80', 'sort_order' => 7]);
        Product::create(['category_id' => $saltSub5->id, 'code' => 'MTA25-3100', 'pole' => '3P', 'description' => '25kA 100A TERMİK MANYETİK ŞALTER - AYAR SAHALI MODEL CASE CIRCUIT BREAKER 80-100', 'sort_order' => 8]);
        Product::create(['category_id' => $saltSub5->id, 'code' => 'MTA25-3125', 'pole' => '3P', 'description' => '25kA 125A TERMİK MANYETİK ŞALTER - AYAR SAHALI MODEL CASE CIRCUIT BREAKER 100-125', 'sort_order' => 9]);
        Product::create(['category_id' => $saltSub5->id, 'code' => 'MTA25-3160', 'pole' => '3P', 'description' => '25kA 160A TERMİK MANYETİK ŞALTER - AYAR SAHALI MODEL CASE CIRCUIT BREAKER 125-160', 'sort_order' => 10]);
        Product::create(['category_id' => $saltSub5->id, 'code' => 'MTA35-3100', 'pole' => '3P', 'description' => '35kA 100A TERMİK MANYETİK ŞALTER - AYAR SAHALI MODEL CASE CIRCUIT BREAKER 80-100', 'sort_order' => 11]);
        Product::create(['category_id' => $saltSub5->id, 'code' => 'MTA35-3125', 'pole' => '3P', 'description' => '35kA 125A TERMİK MANYETİK ŞALTER - AYAR SAHALI MODEL CASE CIRCUIT BREAKER 100-125', 'sort_order' => 12]);
        Product::create(['category_id' => $saltSub5->id, 'code' => 'MTA35-3160', 'pole' => '3P', 'description' => '35kA 160A TERMİK MANYETİK ŞALTER - AYAR SAHALI MODEL CASE CIRCUIT BREAKER 125-160', 'sort_order' => 13]);
        Product::create(['category_id' => $saltSub5->id, 'code' => 'MTA35-3200', 'pole' => '3P', 'description' => '35kA 200A TERMİK MANYETİK ŞALTER - AYAR SAHALI MODEL CASE CIRCUIT BREAKER 160-200', 'sort_order' => 14]);
        Product::create(['category_id' => $saltSub5->id, 'code' => 'MTA35-3250', 'pole' => '3P', 'description' => '35kA 250A TERMİK MANYETİK ŞALTER - AYAR SAHALI MODEL CASE CIRCUIT BREAKER 200-250', 'sort_order' => 15]);
        Product::create(['category_id' => $saltSub5->id, 'code' => 'MTA25-4016', 'pole' => '4P', 'description' => '25kA 16A TERMİK MANYETİK ŞALTER - AYAR SAHALI   MODEL CASE CIRCUIT BREAKER 12-16', 'sort_order' => 16]);
        Product::create(['category_id' => $saltSub5->id, 'code' => 'MTA25-4025', 'pole' => '4P', 'description' => '25kA 25A TERMİK MANYETİK ŞALTER - AYAR SAHALI   MODEL CASE CIRCUIT BREAKER 16-25', 'sort_order' => 17]);
        Product::create(['category_id' => $saltSub5->id, 'code' => 'MTA25-4032', 'pole' => '4P', 'description' => '25kA 32A TERMİK MANYETİK ŞALTER - AYAR SAHALI   MODEL CASE CIRCUIT BREAKER 25-32', 'sort_order' => 18]);
        Product::create(['category_id' => $saltSub5->id, 'code' => 'MTA25-4040', 'pole' => '4P', 'description' => '25kA 40A TERMİK MANYETİK ŞALTER - AYAR SAHALI   MODEL CASE CIRCUIT BREAKER 32-40', 'sort_order' => 19]);
        Product::create(['category_id' => $saltSub5->id, 'code' => 'MTA25-4050', 'pole' => '4P', 'description' => '25kA 50A TERMİK MANYETİK ŞALTER - AYAR SAHALI   MODEL CASE CIRCUIT BREAKER 40-50', 'sort_order' => 20]);
        Product::create(['category_id' => $saltSub5->id, 'code' => 'MTA25-4063', 'pole' => '4P', 'description' => '25kA 63A TERMİK MANYETİK ŞALTER - AYAR SAHALI   MODEL CASE CIRCUIT BREAKER 50-63', 'sort_order' => 21]);
        Product::create(['category_id' => $saltSub5->id, 'code' => 'MTA25-4080', 'pole' => '4P', 'description' => '25kA 80A TERMİK MANYETİK ŞALTER - AYAR SAHALI   MODEL CASE CIRCUIT BREAKER 63-80', 'sort_order' => 22]);
        Product::create(['category_id' => $saltSub5->id, 'code' => 'MTA25-4100', 'pole' => '4P', 'description' => '25kA 100A TERMİK MANYETİK ŞALTER - AYAR SAHALI MODEL CASE CIRCUIT BREAKER 80-100', 'sort_order' => 23]);
        Product::create(['category_id' => $saltSub5->id, 'code' => 'MTA25-4125', 'pole' => '4P', 'description' => '25kA 125A TERMİK MANYETİK ŞALTER - AYAR SAHALI MODEL CASE CIRCUIT BREAKER 100-125', 'sort_order' => 24]);
        Product::create(['category_id' => $saltSub5->id, 'code' => 'MTA25-4160', 'pole' => '4P', 'description' => '25kA 160A TERMİK MANYETİK ŞALTER - AYAR SAHALI MODEL CASE CIRCUIT BREAKER 125-160', 'sort_order' => 25]);
        Product::create(['category_id' => $saltSub5->id, 'code' => 'MTA35-4100', 'pole' => '4P', 'description' => '35kA 100A TERMİK MANYETİK ŞALTER - AYAR SAHALI MODEL CASE CIRCUIT BREAKER 80-100', 'sort_order' => 26]);
        Product::create(['category_id' => $saltSub5->id, 'code' => 'MTA35-4125', 'pole' => '4P', 'description' => '35kA 125A TERMİK MANYETİK ŞALTER - AYAR SAHALI MODEL CASE CIRCUIT BREAKER 100-125', 'sort_order' => 27]);
        Product::create(['category_id' => $saltSub5->id, 'code' => 'MTA35-4160', 'pole' => '4P', 'description' => '35kA 160A TERMİK MANYETİK ŞALTER - AYAR SAHALI MODEL CASE CIRCUIT BREAKER 125-160', 'sort_order' => 28]);
        Product::create(['category_id' => $saltSub5->id, 'code' => 'MTA35-4200', 'pole' => '4P', 'description' => '35kA 200A TERMİK MANYETİK ŞALTER - AYAR SAHALI MODEL CASE CIRCUIT BREAKER 160-200', 'sort_order' => 29]);
        Product::create(['category_id' => $saltSub5->id, 'code' => 'MTA35-4250', 'pole' => '4P', 'description' => '35kA 250A TERMİK MANYETİK ŞALTER - AYAR SAHALI MODEL CASE CIRCUIT BREAKER 200-250', 'sort_order' => 30]);

        $saltSub6 = Category::create([
            'name' => 'Kaçak Akım Algılama Röleleri',
            'parent_id' => $salt->id,
            'sort_order' => 6,
        ]);
        Product::create(['category_id' => $saltSub6->id, 'code' => 'MTC00-040', 'pole' => '40MM', 'description' => 'TOROID AKIM TRAFOSU TOROID CURRENT TRANSFORMER', 'sort_order' => 1]);
        Product::create(['category_id' => $saltSub6->id, 'code' => 'MTC00-080', 'pole' => '80MM', 'description' => 'TOROID AKIM TRAFOSU TOROID CURRENT TRANSFORMER', 'sort_order' => 2]);
        Product::create(['category_id' => $saltSub6->id, 'code' => 'MTC00-120', 'pole' => '120MM', 'description' => 'TOROID AKIM TRAFOSU TOROID CURRENT TRANSFORMER', 'sort_order' => 3]);
        Product::create(['category_id' => $saltSub6->id, 'code' => 'MTC00-160', 'pole' => '160MM', 'description' => 'TOROID AKIM TRAFOSU TOROID CURRENT TRANSFORMER', 'sort_order' => 4]);
        Product::create(['category_id' => $saltSub6->id, 'code' => 'MELR00-01', 'pole' => 'KAÇAK', 'description' => 'ALGILAMA RÖLESİ EARTH LEAKAGE RELAY', 'sort_order' => 5]);

        $saltSub7 = Category::create([
            'name' => 'Kontaktörler',
            'parent_id' => $salt->id,
            'sort_order' => 7,
        ]);
        Product::create(['category_id' => $saltSub7->id, 'code' => 'MTMA10-3009', 'pole' => '3P', 'description' => '9A 4kW KONTAKTÖR       CONTACTOR         (1NO) 230V AC', 'sort_order' => 1]);
        Product::create(['category_id' => $saltSub7->id, 'code' => 'MTMA01-3009', 'pole' => '3P', 'description' => '9A 4kW KONTAKTÖR       CONTACTOR         (1NC) 230V AC', 'sort_order' => 2]);
        Product::create(['category_id' => $saltSub7->id, 'code' => 'MTMA10-3012', 'pole' => '3P', 'description' => '12A 5,5kW KONTAKTÖR    CONTACTOR         (1NO) 230V AC', 'sort_order' => 3]);
        Product::create(['category_id' => $saltSub7->id, 'code' => 'MTMA01-3012', 'pole' => '3P', 'description' => '12A 5,5kW KONTAKTÖR    CONTACTOR         (1NC) 230V AC', 'sort_order' => 4]);
        Product::create(['category_id' => $saltSub7->id, 'code' => 'MTMA10-3018', 'pole' => '3P', 'description' => '18A 7,5kW KONTAKTÖR    CONTACTOR         (1NO) 230V AC', 'sort_order' => 5]);
        Product::create(['category_id' => $saltSub7->id, 'code' => 'MTMA01-3018', 'pole' => '3P', 'description' => '18A 7,5kW KONTAKTÖR    CONTACTOR         (1NC) 230V AC', 'sort_order' => 6]);
        Product::create(['category_id' => $saltSub7->id, 'code' => 'MTMA10-3025', 'pole' => '3P', 'description' => '25A 11kW KONTAKTÖR     CONTACTOR         (1NO) 230V AC', 'sort_order' => 7]);
        Product::create(['category_id' => $saltSub7->id, 'code' => 'MTMA01-3025', 'pole' => '3P', 'description' => '25A 11kW KONTAKTÖR     CONTACTOR         (1NC) 230V AC', 'sort_order' => 8]);
        Product::create(['category_id' => $saltSub7->id, 'code' => 'MTMA10-3032', 'pole' => '3P', 'description' => '32A 15kW KONTAKTÖR     CONTACTOR         (1NO) 230V AC', 'sort_order' => 9]);
        Product::create(['category_id' => $saltSub7->id, 'code' => 'MTMA01-3032', 'pole' => '3P', 'description' => '32A 15kW KONTAKTÖR     CONTACTOR         (1NC) 230V AC', 'sort_order' => 10]);
        Product::create(['category_id' => $saltSub7->id, 'code' => 'MTMK10-3009', 'pole' => '3P', 'description' => '3P 9A 4KW MİNİ KONTAKTÖR           MINI CONTACTORS    (1NO) 230V AC', 'sort_order' => 11]);
        Product::create(['category_id' => $saltSub7->id, 'code' => 'MTMK10-3012', 'pole' => '3P', 'description' => '3P 12A 5,5KW MİNİ KONTAKTÖR        MINI CONTACTORS    (1NO) 230V AC', 'sort_order' => 12]);
        Product::create(['category_id' => $saltSub7->id, 'code' => 'MTMK10-3016', 'pole' => '3P', 'description' => '3P 16A 7,5KW MİNİ KONTAKTÖR        MINI CONTACTORS    (1NO) 230V AC', 'sort_order' => 13]);
        Product::create(['category_id' => $saltSub7->id, 'code' => 'MTMK01-3009', 'pole' => '3P', 'description' => 'MINI CONTACTORS    (1NC) 230C AC', 'sort_order' => 14]);
        Product::create(['category_id' => $saltSub7->id, 'code' => 'MTMK01-3012', 'pole' => '3P', 'description' => '3P 12A 5.5KW MİNİ KONTAKTÖR        MINI CONTACTORS', 'sort_order' => 15]);
        Product::create(['category_id' => $saltSub7->id, 'code' => 'MTMK01-3016', 'pole' => '3P', 'description' => '3P 16A 7.5KW MİNİ KONTAKTÖR        MINI CONTACTORS', 'sort_order' => 16]);
        Product::create(['category_id' => $saltSub7->id, 'code' => 'MTMK10-3009DC24', 'pole' => '3P', 'description' => 'MINI CONTACTORS    (1NO) 24V DC', 'sort_order' => 17]);
        Product::create(['category_id' => $saltSub7->id, 'code' => 'MTMK10-3012DC24', 'pole' => '3P', 'description' => '3P 12A 5.5KW MİNİ KONTAKTÖR        MINI CONTACTORS', 'sort_order' => 18]);
        Product::create(['category_id' => $saltSub7->id, 'code' => 'MTMK10-3016DC24', 'pole' => '3P', 'description' => '3P 16A 7.5KW MİNİ KONTAKTÖR        MINI CONTACTORS', 'sort_order' => 19]);
        Product::create(['category_id' => $saltSub7->id, 'code' => 'MTMK01-3009DC24', 'pole' => '3P', 'description' => 'MINI CONTACTORS    (1NC) 24V DC', 'sort_order' => 20]);
        Product::create(['category_id' => $saltSub7->id, 'code' => 'MTMK01-3012DC24', 'pole' => '3P', 'description' => '3P 12A 5.5KW MİNİ KONTAKTÖR        MINI CONTACTORS', 'sort_order' => 21]);
        Product::create(['category_id' => $saltSub7->id, 'code' => 'MTMK01-3016DC24', 'pole' => '3P', 'description' => '3P 16A 7.5KW MİNİ KONTAKTÖR        MINI CONTACTORS', 'sort_order' => 22]);
        Product::create(['category_id' => $saltSub7->id, 'code' => 'MTMAC1-318', 'pole' => '3P', 'description' => '18A 7,5KVAR', 'sort_order' => 23]);
        Product::create(['category_id' => $saltSub7->id, 'code' => 'MTMAC1-325', 'pole' => '3P', 'description' => '25A 12KVAR', 'sort_order' => 24]);
        Product::create(['category_id' => $saltSub7->id, 'code' => 'MTMAC1-332', 'pole' => '3P', 'description' => '32A 18KVAR', 'sort_order' => 25]);
        Product::create(['category_id' => $saltSub7->id, 'code' => 'MTMAC1-343', 'pole' => '3P', 'description' => '43A 20KVAR', 'sort_order' => 26]);
        Product::create(['category_id' => $saltSub7->id, 'code' => 'MTMAC1-350', 'pole' => '3P', 'description' => '50A 25KVAR', 'sort_order' => 27]);
        Product::create(['category_id' => $saltSub7->id, 'code' => 'MTMAC1-365', 'pole' => '3P', 'description' => '65A 30KVAR', 'sort_order' => 28]);
        Product::create(['category_id' => $saltSub7->id, 'code' => 'MTMAC1-380', 'pole' => '3P', 'description' => '80A 40KVAR', 'sort_order' => 29]);
        Product::create(['category_id' => $saltSub7->id, 'code' => 'MTMAC1-395', 'pole' => '3P', 'description' => '95A 50KVAR', 'sort_order' => 30]);

        $saltSub8 = Category::create([
            'name' => 'Termik Röleler',
            'parent_id' => $salt->id,
            'sort_order' => 8,
        ]);
        Product::create(['category_id' => $saltSub8->id, 'code' => 'MTTR1-M1301', 'pole' => '3P', 'description' => '0.1~0.16A TERMİK RÖLE THERMAL RELAYS', 'sort_order' => 1]);
        Product::create(['category_id' => $saltSub8->id, 'code' => 'MTTR1-M1302', 'pole' => '3P', 'description' => '0.16~0.25A TERMİK RÖLE THERMAL RELAYS', 'sort_order' => 2]);
        Product::create(['category_id' => $saltSub8->id, 'code' => 'MTTR1-M1303', 'pole' => '3P', 'description' => '0.25~0.4A TERMİK RÖLE THERMAL RELAYS', 'sort_order' => 3]);
        Product::create(['category_id' => $saltSub8->id, 'code' => 'MTTR1-M1304', 'pole' => '3P', 'description' => '0.4~0.63A TERMİK RÖLE THERMAL RELAYS', 'sort_order' => 4]);
        Product::create(['category_id' => $saltSub8->id, 'code' => 'MTTR1-M1305', 'pole' => '3P', 'description' => '0.63~1A TERMİK RÖLE THERMAL RELAYS', 'sort_order' => 5]);
        Product::create(['category_id' => $saltSub8->id, 'code' => 'MTTR1-M1306', 'pole' => '3P', 'description' => '1~1.6A TERMİK RÖLE THERMAL RELAYS', 'sort_order' => 6]);
        Product::create(['category_id' => $saltSub8->id, 'code' => 'MTTR1-M1307', 'pole' => '3P', 'description' => '1.6~2.5A TERMİK RÖLE THERMAL RELAYS', 'sort_order' => 7]);
        Product::create(['category_id' => $saltSub8->id, 'code' => 'MTTR1-M1308', 'pole' => '3P', 'description' => '2.5~4A TERMİK RÖLE THERMAL RELAYS', 'sort_order' => 8]);
        Product::create(['category_id' => $saltSub8->id, 'code' => 'MTTR1-M1310', 'pole' => '3P', 'description' => '4~6A TERMİK RÖLE THERMAL RELAYS', 'sort_order' => 9]);
        Product::create(['category_id' => $saltSub8->id, 'code' => 'MTTR1-M1312', 'pole' => '3P', 'description' => '5.5~8A TERMİK RÖLE THERMAL RELAYS', 'sort_order' => 10]);
        Product::create(['category_id' => $saltSub8->id, 'code' => 'MTTR1-M1314', 'pole' => '3P', 'description' => '7~10A TERMİK RÖLE THERMAL RELAYS', 'sort_order' => 11]);
        Product::create(['category_id' => $saltSub8->id, 'code' => 'MTTR1-M1316', 'pole' => '3P', 'description' => '9~13A TERMİK RÖLE THERMAL RELAYS', 'sort_order' => 12]);
        Product::create(['category_id' => $saltSub8->id, 'code' => 'MTTR1-M1321', 'pole' => '3P', 'description' => '12~18A TERMİK RÖLE THERMAL RELAYS', 'sort_order' => 13]);
        Product::create(['category_id' => $saltSub8->id, 'code' => 'MTTR1-M1322', 'pole' => '3P', 'description' => '17~25A TERMİK RÖLE THERMAL RELAYS', 'sort_order' => 14]);
        Product::create(['category_id' => $saltSub8->id, 'code' => 'MTTR2-M2353', 'pole' => '3P', 'description' => '23~32A TERMİK RÖLE THERMAL RELAYS', 'sort_order' => 15]);
        Product::create(['category_id' => $saltSub8->id, 'code' => 'MTTR2-M2355', 'pole' => '3P', 'description' => '30~40A TERMİK RÖLE THERMAL RELAYS', 'sort_order' => 16]);
        Product::create(['category_id' => $saltSub8->id, 'code' => 'MTTR3-M3322', 'pole' => '3P', 'description' => '17~25A TERMİK RÖLE (BÜYÜK) THERMAL RELAYS (BIG)', 'sort_order' => 17]);
        Product::create(['category_id' => $saltSub8->id, 'code' => 'MTTR3-M3353', 'pole' => '3P', 'description' => '23~32A TERMİK RÖLE (BÜYÜK) THERMAL RELAYS (BIG)', 'sort_order' => 18]);
        Product::create(['category_id' => $saltSub8->id, 'code' => 'MTTR3-M3355', 'pole' => '3P', 'description' => '30~40A TERMİK RÖLE (BÜYÜK) THERMAL RELAYS (BIG)', 'sort_order' => 19]);
        Product::create(['category_id' => $saltSub8->id, 'code' => 'MTTR3-M3357', 'pole' => '3P', 'description' => '37~50A TERMİK RÖLE THERMAL RELAYS', 'sort_order' => 20]);
        Product::create(['category_id' => $saltSub8->id, 'code' => 'MTTR3-M3359', 'pole' => '3P', 'description' => '48~65A TERMİK RÖLE THERMAL RELAYS', 'sort_order' => 21]);
        Product::create(['category_id' => $saltSub8->id, 'code' => 'MTTR3-M3361', 'pole' => '3P', 'description' => '55~70A TERMİK RÖLE THERMAL RELAYS', 'sort_order' => 22]);
        Product::create(['category_id' => $saltSub8->id, 'code' => 'MTTR3-M3363', 'pole' => '3P', 'description' => '63~80A TERMİK RÖLE THERMAL RELAYS', 'sort_order' => 23]);
        Product::create(['category_id' => $saltSub8->id, 'code' => 'MTTR3-M3365', 'pole' => '3P', 'description' => '80~93A TERMİK RÖLE THERMAL RELAYS', 'sort_order' => 24]);

        $saltSub9 = Category::create([
            'name' => 'Motor Koruma Şalterleri',
            'parent_id' => $salt->id,
            'sort_order' => 9,
        ]);
        Product::create(['category_id' => $saltSub9->id, 'code' => 'MTPS0-250016', 'pole' => '3P', 'description' => '0,1-0,16A MOTOR KORUMA ŞALTERİ MOTOR PROTECTION SWITCHES', 'sort_order' => 1]);
        Product::create(['category_id' => $saltSub9->id, 'code' => 'MTPS0-250025', 'pole' => '3P', 'description' => '0,16-0,25A MOTOR KORUMA ŞALTERİ MOTOR PROTECTION SWITCHES', 'sort_order' => 2]);
        Product::create(['category_id' => $saltSub9->id, 'code' => 'MTPS0-250040', 'pole' => '3P', 'description' => '0,25-0,4A MOTOR KORUMA ŞALTERİ MOTOR PROTECTION SWITCHES', 'sort_order' => 3]);
        Product::create(['category_id' => $saltSub9->id, 'code' => 'MTPS0-250063', 'pole' => '3P', 'description' => '0,40-0,63A MOTOR KORUMA ŞALTERİ MOTOR PROTECTION SWITCHES', 'sort_order' => 4]);
        Product::create(['category_id' => $saltSub9->id, 'code' => 'MTPS0-250100', 'pole' => '3P', 'description' => '0,63-1A MOTOR KORUMA ŞALTERİ MOTOR PROTECTION SWITCHES', 'sort_order' => 5]);
        Product::create(['category_id' => $saltSub9->id, 'code' => 'MTPS0-250160', 'pole' => '3P', 'description' => '1-1,6A MOTOR KORUMA ŞALTERİ MOTOR PROTECTION SWITCHES', 'sort_order' => 6]);
        Product::create(['category_id' => $saltSub9->id, 'code' => 'MTPS0-250250', 'pole' => '3P', 'description' => '1,6-2,5A MOTOR KORUMA ŞALTERİ MOTOR PROTECTION SWITCHES', 'sort_order' => 7]);
        Product::create(['category_id' => $saltSub9->id, 'code' => 'MTPS0-250400', 'pole' => '3P', 'description' => '2,5-4A MOTOR KORUMA ŞALTERİ MOTOR PROTECTION SWITCHES', 'sort_order' => 8]);
        Product::create(['category_id' => $saltSub9->id, 'code' => 'MTPS0-250630', 'pole' => '3P', 'description' => '4-6,3A MOTOR KORUMA ŞALTERİ MOTOR PROTECTION SWITCHES', 'sort_order' => 9]);
        Product::create(['category_id' => $saltSub9->id, 'code' => 'MTPS0-251000', 'pole' => '3P', 'description' => '6-10A MOTOR KORUMA ŞALTERİ MOTOR PROTECTION SWITCHES', 'sort_order' => 10]);
        Product::create(['category_id' => $saltSub9->id, 'code' => 'MTPS0-251400', 'pole' => '3P', 'description' => '9-14A MOTOR KORUMA ŞALTERİ MOTOR PROTECTION SWITCHES', 'sort_order' => 11]);
        Product::create(['category_id' => $saltSub9->id, 'code' => 'MTPS0-251800', 'pole' => '3P', 'description' => '13-18A MOTOR KORUMA ŞALTERİ MOTOR PROTECTION SWITCHES', 'sort_order' => 12]);
        Product::create(['category_id' => $saltSub9->id, 'code' => 'MTPS0-252300', 'pole' => '3P', 'description' => '17-23A MOTOR KORUMA ŞALTERİ MOTOR PROTECTION SWITCHES', 'sort_order' => 13]);
        Product::create(['category_id' => $saltSub9->id, 'code' => 'MTPS0-252500', 'pole' => '3P', 'description' => '20-25A MOTOR KORUMA ŞALTERİ MOTOR PROTECTION SWITCHES', 'sort_order' => 14]);
        Product::create(['category_id' => $saltSub9->id, 'code' => 'MTPS0-253200', 'pole' => '3P', 'description' => '24-32A MOTOR KORUMA ŞALTERİ MOTOR PROTECTION SWITCHES', 'sort_order' => 15]);
        Product::create(['category_id' => $saltSub9->id, 'code' => 'MTPS1-804000', 'pole' => '3P', 'description' => '25-40A MOTOR KORUMA ŞALTERİ MOTOR PROTECTION SWITCHES', 'sort_order' => 16]);
        Product::create(['category_id' => $saltSub9->id, 'code' => 'MTPS1-805000', 'pole' => '3P', 'description' => '36-50A MOTOR KORUMA ŞALTERİ MOTOR PROTECTION SWITCHES', 'sort_order' => 17]);
        Product::create(['category_id' => $saltSub9->id, 'code' => 'MTPS1-806300', 'pole' => '3P', 'description' => '40-63A MOTOR KORUMA ŞALTERİ MOTOR PROTECTION SWITCHES', 'sort_order' => 18]);
        Product::create(['category_id' => $saltSub9->id, 'code' => 'MTPS1-808000', 'pole' => '3P', 'description' => '56-80A MOTOR KORUMA ŞALTERİ MOTOR PROTECTION SWITCHES', 'sort_order' => 19]);
        Product::create(['category_id' => $saltSub9->id, 'code' => 'MTPS0-F11', 'pole' => '1NO', 'description' => '+ 1NC YARDIMCI KONTAK - ÖNDEN MONTELİ AUXILIARY CONTACT - FRONT MOUNTED', 'sort_order' => 20]);
        Product::create(['category_id' => $saltSub9->id, 'code' => 'MTPS0-F20', 'pole' => '2NO', 'description' => 'YARDIMCI KONTAK- ÖNDEN MONTELİ AUXILIARY CONTACT - FRONT MOUNTED', 'sort_order' => 21]);
        Product::create(['category_id' => $saltSub9->id, 'code' => 'MTPS0-L11', 'pole' => 'MTMP-25', 'description' => '1NO + 1NC YARDIMCI KONTAK - YANDAN MONTELİ AUXILIARY CONTACT - SIDE MOUNTED', 'sort_order' => 22]);
        Product::create(['category_id' => $saltSub9->id, 'code' => 'MTPS0-L20', 'pole' => 'MTMP-25', 'description' => '2NO YARDIMCI KONTAK- YANDAN MONTELİ AUXILIARY CONTACT - SIDE MOUNTED', 'sort_order' => 23]);
        Product::create(['category_id' => $saltSub9->id, 'code' => 'MTPS1-L11', 'pole' => 'MTMP-80', 'description' => '1NO + 1NC YARDIMCI KONTAK - YANDAN MONTELİ AUXILIARY CONTACT - SIDE MOUNTED', 'sort_order' => 24]);
        Product::create(['category_id' => $saltSub9->id, 'code' => 'MTPS1-L20', 'pole' => 'MTMP-80', 'description' => '2NO YARDIMCI KONTAK - YANDAN MONTELİ AUXILIARY CONTACT - SIDE MOUNTED', 'sort_order' => 25]);
        Product::create(['category_id' => $saltSub9->id, 'code' => 'MTPS0-AB', 'pole' => '230V', 'description' => 'ŞANT AÇTIRMA BOBİNİ', 'sort_order' => 26]);
        Product::create(['category_id' => $saltSub9->id, 'code' => 'MTPS0-DG', 'pole' => '400V', 'description' => 'DÜŞÜK GERİLİM AÇTIRMA BOBİNİ', 'sort_order' => 27]);
        Product::create(['category_id' => $saltSub9->id, 'code' => 'MTPS0-IP55K', 'pole' => 'IP', 'description' => '55 KUTU - MOTOR KORUMA ŞALTERİ', 'sort_order' => 28]);

        // ================= ANAHTAR, PRİZ VE GRUP PRİZLER =================
        $anahtarPriz = Category::create([
            'name' => 'Anahtar, Priz ve Grup Prizler',
            'slug' => 'anahtar-priz-ve-grup-prizler',
            'description' => 'Rita, Elitra Plus, Candela, Daria ve Bron serileriyle her mekana uygun estetik ve fonksiyonel çözümler.',
            'sort_order' => 2,
        ]);

        $rita = Category::create([
            'name' => 'Rita Serisi',
            'parent_id' => $anahtarPriz->id,
            'sort_order' => 1,
        ]);
        Product::create(['category_id' => $rita->id, 'code' => '2200 401 0280', 'description' => 'Rita Mek+Tuş Anahtar (Vidalı)', 'image' => 'https://www.mutlusan.com.tr/images/product/thumbs/edfa346f-be7.jpg', 'sort_order' => 1]);
        Product::create(['category_id' => $rita->id, 'code' => '2200 402 0280', 'description' => 'Rita Mek+Tuş Komütatör (Vidalı)', 'image' => 'https://www.mutlusan.com.tr/images/product/thumbs/1eb5b814-ca6.jpg', 'sort_order' => 2]);
        Product::create(['category_id' => $rita->id, 'code' => '2200 403 0280', 'description' => 'Rita Mek+Tuş Vavien (İki Yollu) (Vidalı)', 'image' => 'https://www.mutlusan.com.tr/images/product/thumbs/e049ffa3-809.jpg', 'sort_order' => 3]);
        Product::create(['category_id' => $rita->id, 'code' => '2200 404 0280', 'description' => 'Rita Mek+Tuş Komütatör Vavien (Vidalı)', 'image' => 'https://www.mutlusan.com.tr/images/product/thumbs/5bdc6092-415.jpg', 'sort_order' => 4]);
        Product::create(['category_id' => $rita->id, 'code' => '2200 405 0280', 'description' => 'Rita Mek+Tuş Çift Kutuplu Anahtar (Vidalı)', 'image' => 'https://www.mutlusan.com.tr/images/product/thumbs/936658ff-55a.jpg', 'sort_order' => 5]);
        Product::create(['category_id' => $rita->id, 'code' => '2200 406 0280', 'description' => 'Rita Mek+Tuş Jaluzi Anahtarı (Vidalı)', 'image' => 'https://www.mutlusan.com.tr/images/product/thumbs/ebfa0fd2-0d7.jpg', 'sort_order' => 6]);
        Product::create(['category_id' => $rita->id, 'code' => '2200 407 0280', 'description' => 'Rita Mek+Tuş Çağırma (Vidalı)', 'image' => 'https://www.mutlusan.com.tr/images/product/thumbs/e4bd814d-21d.jpg', 'sort_order' => 7]);
        Product::create(['category_id' => $rita->id, 'code' => '2200 407 0280K', 'description' => 'Rita Mek+Tuş Kapı Otomatiği Anahtarı (Vidalı)', 'image' => 'https://www.mutlusan.com.tr/images/product/thumbs/858ed52b-90e.jpg', 'sort_order' => 8]);
        Product::create(['category_id' => $rita->id, 'code' => '2200 407 0280Z', 'description' => 'Rita Mek+Tuş Zil Anahtarı (Vidalı)', 'image' => 'https://www.mutlusan.com.tr/images/product/thumbs/c5977bb6-82e.jpg', 'sort_order' => 9]);
        Product::create(['category_id' => $rita->id, 'code' => '2200 408 0280', 'description' => 'Rita Mek+Tuş Deviatör (Ara Vavien) (Vidalı)', 'image' => 'https://www.mutlusan.com.tr/images/product/thumbs/e6783947-049.jpg', 'sort_order' => 10]);
        Product::create(['category_id' => $rita->id, 'code' => '2200 409 0280', 'description' => 'Rita Mek+Tuş Üçlü Anahtar (Vidalı)', 'image' => 'https://www.mutlusan.com.tr/images/product/thumbs/88488cb4-42f.jpg', 'sort_order' => 11]);
        Product::create(['category_id' => $rita->id, 'code' => '2200 411 0280', 'description' => 'Rita Mek+Tuş Şofben Anahtarı (Vidalı)', 'image' => 'https://www.mutlusan.com.tr/images/product/thumbs/200b2240-34d.jpg', 'sort_order' => 12]);
    }
}
