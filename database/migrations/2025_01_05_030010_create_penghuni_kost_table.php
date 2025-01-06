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
        Schema::create('penghuni_kost', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kamar')->constrained('kamar')->onDelete('cascade');
            $table->date('tanggal_pesan');
            $table->date('tanggal_masuk');
            $table->date('tanggal_keluar')->nullable();
            $table->enum('status', ['Aktif', 'Keluar'])->default('Aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penghuni_kost');
    }
};
