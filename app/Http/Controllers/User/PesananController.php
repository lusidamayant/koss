<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kamar;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesanans = Pesanan::where('customer_id', auth()->id())->get();

        return view('user.pesanan.index', compact('pesanans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($pesanan)
    {
        $pesanan = Pesanan::find($pesanan)->load('pembayaran');
        // dd($pesanan);
        $kamar = Kamar::find($pesanan->id_kamar);
        
        return view('user.pesanan.show', compact('pesanan', 'kamar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pesanan $pesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pesanan $pesanan)
    {
        //
    }
}
