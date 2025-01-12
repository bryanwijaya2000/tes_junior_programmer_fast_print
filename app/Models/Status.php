<?php
// Model yang mereferensi ke Tabel status pada database

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Class Model Status
class Status extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'status';

    // Primary Key tabel
    protected $primaryKey = 'id_status';

    public $timestamps = false;
    protected $guarded = [];

    // Function untuk membuat relasi one-to-many ke tabel produk pada database dengan
    // menghubungkan foreign key status_id pada tabel produk dan primary key
    // id_status pada tabel status
    function produkStatus() {
        return $this->hasMany(Produk::class, "status_id", "id_status");
    }
}
