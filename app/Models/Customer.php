<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable;

    // Tentukan kolom yang boleh diisi mass-assignment
    protected $fillable = [
        'name',  // Nama customer
        'email',          // Email customer
        'password'
    ];

    protected $hidden = [
        'password'
    ];

    // Relasi dengan tabel pesanan
    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'customer_id');
    }
}
