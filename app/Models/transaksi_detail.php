<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi_detail extends Model
{
    use HasFactory;
    protected $table = 'transaksi_detail';
    protected $fillable = [
        'petugas_id',
        'total',
    ];

}
