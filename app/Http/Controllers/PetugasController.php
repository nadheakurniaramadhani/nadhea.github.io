<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function index(){
        $data= User::where('role', 'petugas')->with('petugas')->get();
        return view('petugas.index', compact('data'));
    }

    public function create(){
        return view ('petugas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required'
        ], [
            'nama.required' => 'Nama wajib diisi',
            'email.required' => 'Nama wajib diisi',
            'password.required' => 'Jenis Kelamin wajib diisi',
        ]);
        User::create([
            'name'=> $request->input('nama'),
            'email'=> $request->input('email'),
            'password'=> Hash::make($request->input('password')),
            'role'=> 'petugas',
        ]);
        return redirect()->route('data.petugas');
    }

    public function edit($id)
    {
        $petugas = Petugas::findOrFail($id);
        return view('petugas.edit', compact('petugas'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required'
        ], [
            'nama.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Jenis Kelamin wajib diisi'
        ]);

        $petugas = Petugas::findOrFail($id);
        $petugas->update($request->all());

        return redirect()->route('data.petugas');
    }

    public function destroy($id){
        $data = Petugas::findOrFail($id);
        $data->delete();

        return redirect()->route('data.petugas')->with('success', 'Data konsumen berhasil dihapus.');
    }
}
