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
    {{-- <section class="hero-section">
        <h1>Detail Kamar</h1>
    </section> --}}

    <div class="container my-5">
        <div class="row">
            <!-- Gambar Kamar -->
            <div class="col-md-6">
                <img src="{{ asset('storage/'.$kamar->foto) }}" alt="{{ $kamar->nama_kamar }}" class="img-fluid rounded" style="height: 400px; object-fit: cover;">
            </div>

            <!-- Informasi Kamar -->
            <div class="col-md-6">
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

                <a href="{{ route('kamar.pesan', $kamar->id) }}" class="btn btn-success mt-3">Pesan Kamar</a>
            </div>
        </div>

        <!-- Rekomendasi Kamar Lain -->
        <div class="row mt-5 gap-3">
            <h3>Kamar Lainnya</h3>
            @foreach($kamarLain as $item)
                <div class="col-12 col-md-3 room-box">
                    <img src="{{ asset('storage/'.$item->foto) }}" alt="{{ $item->nama_kamar }}" class="img-fluid" style="height: 200px; object-fit: cover;">
                    <h5>{{ $item->nama_kamar }}</h5>
                    <p>{{ formatRupiah($item->harga) }} / bulan</p>
                    <a href="{{ route('kamar.show', $item->id) }}" class="btn btn-secondary btn-sm">Lihat Detail</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
