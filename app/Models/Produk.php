<?php
// Model yang mereferensi ke Tabel produk pada database

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Class Model Produk
class Produk extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'produk';

    // Primary Key tabel
    protected $primaryKey = 'id_produk';

    public $timestamps = false;
    protected $guarded = [];

    // Function untuk membuat relasi many-to-one ke tabel kategori pada database dengan
    // menghubungkan foreign key kategori_id pada tabel produk dan primary key
    // id_kategori pada tabel kategori
    function kategoriProduk() {
        return $this->belongsTo(Kategori::class, "kategori_id", "id_kategori");
    }

    // Function untuk membuat relasi many-to-one ke tabel status pada database dengan
    // menghubungkan foreign key status_id pada tabel produk dan primary key
    // id_status pada tabel status
    function statusProduk() {
        return $this->belongsTo(Status::class, "status_id", "id_status");
    }
}
