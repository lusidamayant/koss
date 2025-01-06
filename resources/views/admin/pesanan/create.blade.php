@extends('admin.layouts.app')

@section('content')

<div class="card">
    <div class="card-body">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mb-0">
                <li class="breadcrumb-item">
                <a href="{{ route('admin.pesanan.index') }}">Pesanan</a>
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
        <form action="{{ route('admin.pesanan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="customer_id" class="form-label">Customer:</label>
                <select name="customer_id" id="customer_id" class="form-select" required>
                    <option value="" disabled selected hidden>Pilih Customer</option>
                    @foreach($customers as $customer)  <!-- Pastikan variabel $customer ada di sini -->
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
            </div>
            

            <div class="mb-3">
                <label for="nama_penghuni" class="form-label">Nama Penghuni:</label>
                <input type="text" name="nama_penghuni" id="nama_penghuni" class="form-control" placeholder="Masukkan nama penghuni" required>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="gender" class="form-label">Gender:</label>
                    <select name="gender" id="gender" class="form-select" required>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email penghuni" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="kontak" class="form-label">Kontak:</label>
                <input type="text" name="kontak" id="kontak" class="form-control" placeholder="Masukkan nomor kontak" required>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat:</label>
                <textarea name="alamat" id="alamat" class="form-control" rows="4" placeholder="Masukkan alamat penghuni" required></textarea>
            </div>

            <div class="mb-3">
                <label for="id_kamar" class="form-label">Kamar:</label>
                <select name="id_kamar" id="id_kamar" class="form-select" required>
                    <option value="" disabled selected>Pilih Kamar</option>
                    @foreach($kamar as $k)
                        <option value="{{ $k->id }}">{{ $k->nama_kamar }} ({{ $k->kapasitas }} orang)</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="harga_sewa" class="form-label">Harga Sewa (Rp):</label>
                <input type="number" name="harga_sewa" id="harga_sewa" class="form-control" placeholder="Masukkan harga sewa" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status:</label>
                <select name="status" id="status" class="form-select">
                    <option value="Pending">Pending</option>
                    <option value="Diterima">Diterima</option>
                    <option value="Ditolak">Ditolak</option>
                </select>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
