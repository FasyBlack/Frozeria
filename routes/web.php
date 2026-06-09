<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;

Route::get('/', [BarangController::class, 'index'])->name('dashboard');


Route::get('/bantuan', function () {return view('bantuan');})->name('bantuan');



Route::resource('barang', BarangController::class);
Route::resource('kategori', KategoriController::class);