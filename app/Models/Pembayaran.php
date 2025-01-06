<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penghuni;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';

    protected $fillable = [
        // 'id_penghuni',
        'id_pesanan',
        'periode',
        'jumlah_bayar',
        'metode_bayar',
        'bukti_bayar',
        'status',
    ];

    public function penghuni()
    {
        return $this->belongsTo(Penghuni::class, 'id_penghuni');
    }

    // Relasi ke model Pesanan
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'id_pesanan');
    }
}
