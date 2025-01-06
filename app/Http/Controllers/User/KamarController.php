<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kamar;
use App\Models\Pembayaran;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kamar = Kamar::all();

        return view('user.kamar.index', compact('kamar'));
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
    public function show(Kamar $kamar)
    {
        $kamarLain = Kamar::all();
        return view('user.kamar.show', compact('kamar', 'kamarLain'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kamar $kamar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kamar $kamar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kamar $kamar)
    {
        //
    }

    public function pesan(Request $request, Kamar $kamar)
    {
        return view('user.kamar.pesan', compact('kamar'));
    }

    public function buatPesanan(Request $request)
{
    $fields = $request->validate([
        'nama' => 'required|string',
        'email' => 'required|email',
        'noTelp' => 'required',
        'alamat' => 'required|string',
        'pembayaran' => 'required|in:Transfer,Tunai',
        'id_kamar' => 'required'
    ]);

    // Mengurangi kapasitas kamar yang dipesan
    $kamar = Kamar::find($request->id_kamar);
    $kamar->decrement('kapasitas', 1);

    // Menyimpan data pesanan
    $pesanan = Pesanan::create([
        'customer_id' => auth('customer')->id(),
        'nama_penghuni' => $request->nama,
        'gender' => $request->gender ?? 'Laki-Laki',
        'email' => $request->email,
        'kontak' => $request->noTelp,
        'alamat' => $request->alamat,
        'id_kamar' => $request->id_kamar,
        'harga_sewa' => $kamar->harga,
        'status' => 'Pending',
        'nomor_pesanan' => date('Ymdhis')
    ]);

    Pembayaran::create([
        'id_pesanan' => $pesanan->id,
        'periode' => 30,
        'jumlah_bayar' => 0,
        'metode_bayar' => $request->pembayaran,
        'bukti_bayar' => null,
        'status' => 'Belum Lunas',
    ]);

    // Redirect ke halaman detail pesanan setelah pesanan berhasil dibuat
    return redirect()->route('pemesanan.show', $pesanan->id)->with('success', 'Pesanan berhasil dibuat. Menunggu konfirmasi pembayaran kepada pemilik kos.');
}


}
