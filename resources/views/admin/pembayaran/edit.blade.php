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
                <a href="javascript:void(0);">Ubah Pembayaran</a>
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="card mt-4">
    <div class="card-body">
        <form action="{{ route('admin.pembayaran.update', $pembayaran->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="id_pesanan" class="form-label">Pesanan:</label>
                {{-- <input type="number" name="id_pesanan" id="id_pesanan" class="form-control" placeholder="Masukkan ID pesanan" required> --}}
                <select name="id_pesanan" id="idPesanan" class="form-control">
                    <option value="" selected disabled hidden>Pilih Pesanan</option>
                    @foreach($pesanan as $item)
                    <option value="{{ $item->id }}" {{ old('id_pesanan', $pembayaran->id_pesanan) == $item->id ? 'selected':'' }}>{{ $item->nomor_pesanan }} - {{ $item->kamar->nama_kamar }} - {{ $item->nama_penghuni }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="periode" class="form-label">Periode Pembayaran:</label>
                <input type="text" name="periode" id="periode" class="form-control" value="{{ old('periode', $pembayaran->periode) }}" required>
            </div>

            <div class="mb-3">
                <label for="jumlah_bayar" class="form-label">Jumlah Bayar (Rp):</label>
                <input type="number" name="jumlah_bayar" id="jumlah_bayar" class="form-control" value="{{ old('jumlah_bayar', $pembayaran->jumlah_bayar) }}" required>
            </div>

            <div class="mb-3">
                <label for="metode_bayar" class="form-label">Metode Pembayaran:</label>
                <select name="metode_bayar" id="metode_bayar" class="form-select" required>
                    <option value="Transfer" {{ old('metode_bayar', $pembayaran->metode_bayar) == 'Transfer' ? 'selected' : '' }}>Transfer</option>
                    <option value="Tunai" {{ old('metode_bayar', $pembayaran->metode_bayar) == 'Tunai' ? 'selected' : '' }}>Tunai</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="bukti_bayar" class="form-label">Bukti Pembayaran (Opsional):</label>
                <input type="file" name="bukti_bayar" id="bukti_bayar" class="form-control">
                @if($pembayaran->bukti_bayar)
                    <p class="mt-2">Bukti pembayaran saat ini: <img src="{{ asset('storage/' . $pembayaran->bukti_bayar) }}" alt="Bukti Pembayaran" style="max-height: 100px;"></p>
                @endif
            </div>

            <div class="mb-4">
                <label for="status" class="form-label">Status:</label>
                <select name="status" id="status" class="form-select">
                    <option value="Lunas" {{ $pembayaran->status == 'Lunas' ? 'selected' : '' }}>Lunas</option>
                    <option value="Belum Lunas" {{ $pembayaran->status == 'Belum Lunas' ? 'selected' : '' }}>Belum Lunas</option>
                </select>
            </div>

            <div class="d-grid gap-3">
                <a href="{{ route('admin.pembayaran.index') }}" class="btn btn-danger btn-lg">Batal</a>
                <button type="submit" class="btn btn-success btn-lg">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
