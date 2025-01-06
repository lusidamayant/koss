@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.pembayaran.index') }}">Pembayaran</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="javascript:void(0);">Detail Pembayaran</a>
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="mt-4">
    <div class="card shadow-sm">
        <div class="card-body">

            <!-- Pesanan -->
            <div class="mb-3">
                <label class="form-label"><strong>Pesanan:</strong></label>
                <p>{{ $pembayaran->pesanan->nomor_pesanan }} - {{ $pembayaran->pesanan->kamar->nama_kamar }} - {{ $pembayaran->pesanan->nama_penghuni }}</p>
            </div>

            <!-- Periode Pembayaran -->
            <div class="mb-3">
                <label class="form-label"><strong>Periode Pembayaran:</strong></label>
                <p>{{ $pembayaran->periode }}</p>
            </div>

            <!-- Jumlah Bayar -->
            <div class="mb-3">
                <label class="form-label"><strong>Jumlah Bayar:</strong></label>
                <p>Rp {{ number_format($pembayaran->jumlah_bayar, 0, ',', '.') }}</p>
            </div>

            <!-- Metode Pembayaran -->
            <div class="mb-3">
                <label class="form-label"><strong>Metode Pembayaran:</strong></label>
                <p>{{ $pembayaran->metode_bayar }}</p>
            </div>

            <!-- Bukti Pembayaran -->
            <div class="mb-3">
                <label class="form-label"><strong>Bukti Pembayaran:</strong></label>
                @if($pembayaran->bukti_bayar)
                    <a href="{{ Storage::url($pembayaran->bukti_bayar) }}" target="_blank" class="btn btn-info btn-sm">Lihat Bukti Bayar</a>
                @else
                    <p>Tidak ada bukti pembayaran.</p>
                @endif
            </div>

            <!-- Status Pembayaran -->
            <div class="mb-3">
                <label class="form-label"><strong>Status Pembayaran:</strong></label>
                <p><span class="badge bg-{{ $pembayaran->status == 'Lunas' ? 'success' : 'danger' }}">{{ ucfirst($pembayaran->status) }}</span></p>
            </div>

            <!-- Tombol Konfirmasi Lunas -->
@if($pembayaran->status != 'Lunas')
<div class="mb-3">
    <form action="{{ route('admin.pembayaran.updateStatus', $pembayaran->id) }}" method="POST">
        @csrf
        @method('PUT')
        <button type="submit" class="btn btn-success btn-lg">
            Konfirmasi Lunas
        </button>
    </form>
</div>
@endif


            <!-- Tombol Kembali -->
            <div class="mb-3">
                <a href="{{ route('admin.pembayaran.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
