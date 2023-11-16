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
        Schema::create('menu_promos', function (Blueprint $table) {
            $table->id();
            $table->string('nama_makanan');
            $table->string('gambar_makanan');
            $table->string('deskripsi_lengkap');
            $table->string('deskripsi_singkat');
            $table->string('harga_sebelumnya');
            $table->string('harga_final');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_promos');
    }
};