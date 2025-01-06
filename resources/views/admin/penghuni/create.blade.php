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
                    <a href="javascript:void(0);">Tambah Penghuni</a>
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="card mt-4">

    <div class="card-body">
        <form action="{{ route('admin.penghuni.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="id_kamar" class="form-label">Nama Kamar:</label>
                <select name="id_kamar" id="id_kamar" class="form-select" required>
                    <option value="" disabled selected>Pilih Kamar</option>
                    @foreach ($kamar as $k)
                        <option value="{{ $k->id }}">{{ $k->nama_kamar }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="tanggal_pesan" class="form-label">Tanggal Pesan:</label>
                <input type="date" name="tanggal_pesan" id="tanggal_pesan" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_masuk" class="form-label">Tanggal Masuk:</label>
                <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_keluar" class="form-label">Tanggal Keluar (Opsional):</label>
                <input type="date" name="tanggal_keluar" id="tanggal_keluar" class="form-control">
            </div>

            <div class="mb-4">
                <label for="status" class="form-label">Status:</label>
                <select name="status" id="status" class="form-select">
                    <option value="Aktif" selected>Aktif</option>
                    <option value="Keluar">Keluar</option>
                </select>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg">Simpan</button>
            </div>
        </form>
    </div>
</div>

@endsection
