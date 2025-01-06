<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penghuni;
use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // pastikan DB di-import

class PenghuniController extends Controller
{
    public function index()
    {
        $penghuni = Penghuni::with('kamar')->paginate(10);
        return view('admin.penghuni.index', compact('penghuni'));
    }

    // Menampilkan form tambah penghuni
    public function create()
    {
        $kamar = Kamar::all();
        return view('admin.penghuni.create', compact('kamar'));
    }

    // Menyimpan data penghuni baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_penghuni' => 'required|string|max:255',
            'id_kamar' => 'required|exists:kamar,id',
            'tanggal_pesan' => 'required|date',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'nullable|date|after_or_equal:tanggal_masuk',
            'status' => 'required|in:Aktif,Keluar',
        ]);

        Penghuni::create($validated);

        return redirect()->route('admin.penghuni.index')->with('success', 'Data penghuni berhasil ditambahkan.');
    }

    // Menampilkan form edit penghuni
    public function edit($id)
    {
        $penghuni = Penghuni::findOrFail($id);
        $kamar = kamar::all();

        return view('admin.penghuni.edit', compact('penghuni', 'kamar'));
    }

    // Mengupdate data penghuni
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_penghuni' => 'required|string|max:255',
            'id_kamar' => 'required|exists:kamar,id',
            'tanggal_pesan' => 'required|date',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'nullable|date|after_or_equal:tanggal_masuk',
            'status' => 'required|in:Aktif,Keluar',
        ]);

        $penghuni = Penghuni::findOrFail($id);
        $penghuni->update($validated);

        return redirect()->route('admin.penghuni.index')->with('success', 'Data penghuni berhasil diperbarui.');
    }

    // Menghapus data penghuni
    public function destroy($id)
    {
        $penghuni = Penghuni::findOrFail($id);
        $penghuni->delete();

        return redirect()->route('admin.penghuni.index')->with('success', 'Data penghuni berhasil dihapus.');
    }
            public function show($id)
        {
            $penghuni = Penghuni::with('kamar')->findOrFail($id);

            return view('admin.penghuni.show', compact('penghuni'));
        }

    // public function index()
    // {
    //     $penghuni = Penghuni::paginate(20);
    //     return view('admin.penghuni.index', ['penghuni' => $penghuni]);
    // }
}

