<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penghuni extends Model
{
    use HasFactory;

    protected $table = 'penghuni_kost';

    protected $fillable = [
        'id_kamar',
        'tanggal_pesan',
        'tanggal_masuk',
        'tanggal_keluar',
        'status',
    ];
    public function kamar()
    {
        return $this->belongsTo(Kamar::class, 'id_kamar');
    }
    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'id_penghuni');
    }
}
