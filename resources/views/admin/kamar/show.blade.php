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
                <a href="javascript:void(0);">Ubah Kamar</a>
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="mt-4">
    <div class="card shadow-sm">
        <div class="card-body">
            {{-- <h2 class="mb-4 text-center">Detail Kamar</h2> --}}
            
            <div class="mb-3">
                {{-- <label class="form-label"><strong>Foto Kamar:</strong></label> --}}
                @if($kamar->foto)
                    <div class="text-center">
                        <img src="{{ asset('storage/' . $kamar->foto) }}" alt="Foto Kamar" class="img-fluid" style="max-height: 200px; object-fit: cover;">
                    </div>
                @else
                    <p>Foto tidak tersedia</p>
                @endif
            </div>
            <!-- Nama Kamar -->
            <div class="mb-3">
                <label class="form-label"><strong>Nama Kamar:</strong></label>
                <p>{{ $kamar->nama_kamar }}</p>
            </div>

            <!-- Panjang dan Lebar Kamar -->
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label"><strong>Panjang Kamar (m):</strong></label>
                    <p>{{ $kamar->panjang }} m</p>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label"><strong>Lebar Kamar (m):</strong></label>
                    <p>{{ $kamar->lebar }} m</p>
                </div>
            </div>

            <!-- Harga Kamar -->
            <div class="row">
                <div class="col-12 col-md-6">
                    <label class="form-label"><strong>Harga Kamar (Rp):</strong></label>
                    <p>Rp {{ number_format($kamar->harga, 0, ',', '.') }}</p>
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label"><strong>Status:</strong></label>
                    <p><span class="badge bg-{{ $kamar->status == 'tersedia' ? 'success' : 'danger' }}">{{ ucfirst($kamar->status) }}</span></p>
                </div>
            </div>

            <!-- Keterangan Kamar -->
            <div class="row">
                <div class="col-12 col-md-6">
                    <label class="form-label"><strong>Kapasitas Kamar:</strong></label>
                    <p>{{ $kamar->kapasitas }} orang</p>
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label"><strong>Keterangan:</strong></label>
                    <p>{{ $kamar->keterangan }}</p>
                </div>
            </div>

            <!-- Kapasitas Kamar -->

            <!-- Foto Kamar -->

            <!-- Status Kamar -->

            <!-- Tombol Aksi -->
            <div class="mb-3">
                <a href="{{ route('admin.kamar.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
