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
                <a href="javascript:void(0);">Ubah Penghuni</a>
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="">
    <div class="card mt-4">
        <div class="card-body">
            <form action="{{ route('admin.penghuni.update', $penghuni->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="id_kamar" class="form-label">Kamar:</label>
                    <select name="id_kamar" id="id_kamar" class="form-select" required>
                        @foreach ($kamar as $k)
                            <option value="{{ $k->id }}" {{ $penghuni->id_kamar == $k->id ? 'selected' : '' }}>
                                {{ $k->nama_kamar }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tanggal_pesan" class="form-label">Tanggal Pesan:</label>
                    <input type="date" name="tanggal_pesan" id="tanggal_pesan" class="form-control"
                           value="{{ old('tanggal_pesan', $penghuni->tanggal_pesan) }}" required>
                </div>

                <div class="mb-3">
                    <label for="tanggal_masuk" class="form-label">Tanggal Masuk:</label>
                    <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control"
                           value="{{ old('tanggal_masuk', $penghuni->tanggal_masuk) }}" required>
                </div>

                <div class="mb-3">
                    <label for="tanggal_keluar" class="form-label">Tanggal Keluar:</label>
                    <input type="date" name="tanggal_keluar" id="tanggal_keluar" class="form-control"
                           value="{{ old('tanggal_keluar', $penghuni->tanggal_keluar) }}">
                </div>

                <div class="mb-4">
                    <label for="status" class="form-label">Status:</label>
                    <select name="status" id="status" class="form-select">
                        <option value="Aktif" {{ $penghuni->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="Keluar" {{ $penghuni->status == 'Keluar' ? 'selected' : '' }}>Keluar</option>
                    </select>
                </div>

                <div class="d-grid gap-3">
                    <a href="{{ route('admin.penghuni.index') }}" class="btn btn-danger btn-lg">Batal</a>
                    <button type="submit" class="btn btn-success btn-lg">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
