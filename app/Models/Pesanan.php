<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    // Tentukan kolom yang boleh diisi mass-assignment
    protected $fillable = [
        'customer_id',       // ID customer yang memesan (mengacu pada 'id' di tabel customers)
        'nama_penghuni',     // Nama penghuni
        'gender',            // Gender penghuni
        'email',             // Email penghuni
        'kontak',            // Kontak penghuni
        'alamat',            // Alamat penghuni
        'id_kamar',          // ID kamar yang dipesan (mengacu pada 'id' di tabel kamar)
        'harga_sewa',        // Harga sewa kamar
        'status',            // Status pesanan (Pending, Diterima, Ditolak)
        'nomor_pesanan'
    ];

    // Relasi dengan model Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');  // 'customer_id' mengacu pada kolom 'id' di tabel customers
    }

    // Relasi dengan model Kamar
    public function kamar()
    {
        return $this->belongsTo(Kamar::class, 'id_kamar');  // 'id_kamar' mengacu pada kolom 'id' di tabel kamar
    }

    // Status pesanan, untuk memudahkan dalam pengecekan
    const STATUS_PENDING = 'Pending';
    const STATUS_DITERIMA = 'Diterima';
    const STATUS_DITOLAK = 'Ditolak';

    // Setter untuk harga_sewa, memastikan format yang tepat
    public function setHargaSewaAttribute($value)
    {
        $this->attributes['harga_sewa'] = number_format($value, 2, '.', '');
    }
    // public function pembayaran()
    // {
    //     return $this->hasMany(Pembayaran::class, 'id_pesanan');
    // }
}
