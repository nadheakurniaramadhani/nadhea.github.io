<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksii';
    protected $fillable = [
        'transaksi_id',
        'nama_barang',
        'jumlah_produk',
        'metode_bayar',
        'total_harga',
    ];

    public function barangs()
    {
        return $this->hasMany(Barang::class);
    }
}
