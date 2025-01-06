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
                    <a href="javascript:void(0);">Detail Pesanan</a>
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="mt-4">
    <div class="card shadow-sm">
        <div class="card-body">

            <!-- Nama Penghuni -->
            <div class="mb-3">
                <label class="form-label"><strong>Nama Penghuni:</strong></label>
                <p>{{ $pesanan->nama_penghuni }}</p>
            </div>

            <!-- Gender Penghuni -->
            <div class="mb-3">
                <label class="form-label"><strong>Gender:</strong></label>
                <p>{{ ucfirst($pesanan->gender) }}</p>
            </div>

            <!-- Email Penghuni -->
            <div class="mb-3">
                <label class="form-label"><strong>Email:</strong></label>
                <p>{{ $pesanan->email }}</p>
            </div>

            <!-- Kontak Penghuni -->
            <div class="mb-3">
                <label class="form-label"><strong>Kontak:</strong></label>
                <p>{{ $pesanan->kontak }}</p>
            </div>

            <!-- Alamat Penghuni -->
            <div class="mb-3">
                <label class="form-label"><strong>Alamat:</strong></label>
                <p>{{ $pesanan->alamat }}</p>
            </div>

            <!-- Kamar yang Dipesan -->
            <div class="mb-3">
                <label class="form-label"><strong>Kamar yang Dipesan:</strong></label>
                <p>{{ $pesanan->kamar->nama_kamar ?? 'Kamar tidak tersedia' }}</p>
            </div>

            <!-- Harga Sewa -->
            <div class="mb-3">
                <label class="form-label"><strong>Harga Sewa:</strong></label>
                <p>Rp {{ number_format($pesanan->harga_sewa, 0, ',', '.') }}</p>
            </div>

            <!-- Status Pesanan -->
            <div class="mb-3">
                <label class="form-label"><strong>Status Pesanan:</strong></label>
                <p><span class="badge bg-{{ $pesanan->status == 'Pending' ? 'warning' : ($pesanan->status == 'Diterima' ? 'success' : 'danger') }}">
                    {{ ucfirst($pesanan->status) }}</span></p>
            </div>

            <!-- Tombol Kembali -->
            <div class="mb-3">
                <a href="{{ route('admin.pesanan.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
