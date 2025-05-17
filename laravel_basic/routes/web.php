<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

//Berikut adalah route yang digunakan dalam aplikasi ini

//Untuk halaman utama
Route::get('/ ', [HomeController::class, 'index'])->name('index');


//Untuk halaman produk
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

//Untuk halaman tambah produk
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

//Untuk halaman edit produk
Route::get('/products/edit/{product} ', [ProductController::class, 'edit'])->name('products.edit');


//Untuk menangani request post menambah produk
Route::post('/products ', [ProductController::class, 'store'])->name('products.store');

//Untuk menyimpan produk
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');

//Untuk menghapus produk
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
