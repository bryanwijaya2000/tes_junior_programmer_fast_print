<?php
// Controller untuk melakukan operasi-operasi CRUD pada produk (Tambah produk,
// Ubah produk, dan Hapus produk)

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

// Class Controller ProdukController
class ProdukController extends Controller
{
    // Function untuk menambahkan produk baru
    public function tambahProduk(Request $request) {
        // Menentukan aturan-aturan validasi
        $validasi = [
            'nama_produk' => 'required|max:255',
            'harga' => 'required|integer|between:1,1000000000',
            'kategori' => 'required',
            'status' => 'required'
        ];

        // Menentukan pesan-pesan validasi yang bersangkutan
        $pesan = [
            'nama_produk.required' => 'Nama produk harus diisi',
            'nama_produk.max' => 'Panjang Nama produk maksimal 255 karakter',
            'harga.required' => 'Harga produk harus diisi',
            'harga.integer' => 'Harga produk harus berupa angka',
            'harga.between' => 'Harga harus diantara 1 sampai 1000000000',
            'kategori.required' => 'Kategori harus diisi',
            'status.required' => 'Status harus diisi'
        ];

        // Melakukan validasi form
        $request->validate($validasi, $pesan);

        // Jika semua inputan valid, maka jalankan yang dibawah ini

        // Menentukan ID produk baru secara dinamis dengan mencari nilai ID produk
        // terbesar yang ada dan mendapatkan angka selanjutnya (menambahkan hasilnya
        // dengan 1)

        // Menginisialisasi ID produk baru dengan nilai yang sangat kecil yang tidak
        // memungkinkan
        $id_maks = -1;

        // Mendapatkan semua produk
        $semua_produk = Produk::all();

        // Loop untuk mendapatkan ID produk terbesar yang ada
        foreach ($semua_produk as $produk) {
            // Mengecek jika ID produk sekarang lebih besar dari ID produk baru sekarang
            if ($produk->id_produk > $id_maks) {
                // Jika ya, maka perbarui ID produk baru dengan nilai ID produk sekarang
                $id_maks = $produk->id_produk;
            }
        }

        // Menambahkan produk baru ke dalam database dengan data yang telah didapatkan
        Produk::create([
            // ID produk baru adalah ID produk terbesar yang ada ditambah dengan 1
            'id_produk' => $id_maks + 1,

            // Data produk lainnya
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'kategori_id' => $request->kategori,
            'status_id' => $request->status
        ]);

        // Membuat Session Flash dengan key 'sukses_tambah' untuk keperluan menampilkan
        // pesan sukses
        session()->flash('sukses_tambah', 'Produk berhasil ditambahkan!');

        // Mengarahkan kembali ke halaman awal (Daftar Produk)
        return redirect('/');
    }

    // Function untuk mengubah suatu produk berdasarkan ID produk
    public function editProduk($id_produk, Request $request) {
        // Menentukan aturan-aturan validasi
        $validasi = [
            'nama_produk' => 'required|max:255',
            'harga' => 'required|integer|between:1,1000000000',
            'kategori' => 'required',
            'status' => 'required'
        ];

        // Menentukan pesan-pesan validasi yang bersangkutan
        $pesan = [
            'nama_produk.required' => 'Nama produk harus diisi',
            'nama_produk.max' => 'Panjang Nama produk maksimal 255 karakter',
            'harga.required' => 'Harga produk harus diisi',
            'harga.integer' => 'Harga produk harus berupa angka',
            'harga.between' => 'Harga harus diantara 1 sampai 1000000000',
            'kategori.required' => 'Kategori harus diisi',
            'status.required' => 'Status harus diisi'
        ];

        // Melakukan validasi form
        $request->validate($validasi, $pesan);

        // Mengubah produk sesuai dengan data yang telah didapatkan

        // Mendapatkan produk yang sedang diubah berdasarkan ID produk
        $produk_yg_di_edit = Produk::find($id_produk);

        // Mengubah data produk sesuai dengan data yang telah didapatkan
        $produk_yg_di_edit->nama_produk = $request->nama_produk;
        $produk_yg_di_edit->harga = $request->harga;
        $produk_yg_di_edit->kategori_id = $request->kategori;
        $produk_yg_di_edit->status_id = $request->status;

        // Menyimpan hasil perubahan ke dalam database
        $produk_yg_di_edit->save();

        // Membuat Session Flash dengan key 'sukses_edit untuk keperluan menampilkan
        // pesan sukses
        session()->flash('sukses_edit', 'Produk berhasil di-edit!');

        // Mengarahkan kembali ke halaman awal (Daftar Produk)
        return redirect('/');
    }

    // Function untuk menghapus suatu produk berdasarkan ID produk
    public function hapusProduk($id_produk) {
        // Menghapus produk dengan ID id_produk
        Produk::destroy($id_produk);

        // Mengarahkan kembali ke halaman awal (Daftar Produk)
        return redirect('/');
    }
}
