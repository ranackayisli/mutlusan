<?php

namespace App\Http\Controllers;

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
        return view('urunler.anahtar-priz');
    }

    public function saltUrunleri()
    {
        return view('urunler.salt-urunleri');
    }
}
