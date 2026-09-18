<?php

namespace App\Http\Controllers;

use App\Models\Category;

class PageController extends Controller
{
    public function hakkimizda()
    {
        return view('hakkimizda');
    }

    public function urunler()
    {
        return view('urunler');
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
