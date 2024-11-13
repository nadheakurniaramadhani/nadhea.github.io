<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaksi_detail;

class TransaksiDetailController extends Controller
{
    public function create()
    {
        $data=[
        'petugas_id'=> auth()->user()->id,
        'total' => 0
        ];

        $transaksi = transaksi_detail::create($data) ;

        return redirect()->route('transaksi.create', $transaksi->id);
        }
}


