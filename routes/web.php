<?php
// Route-route yang dibutuhkan

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\ProdukController;

// Route untuk menampilkan halaman awal (Daftar Produk)
Route::get('/', [ViewController::class, 'viewIndex']);

// Route untuk menampilkan halaman Tambah Produk
Route::get('/tambah_produk', [ViewController::class, 'viewTambahProduk']);

// Route untuk menampilkan halaman Edit Produk dengan parameter id_produk adalah
// ID Produk yang akan diubah
Route::get('/edit_produk/{id_produk}', [ViewController::class, 'viewEditProduk']);

// Route untuk menambahkan produk baru
Route::post('/tambahProduk', [ProdukController::class, 'tambahProduk']);

// Route untuk mengubah suatu produk dengan ID id_produk
Route::post('/editProduk/{id_produk}', [ProdukController::class, 'editProduk']);

// Route untuk menghapus suatu produk dengan ID id_produk
Route::get('/hapusProduk/{id_produk}', [ProdukController::class, 'hapusProduk']);
