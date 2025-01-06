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
    Schema::create('pesanans', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('customer_id');  // Mengacu pada customer
        $table->string('nomor_pesanan');
        $table->string('nama_penghuni');  // Nama penghuni
        $table->enum('gender', ['Laki-Laki', 'Perempuan']);  // Gender penghuni
        $table->string('email');  // Email penghuni (harus unik)
        $table->string('kontak', 15);  // Kontak penghuni, maksimal 15 karakter
        $table->text('alamat');  // Alamat penghuni
        $table->foreignId('id_kamar')->constrained('kamar')->onDelete('cascade');  // Mengacu pada tabel kamar
        $table->decimal('harga_sewa', 10, 2)->nullable();  // Harga sewa kamar (nullable)
        $table->enum('status', ['Pending', 'Diterima', 'Ditolak'])->default('Pending');  // Status pesanan
        $table->timestamps();  // Kolom created_at dan updated_at
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
