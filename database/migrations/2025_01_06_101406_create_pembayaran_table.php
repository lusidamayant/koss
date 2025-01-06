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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_penghuni'); // ID penghuni (tanpa foreign key)
            $table->unsignedBigInteger('id_pesanan'); // ID pesanan (tanpa foreign key)
            $table->string('periode');
            $table->integer('jumlah_bayar');
            $table->enum('metode_bayar', ['Transfer', 'Tunai']);
            $table->string('bukti_bayar')->nullable();
            $table->enum('status', ['Lunas', 'Belum Lunas'])->default('Belum Lunas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
