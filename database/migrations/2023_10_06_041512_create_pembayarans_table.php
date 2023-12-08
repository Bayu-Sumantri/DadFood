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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_makanan')->references('id')->on('food');
            $table->foreignId('id_pemesanan')->references('id')->on('pemesanans');
            $table->enum('metode_pembayaran', ['dana', 'bank', 'COD']);
            $table->string('nomor_dana')->nullable();
            $table->string('rekening_bank')->nullable();
            $table->string('alamat_tujuan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};