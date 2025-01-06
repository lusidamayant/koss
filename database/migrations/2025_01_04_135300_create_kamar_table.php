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
        Schema::create('kamar', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('nama_kamar');
            $table->decimal('panjang', 8, 2); // Panjang kamar dengan 2 desimal
            $table->decimal('lebar', 8, 2);   // Lebar kamar dengan 2 desimal
            $table->decimal('harga', 10, 2); // Harga kamar dengan format desimal
            $table->text('keterangan');      // Keterangan dalam bentuk teks
            $table->integer('kapasitas');    // Kapasitas kamar
            $table->string('foto')->nullable();          // Nama file foto kamar
            $table->enum('status', ['tersedia', 'tidak tersedia'])->default('tersedia'); // Status kamar
            $table->timestamps();            // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamar');
    }
};
