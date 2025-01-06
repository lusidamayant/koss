<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $pesanans = Pesanan::where('customer_id', auth()->id())->get();
        return view('user.pesanan.index', compact('pesanans'));
    }

    public function show(Pesanan $pesanan)
    {
        return view('user.pesanan.show', compact('pesanan'));
    }
}