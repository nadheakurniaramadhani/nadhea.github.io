<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPembayaran extends Model
{
    use HasFactory;

    protected $table = 'jenis_pembayaran';

    protected $guarded = []; 

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'jenis_pembayaran_id');
    }
}
