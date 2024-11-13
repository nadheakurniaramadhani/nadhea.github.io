<?php

namespace App\Http\Controllers;

use App\Models\JenisPembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = JenisPembayaran::orderBy('created_at', 'desc')->paginate(5);
        return view('pembayaran.index', compact('pembayaran'));
    }

    public function create()
    {
        return view('pembayaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pembayaran' => 'required',
            'jenis_pembayaran' => 'required',
        ], [
            'nama_pembayaran.required' => 'Nama wajib diisi',
            'jenis_pembayaran.required' => 'Jenis pembayaran wajib diisi',
        ]);

        JenisPembayaran::create([
            'nama_pembayaran' => $request->input('nama_pembayaran'),
            'jenis_pembayaran' => $request->input('jenis_pembayaran'),
        ]);
    
        return redirect()->route('jenis.pembayaran');
    }

    public function edit($id)
    {
        $pembayaran = JenisPembayaran::findOrFail($id);
        return view('pembayaran.edit', compact('pembayaran'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nama_pembayaran' => 'required',
            'jenis_pembayaran' => 'required',
        ], [
            'nama_pembayaran.required' => 'Nama wajib diisi',
            'jenis_pembayaran.required' => 'Jenis pembayaran wajib diisi',
        ]);

        $pembayaran = JenisPembayaran::findOrFail($id);
        $pembayaran->update($data);

        return redirect()->route('jenis.pembayaran');
    }

    public function destroy($id)
    {
        $pembayaran = JenisPembayaran::findOrFail($id);
        $pembayaran->delete();

        return redirect()->route('jenis.pembayaran')->with('success', 'Data pembayaran berhasil dihapus.');
    }
}
