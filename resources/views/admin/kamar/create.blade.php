@extends('admin.layouts.app')

@section('content')

<div class="card">
    <div class="card-body">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mb-0">
                <li class="breadcrumb-item">
                <a href="{{ route('admin.kamar.index') }}">Kamar</a>
                </li>
                <li class="breadcrumb-item active">
                <a href="javascript:void(0);">Buat</a>
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="card mt-4">

    <div class="card-body">
        <form action="{{ route('admin.kamar.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama_kamar" class="form-label">Nama Kamar:</label>
                <input type="text" name="nama_kamar" id="nama_kamar" class="form-control" placeholder="Masukkan nama kamar" required>
            </div>
    
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="panjang" class="form-label">Panjang Kamar (m):</label>
                    <input type="number" name="panjang" id="panjang" class="form-control" step="0.01" placeholder="Contoh: 5.0" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="lebar" class="form-label">Lebar Kamar (m):</label>
                    <input type="number" name="lebar" id="lebar" class="form-control" step="0.01" placeholder="Contoh: 4.0" required>
                </div>
            </div>
    
            <div class="mb-3">
                <label for="harga" class="form-label">Harga Kamar (Rp):</label>
                <input type="number" name="harga" id="harga" class="form-control" placeholder="Masukkan harga kamar" required>
            </div>
    
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan:</label>
                <textarea name="keterangan" id="keterangan" class="form-control" rows="4" placeholder="Masukkan deskripsi atau keterangan kamar" required></textarea>
            </div>
    
            <div class="mb-3">
                <label for="kapasitas" class="form-label">Kapasitas Kamar:</label>
                <input type="number" name="kapasitas" id="kapasitas" class="form-control" placeholder="Masukkan kapasitas kamar (orang)" required>
            </div>
    
            <div class="mb-3">
                <label for="foto" class="form-label">Foto Kamar:</label>
                <input type="file" name="foto" id="foto" class="form-control" required>
            </div>
    
            <div class="mb-4">
                <label for="status" class="form-label">Status:</label>
                <select name="status" id="status" class="form-select">
                    <option value="tersedia">Tersedia</option>
                    <option value="tidak tersedia">Tidak Tersedia</option>
                </select>
            </div>
    
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
