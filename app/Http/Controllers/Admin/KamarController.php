<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KamarController extends Controller
{
    public function index()
    {
        $kamar = Kamar::paginate(20);
        return view('admin.kamar.index', ['kamar' => $kamar]);
    }
    public function create()
    {
        
        return view('admin.kamar.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kamar' => 'required',
            'panjang' => 'required',
            'lebar' => 'required',
            'harga' => 'required',
            'keterangan' => 'required',
            'kapasitas' => 'required',
            'foto' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $path = $file->store('foto_kamar/', 'public');
        }

        $kamar = Kamar::create([
            'nama_kamar' => $request['nama_kamar'],
            'panjang' =>  $request['panjang'],
            'lebar' =>   $request['lebar'],
            'harga' =>  $request['harga'],
            'keterangan' =>  $request['keterangan'],
            'kapasitas' => $request['kapasitas'],
            'foto' => $path ?? ''
        ]);
        return redirect()->route('admin.kamar.index')
            ->with(
                'success',
                'Kamar baru berhasil disimpan!'
            );
    }

    public function show($id)
    {
        $kamar = Kamar::find($id);
        return view('admin.kamar.show', compact('kamar'));
    }

    public function edit(Kamar $kamar)
    {
        return view('admin.kamar.edit', compact('kamar'));
    }

    public function update(Request $request, Kamar $kamar)
    {
        $this->validate($request, [
            'nama_kamar' => 'required',
            'panjang' => 'required',
            'lebar' => 'required',
            'harga' => 'required',
            'keterangan' => 'required',
            'kapasitas' => 'required',
            'status' => 'required',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if($request->hasFile('foto')){
            // if(Storage::exists($kamar->foto)){
            //     Storage::unlink($kamar->foto);
            // }
            $file = $request->file('foto');
            $path = $file->store('foto_kamar/', 'public');
            $kamar->update([
                'foto' => $path ?? ''
            ]);
        }

        $kamar->update([
            'nama_kamar' => $request['nama_kamar'],
            'panjang' =>  $request['panjang'],
            'lebar' =>   $request['lebar'],
            'harga' =>  $request['harga'],
            'keterangan' =>  $request['keterangan'],
            'kapasitas' => $request['kapasitas'],
        ]);
        
        return redirect()->route('admin.kamar.index')
            ->with('success', 'Data berhasil diperbarui!');

    }

    
    public function destroy(Kamar $kamar)
    {
        $kamar->delete();
        return redirect()->route('admin.kamar.index')
            ->with('success', 'Data berhasil dihapus!');
    }

}
