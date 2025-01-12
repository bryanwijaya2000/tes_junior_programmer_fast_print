<?php
// Controller untuk menampilkan halaman

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Status;

// Class Controller ViewController
class ViewController extends Controller
{
    // Function untuk menampilkan halaman awal (Daftar Produk)
    public function viewIndex() {
        // Mendapatkan data daftar produk dari database dengan melakukan join tabel
        // kategori dan produk pada database pertama-tama dengan syarat primary key
        // id_kategori pada tabel kategori harus sama dengan foreign key kategori_id
        // pada tabel produk dan selanjutnya join dengan tabel status dengan syarat
        // foreign key status_id pada tabel produk harus sama dengan primary key
        // id_status pada tabel status dan setelah itu memfilter hanya produk
        // yang memiliki nama_status sama dengan 'bisa dijual' dan mengurutkannya
        // berdasarkan id_produk dari nilai terkecil ke nilai terbesar dan memilih
        // hanya kolom-kolom id_produk, nama_produk, harga, dan nama_kategori
        $daftar_produk = Kategori::join('produk', 'id_kategori', 'kategori_id')
                                   ->join('status', 'status_id', 'id_status')
                                   ->where('nama_status', 'bisa dijual')
                                   ->orderBy('id_produk')
                                   ->get(['id_produk', 'nama_produk', 'harga', 'nama_kategori']);

        // Menampilkan halaman awal (Daftar Produk) dengan data daftar produk yang telah
        // didapatkan
        return view('index', ['daftar_produk' => $daftar_produk]);
    }

    // Function untuk menampilkan halaman tambah produk
    public function viewTambahProduk() {
        // Mendapatkan data semua kategori
        $daftar_kategori = Kategori::all();

        // Mendapatkan data semua status
        $daftar_status = Status::all();

        // Menampilkan halaman tambah produk dengan data daftar kategori dan data daftar
        // status yang telah didapatkan
        return view('tambah_produk', ['daftar_kategori' => $daftar_kategori, 'daftar_status' => $daftar_status]);
    }

    // Function untuk menampilkan halaman edit produk berdasarkan ID produk
    public function viewEditProduk($id_produk) {
        // Mendapatkan data semua kategori
        $daftar_kategori = Kategori::all();

        // Mendapatkan data semua status
        $daftar_status = Status::all();

        // Mendapatkan data produk yang sedang diubah berdasarkan ID produk
        $produk = Produk::find($id_produk);

        // Menampilkan halaman edit produk dengan data produk yang sedang diubah, data
        // daftar kategori dan data daftar status yang telah didapatkan
        return view('edit_produk', ['produk' => $produk, 'daftar_kategori' => $daftar_kategori, 'daftar_status' => $daftar_status]);
    }
}
