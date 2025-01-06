@extends('user.layouts.app')
@section('content')
<section class="hero-section">
    <h1>PESANAN SAYA</h1>
</section>
<div class="row gap-2 m-3 justify-content-center">
    @forelse ($pesanans as $item)
        <div class="col-12 col-md-3 room-box">
            <img src="{{ asset('storage/'.$item->kamar->foto) }}" alt="{{ $item->kamar->nama_kamar }}" style="height: 250px; object-fit: cover;" class="img-fluid">
            <h3>{{ $item->kamar->nama_kamar }}</h3>
            <h3 class="alert alert-{{ $item->status == 'Pending' ? 'warning':($item->status == 'Ditolak' ? 'danger':'success') }} fw-bold">{{ $item->status }}</h3>
            {{-- <p>{{ formatRupiah($item->kamar->harga) }} / bulan</p> --}}
            <a href="{{ route('pemesanan.show', $item->id) }}" class="btn btn-secondary">Detail Pesanan</a>
            {{-- <button class="facility-btn" onclick="window.location.href='/kamar/detail'">Info Fasilitas</button> --}}
            {{-- <button onclick="pesanKamar('Standard', 'Rp 1.000.000')">Pesan</button> --}}
        </div>
    @empty
        <div class="col-12 text-center">
            <h3>Belum ada Pesanan</h3>
        </div>
    @endforelse
</div>

@endsection