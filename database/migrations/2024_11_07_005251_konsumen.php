<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Periksa apakah tabel 'konsumen' sudah ada
        if (!Schema::hasTable('konsumen')) {
            Schema::create('konsumen', function (Blueprint $table) {
                $table->id();
                $table->string('nama');
                $table->string('email')->unique();
                $table->string('jk'); 
                $table->string('alamat');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus tabel 'konsumen' jika rollback dilakukan
        Schema::dropIfExists('konsumen');
    }
};
