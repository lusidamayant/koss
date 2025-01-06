@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mb-0">
                <li class="breadcrumb-item">
                <a href="{{ route('admin.penghuni.index') }}">Penghuni</a>
                </li>
                <li class="breadcrumb-item active">
                <a href="javascript:void(0);">Detail Penghuni</a>
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="mt-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="mb-4 text-center">Detail Penghuni</h2>


            <!-- Kamar Penghuni -->
            <div class="mb-3">
                <label class="form-label"><strong>Kamar:</strong></label>
                <p>{{ $penghuni->kamar->nama_kamar }}</p>
            </div>

            <!-- Tanggal Pesan -->
            <div class="mb-3">
                <label class="form-label"><strong>Tanggal Pesan:</strong></label>
                <p>{{ \Carbon\Carbon::parse($penghuni->tanggal_pesan)->format('d M Y') }}</p>
            </div>

            <!-- Tanggal Masuk -->
            <div class="mb-3">
                <label class="form-label"><strong>Tanggal Masuk:</strong></label>
                <p>{{ \Carbon\Carbon::parse($penghuni->tanggal_masuk)->format('d M Y') }}</p>
            </div>

            <!-- Tanggal Keluar -->
            <div class="mb-3">
                <label class="form-label"><strong>Tanggal Keluar:</strong></label>
                <p>{{ $penghuni->tanggal_keluar ? \Carbon\Carbon::parse($penghuni->tanggal_keluar)->format('d M Y') : 'Belum keluar' }}</p>
            </div>

            <!-- Status Penghuni -->
            <div class="mb-3">
                <label class="form-label"><strong>Status:</strong></label>
                <p><span class="badge bg-{{ $penghuni->status == 'Aktif' ? 'success' : 'danger' }}">{{ ucfirst($penghuni->status) }}</span></p>
            </div>

            <!-- Tombol Aksi -->
            <div class="mb-3">
                <a href="{{ route('admin.penghuni.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
