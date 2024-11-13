<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    
    protected $table = 'barang';

    protected $fillable = [
        'kode_produk',
        'nama_produk',
        'stok',
        'harga_jual',
    ];

    // app/Models/Barang.php

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }

}
