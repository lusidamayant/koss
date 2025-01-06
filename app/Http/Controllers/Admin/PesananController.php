<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;  // Model Pesanan
use App\Models\Customer; // Model Customer
use App\Models\Kamar; // Model Kamar
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        // Mengambil data pesanan yang terkait dengan customer dan kamar
        $pesanan = Pesanan::with('customer', 'kamar')->get(); // Menggunakan relasi Eloquent
        return view('admin.pesanan.index', compact('pesanan'));
    }

    public function create()
    {
        // Mengambil data kamar yang tersedia untuk pemesanan
        $kamar = Kamar::all();

        // Mengambil data customer untuk dropdown
        $customers = Customer::all();  // Menambahkan query untuk mendapatkan semua customer

        return view('admin.pesanan.create', compact('kamar', 'customers'));  // Pastikan customer juga dikirim ke view
    }

    public function store(Request $request)
    {
        // Validasi input
        $this->validate($request, [
            'customer_id' => 'required|exists:customers,id', // Mengacu pada id customer
            'nama_penghuni' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'kontak' => 'required',
            'alamat' => 'required',
            'id_kamar' => 'required|exists:kamar,id',
            'harga_sewa' => 'nullable|numeric',
        ]);

        // Mengurangi kapasitas kamar yang dipesan
        $kamar = Kamar::find($request->id_kamar);
        $kamar->decrement('kapasitas', 1);

        // Menyimpan data pesanan
        Pesanan::create([
            'customer_id' => $request->customer_id, // ID customer
            'nama_penghuni' => $request->nama_penghuni,
            'gender' => $request->gender,
            'email' => $request->email,
            'kontak' => $request->kontak,
            'alamat' => $request->alamat,
            'id_kamar' => $request->id_kamar,
            'harga_sewa' => $request->harga_sewa,
            'status' => 'Pending',  // Status awal pesanan
            'nomor_pesanan' => date('Ymdhis')
        ]);

        return redirect()->route('admin.pesanan.index')
            ->with('message', 'Pesanan baru berhasil disimpan!');
    }

    public function edit($id)
    {
        // Mengambil data pesanan dan kamar
        $pesanan = Pesanan::findOrFail($id);
        $kamar = Kamar::all();
        return view('admin.pesanan.edit', compact('pesanan', 'kamar'));
    }

    public function update(Request $request, Pesanan $pesanan)
    {
        // Validasi input
        $this->validate($request, [
            // 'customer_id' => 'required|exists:customers,id',
            'nama_penghuni' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'kontak' => 'required',
            'alamat' => 'required',
            'id_kamar' => 'required|exists:kamar,id',
            'harga_sewa' => 'nullable|numeric',
            'status' => 'required',
        ]);

        // Mengupdate kapasitas kamar
        $kamar_baru = Kamar::find($request->id_kamar);

        // Jika kamar berubah, update kapasitas kamar
        if ($pesanan->id_kamar != $request->id_kamar) {
            Kamar::find($pesanan->id_kamar)->increment('kapasitas', 1); // Kembalikan kapasitas kamar lama
            $kamar_baru->decrement('kapasitas', 1); // Kurangi kapasitas kamar baru
        }

        // Update data pesanan
        $pesanan->update([
            // 'customer_id' => $request->customer_id,
            'nama_penghuni' => $request->nama_penghuni,
            'gender' => $request->gender,
            'email' => $request->email,
            'kontak' => $request->kontak,
            'alamat' => $request->alamat,
            'id_kamar' => $request->id_kamar,
            'harga_sewa' => $request->harga_sewa,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.pesanan.index')
            ->with('message', 'Pesanan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pesanan = Pesanan::findOrFail($id);

        // Mengembalikan kapasitas kamar sebelum pesanan dihapus
        $kamar = Kamar::find($pesanan->id_kamar);
        $kamar->increment('kapasitas', 1);

        // Menghapus data pesanan
        $pesanan->delete();

        return redirect()->route('admin.pesanan.index')
            ->with('message', 'Pesanan berhasil dihapus!');
    }
    public function show($id)
    {
        // Mengambil data pesanan dengan relasi customer dan kamar
        $pesanan = Pesanan::with(['customer', 'kamar'])->findOrFail($id);

        // Menampilkan view detail pesanan
        return view('admin.pesanan.show', compact('pesanan'));
    }
}
