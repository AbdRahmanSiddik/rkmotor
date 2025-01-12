<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard',[HomeController::class, 'index'])->name('dashboard');

    // bagian kategori
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::post('/kategori', [KategoriController::class,'store'])->name('kategori.store');
    Route::patch('/kategori/{kategori}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

    // bagian barang
    Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
    Route::get('/barang-create', [BarangController::class,'create'])->name('barang.create');
    Route::post('/barang', [BarangController::class,'store'])->name('barang.store');
    Route::get('/barang/{barang}', [BarangController::class,'show'])->name('barang.show');
    Route::get('/barang/{barang}/edit', [BarangController::class, 'edit'])->name('barang.edit');
    Route::patch('/barang/{barang}', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('/barang/{barang}', [BarangController::class, 'destroy'])->name('barang.destroy');

    // api
    Route::get('/barang-api/{key}', [BarangController::class, 'barangAPI'])->name('barang.api');

    // bagian pembayaran / kasir
    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
    Route::post('/pembayaran', [PembayaranController::class, 'store'])->name('pembayaran.store');
    Route::get('/pembayaran/{pembayaran}', [PembayaranController::class, 'show'])->name('pembayaran.show');

    // bagaian data master penjualan
    Route::get('/penjualan', [PembayaranController::class, 'penjualan'])->name('penjualan.index');
    Route::delete('/penjualan/{pembayaran}', [PembayaranController::class, 'destroy'])->name('penjualan.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
