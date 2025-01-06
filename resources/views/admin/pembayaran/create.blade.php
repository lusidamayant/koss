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
                <a href="javascript:void(0);">Buat</a>
                </li>
            </ol>
        </nav>
    </div>
</div>

@if($errors->any())
    @foreach ($errors->all() as $message)
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @endforeach
@endif

<div class="card mt-4">
    <div class="card-body">
        <form action="{{ route('admin.pembayaran.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- <div class="mb-3">
                <label for="id_penghuni" class="form-label">ID Penghuni:</label>
                <input type="number" name="id_penghuni" id="id_penghuni" class="form-control" placeholder="Masukkan ID penghuni" required>
            </div> --}}
            <div class="mb-3">
                <label for="id_pesanan" class="form-label">Pesanan:</label>
                {{-- <input type="number" name="id_pesanan" id="id_pesanan" class="form-control" placeholder="Masukkan ID pesanan" required> --}}
                <select name="id_pesanan" id="idPesanan" class="form-control">
                    <option value="" selected disabled hidden>Pilih Pesanan</option>
                    @foreach($pesanan as $item)
                    <option value="{{ $item->id }}" {{ old('id_pesanan') == $item->id ? 'selected':'' }}>{{ $item->nomor_pesanan }} - {{ $item->kamar->nama_kamar }} - {{ $item->nama_penghuni }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="periode" class="form-label">Periode:</label>
                <input type="text" name="periode" id="periode" class="form-control" value="{{ old('periode') }}" placeholder="Masukkan periode pembayaran" required>
            </div>

            <div class="mb-3">
                <label for="jumlah_bayar" class="form-label">Jumlah Bayar (Rp):</label>
                <input type="number" name="jumlah_bayar" id="jumlah_bayar" value="{{ old('jumlah_bayar') }}" class="form-control" placeholder="Masukkan jumlah bayar" required>
            </div>

            <div class="mb-3">
                <label for="metode_bayar" class="form-label">Metode Pembayaran:</label>
                <select name="metode_bayar" id="metode_bayar" class="form-select" required>
                    <option value="Transfer" {{ old('metode_bayar') == 'Transfer' ? 'selected':'' }}>Transfer</option>
                    <option value="Tunai" {{ old('metode_bayar') == 'Tunai' ? 'selected':'' }}>Tunai</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="bukti_bayar" class="form-label">Bukti Pembayaran:</label>
                <input type="file" name="bukti_bayar" id="bukti_bayar" class="form-control">
                @error('bukti_bayar')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="status" class="form-label">Status Pembayaran:</label>
                <select name="status" id="status" class="form-select">
                    <option value="Lunas" {{ old('status') == 'Lunas' ? 'selected':'' }}>Lunas</option>
                    <option value="Belum Lunas" {{ old('status') == 'Belum Lunas' ? 'selected':'' }}>Belum Lunas</option>
                </select>
            </div>
    
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg">Simpan</button>
            </div>
        </form>
    </div>
</div>

@endsection
