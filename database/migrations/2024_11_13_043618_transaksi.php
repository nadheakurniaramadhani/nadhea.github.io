<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksii', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksi_id') -> constrained('transaksi_detail')->onDelete('cascade');
            $table->string('nama_barang');
            $table->integer('jumlah_produk');
            $table->string('metode_bayar');
            $table->integer('total_harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
