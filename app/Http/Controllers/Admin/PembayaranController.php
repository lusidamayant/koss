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
     * Mengupdate status pembayaran.
     */
    public function updateStatus($id)
    {
        // Mencari pembayaran berdasarkan ID
        $pembayaran = Pembayaran::findOrFail($id);

        // Cek jika statusnya Lunas
        if ($pembayaran->status != 'Lunas') {
            // Mengubah status pembayaran menjadi Lunas
            $pembayaran->status = 'Lunas';
            $pembayaran->save();

            // Jika status berhasil diubah, maka kita buat data penghuni baru
            // Berdasarkan data pesanan yang ada
            $pesanan = $pembayaran->pesanan;

            // Menambahkan penghuni baru berdasarkan pesanan
            Penghuni::create([
                'nama_penghuni' => $pesanan->nama_penghuni,
                'id_kamar' => $pesanan->id_kamar,
                'tanggal_pesan' => now(),
                'tanggal_masuk' => now(), // Tentukan tanggal masuk sesuai kebutuhan
                'tanggal_keluar' => $pesanan->tanggal_keluar, // Tentukan tanggal masuk sesuai kebutuhan
                'status' => 'Aktif',
            ]);
        }

        // Redirect kembali ke halaman detail pembayaran dengan pesan sukses
        return redirect()->route('admin.pembayaran.show', $pembayaran->id)
                         ->with('success', 'Status pembayaran berhasil diperbarui dan penghuni baru telah ditambahkan.');
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
