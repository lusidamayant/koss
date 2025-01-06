@extends('user.layouts.app')
@section('css')
<style>
    .custom-text-bold {
        font-size: 1.5rem;
        font-weight: bold;
    }
</style>
@endsection
@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <h1>Rincian Pesanan</h1>
    </section>

<div class="container my-5">
    <div class="row">
        <!-- Gambar Kamar -->
        <div class="col-md-4">
            <img src="{{ asset('storage/'.$kamar->foto) }}" alt="{{ $kamar->nama_kamar }}" class="img-fluid rounded" style="height: 400px; object-fit: cover;">
        </div>

        <!-- Informasi Kamar -->
        <div class="col-md-4">
            <h3 style="font-size: 1.2rem;">{{ $kamar->nama_kamar }}</h3>
            <h4 class="custom-text-bold">{{ formatRupiah($kamar->harga) }} / bulan</h4>
            <p>{{ $kamar->deskripsi }}</p>

            <h5>Fasilitas:</h5>
            <p>
                {!! nl2br($kamar->keterangan) !!}
            </p>
            {{-- <ul>
                @foreach($kamar->fasilitas as $fasilitas)
                    <li>{{ $fasilitas }}</li>
                @endforeach
            </ul> --}}

            {{-- <a href="{{ route('kamar.pesan', $kamar->id) }}" class="btn btn-success mt-3">Pesan Kamar</a> --}}
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center fw-bold">Informasi Pembayaran</h4>
                    <div>
                        <h4 class="fw-bold">Periode</h4>
                        <p>{{ $pesanan->pembayaran->periode }} Bulan</p>
                    </div>
                    <div>
                        <h4 class="fw-bold">Jumlah Bayar</h4>
                        <p>{{ formatRupiah($pesanan->pembayaran->jumlah_bayar) }}</p>
                    </div>
                    <div>
                        <h4 class="fw-bold">Metode Pembayaran</h4>
                        <p>{{ $pesanan->pembayaran->metode_bayar }}</p>
                    </div>
                    <div>
                        <h4 class="fw-bold">Status</h4>
                        @if($pesanan->pembayaran->metode_bayar == 'Tunai')
                        <p class="alert alert-{{ $pesanan->pembayaran->status == 'Belum Lunas' ? 'warning':'success' }} fw-bold">{{ strtoupper($pesanan->pembayaran->status) }}</p>
                        @else
                        <p class="alert alert-{{ $pesanan->pembayaran->status == 'Belum Lunas' ? 'warning':'success' }} fw-bold">
                            @if($pesanan->pembayaran->status == 'Belum Lunas' && $pesanan->pembayaran->bukti_bayar == null)
                            BELUM LUNAS
                            @elseif($pesanan->pembayaran->status == 'Belum Lunas' && $pesanan->pembayaran->bukti_bayar != null)
                            MENUNGGU KONFIRMASI
                            @else
                            LUNAS
                            @endif
                        </p>
                        @endif
                    </div>
                    @if($pesanan->pembayaran->metode_bayar == 'Transfer' && $pesanan->pembayaran->status == 'Belum Lunas' && $pesanan->pembayaran->bukti_bayar == null)
                    <div>
                        <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modalKonfirmasi">Konfirmasi Pembayaran</button>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Rekomendasi Kamar Lain -->
    {{-- <div class="row mt-5 gap-3">
        <h3>Kamar Lainnya</h3>
        @foreach($kamarLain as $item)
            <div class="col-12 col-md-3 room-box">
                <img src="{{ asset('storage/'.$item->foto) }}" alt="{{ $item->nama_kamar }}" class="img-fluid" style="height: 200px; object-fit: cover;">
                <h5>{{ $item->nama_kamar }}</h5>
                <p>{{ formatRupiah($item->harga) }} / bulan</p>
                <a href="{{ route('kamar.show', $item->id) }}" class="btn btn-secondary btn-sm">Lihat Detail</a>
            </div>
        @endforeach
    </div> --}}
</div>

<div class="modal fade" id="modalKonfirmasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Pembayaran</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pembayaran.konfirmasi', $pesanan->pembayaran->id) }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                        @csrf
                        <div class="alert alert-primary">
                            Lakukan pembayaran dengan melakukan transfer ke nomor rekening berikut :
                            <p class="fw-bold mb-0">
                                BNI a.n Budi Tabuti
                                <br>
                                987134991284 </p>
                        </div>
                        <div class="form-group mb-3">
                            <label for="jumlah">Jumlah</label>
                            <input type="text" id="jumlah" class="form-control" value="{{ formatRupiah($pesanan->pembayaran->jumlah_bayar) }}" readonly>
                        </div>
                        <div class="form-group mb-3">
                            <label for="bukti-transfer">File Bukti Transfer</label>
                            <input type="file" name="bukti_bayar" id="bukti-transfer" class="form-control" accept=".jpg, .jpeg, .png" required>
                            {{-- <span class="error-message">File tidak boleh kosong</span> --}}
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload Bukti Bayar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
