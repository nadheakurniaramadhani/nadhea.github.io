<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(){
        $data = Barang::orderBy('kode_produk', 'desc')->paginate(5);
        return view('barang.index', compact('data'));
    }

    public function create (){
        return view ('barang.create');
    }

    public function store (Request $request){
        $request->validate([
            'kode_produk' => 'required',
            'nama_produk' => 'required',
            'stok' => 'required',
            'harga_jual' => 'required'
        ], [
            'kode_produk.required' => 'Nama wajib diisi',
            'nama_produk.required' => 'Nama produk wajib diisi',
            'stok.required' => 'Stok wajib diisi',
            'harga_jual.required' => 'Harga jual wajib diisi'
        ]);

        Barang::create($request->all());
        return redirect()->route('data.barang');
    }

    public function edit ($id){
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'kode_produk' => 'required',
            'nama_produk' => 'required',
            'stok' => 'required',
            'harga_jual' => 'required'
        ], [
            'kode_produk.required' => 'Kode Produk wajib diisi',
            'nama_produk.required' => 'Nama produk wajib diisi',
            'stok.required' => 'Stok wajib diisi',
            'harga_jual.required' => 'Harga Jual wajib diisi'
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update($request->all());

        return redirect()->route('data.barang');
    }

    public function destroy($id){
        $data = Barang::findOrFail($id);
        $data->delete();

        return redirect()->route('data.barang')->with('success', 'Data konsumen berhasil dihapus.');

    }
}
