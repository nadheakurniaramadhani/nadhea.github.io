<?php

namespace App\Http\Controllers;


use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with('barang')->get();
        return view('transaksi.index', compact('transaksis', ));
    }

    public function create(Request $request, $id)
    {
        $transaksis = Transaksi::with('barang')->get();
        $produk_id = $request->query('id');
        $jumlah_produk = $request->input('jumlah_produk')?? 1;
        $p_detail = Barang::find($produk_id);
        // $produk_detail = Barang::
       

        $barangs = Barang::whereTransaksiId($id)->get();
        return view('transaksi.create', compact('produk_id', 'p_detail', 'barangs', 'transaksis', 'jumlah_produk'));
    }

    public function store(Request $request)
{
    // dd($request->all());
    // Validasi input
    // $request->validate([
    //     'nama_barang' => 'required',
    //     'jumlah_produk' => 'required|integer|min:1',
    //     'stok' => 'required|integer|min:1',
    //     'harga_jual' => 'required',

    // ]);
    $totalharga = $request->harga_jual * $request->jumlah;
   
    // // Ambil barang berdasarkan nama_barang atau id_barang
    // $barang = Barang::where('nama_barang', $request->nama_barang)->first();
    // if (!$barang) {
    //     return redirect()->back()->withErrors(['Barang tidak ditemukan']);
    // }

    // // Hitung total harga
    // $total_harga = $barang->harga_jual * $request->jumlah_produk;

    // // Mengecek stok barang
    // if ($barang->stok < $request->jumlah_produk) {
    //     return redirect()->back()->withErrors(['Stok barang tidak mencukupi']);
    // }

    // // Mengurangi stok barang
    // $barang->stok -= $request->jumlah_produk;
    // $barang->save();

    // Simpan transaksi
    Transaksi::create([
        'nama_barang' => $request->input('nama_barang'),
        'jumlah_produk' => $request->input('jumlah'),
        'metode_bayar' => 'langsung',
        'total_harga' => $totalharga,
        'transaksi_id' => $request->input('transaksi_id'),
    ]);


    // Redirect ke halaman yang sesuai setelah berhasil
    return redirect()->route('transaksi.create')->with('success', 'Transaksi berhasil');
    }
    }
