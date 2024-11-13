<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\KonsumenController;
use App\Http\Controllers\TransaksiController;

use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\TransaksiDetailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function() {
    return redirect('/login');
});

Route::middleware(['guest'])->group(function (){
    Route::get('/login', [SesiController::class, 'index'])->name('login');
    Route::post('/login', [SesiController::class, 'login']);
});
Route::get('/home', function () {
    return redirect('/admin');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/petugas', [AdminController::class, 'petugas']);
    Route::get('/dashboard/pimpinan', [AdminController::class, 'pimpinan'])->name('pimpinan');
    Route::get('/logout', [SesiController::class, 'logout'])->name('logout');
    Route::get('/data/konsumen', [KonsumenController::class, 'index'])->name('data.konsumen');
    Route::get('/konsumen/create', [KonsumenController::class, 'create'])->name('konsumen.create');
    Route::post('/konsumen/store', [KonsumenController::class, 'store'])->name('konsumen.store');
    Route::get('/konsumen/edit/{id}', [KonsumenController::class, 'edit'])->name('konsumen.edit');
    Route::put('/konsumen/update/{id}', [KonsumenController::class, 'update'])->name('konsumen.update');
    Route::delete('/konsumen/destroy/{id}', [KonsumenController::class, 'destroy'])->name('konsumen.destroy');
    //petugas
    Route::get('/data/petugas', [PetugasController::class, 'index'])->name('data.petugas');
    Route::get('/petugas/create', [PetugasController::class, 'create'])->name('petugas.create');
    Route::post('/petugas/store', [PetugasController::class, 'store'])->name('petugas.store');
    Route::get('/petugas/edit/{id}', [PetugasController::class, 'edit'])->name('petugas.edit');
    Route::put('/petugas/update/{id}', [PetugasController::class, 'update'])->name('petugas.update');
    Route::delete('/petugas/destroy/{id}', [PetugasController::class, 'destroy'])->name('petugas.destroy');
    //barang
    Route::get('/data/barang', [BarangController::class, 'index'])->name('data.barang');
    Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
    Route::post('/barang/store', [BarangController::class, 'store'])->name('barang.store');
    Route::get('/barang/edit/{id}', [BarangController::class, 'edit'])->name('barang.edit');
    Route::put('/barang/update/{id}', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('/barang/destroy/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');
    //pembayaran
    Route::get('/jenis/pembayaran', [PembayaranController::class, 'index'])->name('jenis.pembayaran');
    Route::get('/jenis/pembayaran/create', [PembayaranController::class, 'create'])->name('jenis.pembayaran.create');
    Route::post('/jenis/pembayaran/store', [PembayaranController::class, 'store'])->name('jenis.pembayaran.store');
    Route::get('/jenis/pembayaran/edit/{id}', [PembayaranController::class,'edit'])->name('jenis.pembayaran.edit');
    Route::put('/jenis/pembayaran/update/{id}', [PembayaranController::class, 'update'])->name('jenis.pembayaran.update');
    Route::delete('/jenis/pembayaran/destroy/{id}', [PembayaranController::class, 'destroy'])->name('jenis.pembayaran.destroy');
    //transaksi
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('/transaksi/{id}/create', [TransaksiController::class, 'create'])->name('transaksi.create');
    Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('transaksi.store');

    Route::get('/transaksi/buat', [TransaksiDetailController::class, 'create'])->name('transaksi.create.admin');

    // Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    // Route::get('/data/konsumen', [KonsumenController::class, 'store'])->name('konsumen.store');

});



