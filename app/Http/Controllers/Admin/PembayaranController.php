<?php

namespace App\Http\Controllers\Admin;
use App\Models\Pembayaran;
use App\Models\Penghuni;
use App\Models\Pesanan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        // Mengambil semua data pembayaran beserta relasi penghuni dan pesanan
        $pembayaran = Pembayaran::with(['penghuni', 'pesanan'])->get();

        return view('admin.pembayaran.index', compact('pembayaran'));
    }

    /**
     * Menampilkan form untuk membuat pembayaran baru.
     */
    public function create()
    {
        // Mengambil semua data penghuni dan pesanan untuk dropdown
        $penghuni = Penghuni::all();
        $pesanan = Pesanan::with(['kamar'])->where('status', 'Pending')->get();

        return view('admin.pembayaran.create', compact('penghuni', 'pesanan'));
    }

    /**
     * Menyimpan pembayaran baru ke database.
     */
    public function store(Request $request)
    {
        $required_bukti_bayar = $request->metode_bayar == 'Transfer' ? 'required' : 'nullable';

        // Validation
        $request->validate([
            'id_pesanan' => 'required|exists:pesanans,id',
            'periode' => 'required|string|max:255',
            'jumlah_bayar' => 'required|integer|min:0',
            'metode_bayar' => 'required|in:Transfer,Tunai',
            'bukti_bayar' => $required_bukti_bayar.'|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'status' => 'required|in:Lunas,Belum Lunas',
        ]);


        // Simpan file bukti bayar jika ada
        $bukti_bayar = null;
        if ($request->hasFile('bukti_bayar')) {
            $bukti_bayar = $request->file('bukti_bayar')->store('bukti_bayar');
        }

        // Simpan data pembayaran
        Pembayaran::create([
            // 'id_penghuni' => $request->id_penghuni,
            'id_pesanan' => $request->id_pesanan,
            'periode' => $request->periode,
            'jumlah_bayar' => $request->jumlah_bayar,
            'metode_bayar' => $request->metode_bayar,
            'bukti_bayar' => $bukti_bayar,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.pembayaran.index')->with('success', 'Pembayaran berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail pembayaran.
     */
    public function show($id)
    {
        // Mengambil data pembayaran berdasarkan ID beserta relasinya
        $pembayaran = Pembayaran::with(['penghuni', 'pesanan'])->findOrFail($id);

        return view('admin.pembayaran.show', compact('pembayaran'));
    }

    /**
     * Menampilkan form untuk mengedit pembayaran.
     */
    public function edit($id)
    {
        // Mengambil data pembayaran berdasarkan ID
        $pembayaran = Pembayaran::findOrFail($id);

        // Mengambil semua data penghuni dan pesanan untuk dropdown
        $penghuni = Penghuni::all();
        $pesanan = Pesanan::all();

        return view('admin.pembayaran.edit', compact('pembayaran', 'penghuni', 'pesanan'));
    }

    /**
     * Mengupdate pembayaran di database.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            // 'id_penghuni' => 'required|exists:penghuni_kost,id',
            'id_pesanan' => 'required|exists:pesanans,id',
            'periode' => 'required|string|max:255',
            'jumlah_bayar' => 'required|integer|min:0',
            'metode_bayar' => 'required|in:Transfer,Tunai',
            'bukti_bayar' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'status' => 'required|in:Lunas,Belum Lunas',
        ]);

        // Ambil data pembayaran berdasarkan ID
        $pembayaran = Pembayaran::findOrFail($id);

        // Simpan file bukti bayar jika ada
        if ($request->hasFile('bukti_bayar')) {
            $bukti_bayar = $request->file('bukti_bayar')->store('bukti_bayar');
            $pembayaran->bukti_bayar = $bukti_bayar;
        }

        // Update data pembayaran
        $pembayaran->update([
            // 'id_penghuni' => $request->id_penghuni,
            'id_pesanan' => $request->id_pesanan,
            'periode' => $request->periode,
            'jumlah_bayar' => $request->jumlah_bayar,
            'metode_bayar' => $request->metode_bayar,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.pembayaran.index')->with('success', 'Pembayaran berhasil diperbarui.');
    }

    /**
     * Menghapus pembayaran dari database.
     */
    public function destroy($id)
    {
        // Menghapus data pembayaran berdasarkan ID
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->delete();

        return redirect()->route('admin.pembayaran.index')->with('success', 'Pembayaran berhasil dihapus.');
    }
}
