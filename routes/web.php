<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/hakkimizda', [PageController::class, 'hakkimizda']);
Route::get('/urunler', [PageController::class, 'urunler']);
Route::get('/urunler/anahtar-priz', [PageController::class, 'anahtarPriz']);
Route::get('/urunler/salt-urunleri', [PageController::class, 'saltUrunleri']);
Route::get('/urunler/salt-grubu', [PageController::class, 'saltUrunleri']);