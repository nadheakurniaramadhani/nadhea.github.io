<?php

namespace App\Http\Controllers;

use App\Models\Konsumen;
use Illuminate\Http\Request;

class KonsumenController extends Controller
{
    public function index(){
        $data= Konsumen::orderBy('email', 'desc')->paginate(5);
        return view('konsumen.index', compact('data'));
    }

    public function create(){
        return view('konsumen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'jk' => 'required',
            'alamat' => 'required'
        ], [
            'nama.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'jk.required' => 'Jenis Kelamin wajib diisi',
            'alamat.required' => 'Alamat wajib diisi'
        ]);

        Konsumen::create($request->all());
        return redirect()->route('data.konsumen');
    }

    public function edit($id)
    {
        $konsumen = Konsumen::findOrFail($id);
        return view('konsumen.edit', compact('konsumen'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'jk' => 'required',
            'alamat' => 'required'
        ], [
            'nama.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'jk.required' => 'Jenis Kelamin wajib diisi',
            'alamat.required' => 'Alamat wajib diisi'
        ]);

        $konsumen = Konsumen::findOrFail($id);
        $konsumen->update($request->all());

        return redirect()->route('data.konsumen');
    }

    public function destroy($id)
    {
        $data = Konsumen::findOrFail($id);
        $data->delete();

        return redirect()->route('data.konsumen')->with('success', 'Data konsumen berhasil dihapus.');
    }

}