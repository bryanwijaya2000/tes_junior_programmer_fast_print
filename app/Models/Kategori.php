<?php
// Model yang mereferensi ke Tabel kategori pada database

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Class Model Kategori
class Kategori extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'kategori';

    // Primary Key tabel
    protected $primaryKey = 'id_kategori';

    public $timestamps = false;
    protected $guarded = [];

    // Function untuk membuat relasi one-to-many ke tabel produk pada database dengan
    // menghubungkan foreign key kategori_id pada tabel produk dan primary key
    // id_kategori pada tabel kategori
    function produkKategori() {
        return $this->hasMany(Produk::class, "kategori_id", "id_kategori");
    }
}
