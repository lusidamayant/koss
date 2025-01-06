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
                <a href="javascript:void(0);">Ubah Pesanan</a>
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="">
    <div class="card mt-4">
        <div class="card-body">
            <form action="{{ route('admin.pesanan.update', $pesanan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama_penghuni" class="form-label">Nama Penghuni:</label>
                    <input type="text" name="nama_penghuni" id="nama_penghuni" class="form-control"
                           value="{{ old('nama_penghuni', $pesanan->nama_penghuni) }}" required>
                </div>

                <div class="mb-3">
                    <label for="gender" class="form-label">Gender:</label>
                    <select name="gender" id="gender" class="form-select" required>
                        <option value="Laki-Laki" {{ $pesanan->gender == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                        <option value="Perempuan" {{ $pesanan->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" id="email" class="form-control"
                           value="{{ old('email', $pesanan->email) }}" required>
                </div>

                <div class="mb-3">
                    <label for="kontak" class="form-label">Kontak:</label>
                    <input type="text" name="kontak" id="kontak" class="form-control"
                           value="{{ old('kontak', $pesanan->kontak) }}" required>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat:</label>
                    <textarea name="alamat" id="alamat" class="form-control" rows="4" required>{{ old('alamat', $pesanan->alamat) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="id_kamar" class="form-label">Kamar:</label>
                    <select name="id_kamar" id="id_kamar" class="form-select" required>
                        @foreach($kamar as $kamar)
                            <option value="{{ $kamar->id }}" {{ $pesanan->id_kamar == $kamar->id ? 'selected' : '' }}>{{ $kamar->nama_kamar }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="harga_sewa" class="form-label">Harga Sewa:</label>
                    <input type="number" name="harga_sewa" id="harga_sewa" class="form-control"
                           value="{{ old('harga_sewa', $pesanan->harga_sewa) }}">
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status Pesanan:</label>
                    <select name="status" id="status" class="form-select">
                        <option value="Pending" {{ $pesanan->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Diterima" {{ $pesanan->status == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                        <option value="Ditolak" {{ $pesanan->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </div>

                <div class="d-grid gap-3">
                    <a href="{{ route('admin.pesanan.index') }}" class="btn btn-danger btn-lg">Batal</a>
                    <button type="submit" class="btn btn-success btn-lg">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
