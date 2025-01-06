@extends('user.layouts.app')
@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <h1>KAMAR KOS</h1>
    </section>
    <div class="row gap-2 m-3">
        @foreach ($kamar as $item)
            <div class="col-12 col-md-3 room-box">
                <img src="{{ asset('storage/'.$item->foto) }}" alt="{{ $item->nama_kamar }}" style="height: 250px; object-fit: cover;" class="img-fluid">
                <h3>{{ $item->nama_kamar }}</h3>
                <p>{{ formatRupiah($item->harga) }} / bulan</p>
                <a href="{{ route('kamar.show', $item->id) }}" class="btn btn-secondary">Info Fasilitas</a>
                {{-- <button class="facility-btn" onclick="window.location.href='/kamar/detail'">Info Fasilitas</button> --}}
                {{-- <button onclick="pesanKamar('Standard', 'Rp 1.000.000')">Pesan</button> --}}
            </div>
        @endforeach
        {{-- <!-- Kamar 1 -->
        <div class="room-box">
            <img src="asset/kamarstd.jpeg" alt="Kamar 1">
            <h3>Kamar A1</h3>
            <p>Rp 500.000 / bulan</p>
            <button class="facility-btn" onclick="window.location.href='/kamar/detail'">Info Fasilitas</button>
            <button onclick="pesanKamar('Standard', 'Rp 1.000.000')">Pesan</button>
        </div>
        <!-- Kamar 2 -->
        <div class="room-box">
            <img src="asset/kamarbiasa.jpeg" alt="Kamar 2">
            <h3>Kamar A2</h3>
            <p>Rp 600.000 / bulan</p>
            <button class="facility-btn" onclick="window.location.href='/infokamar2'">Info Fasilitas</button>
            <button onclick="pesanKamar('Deluxe', 'Rp 1.500.000')">Pesan</button>
        </div>
        <!-- Kamar 3 -->
        <div class="room-box">
            <img src="asset/kamar.jpeg" alt="Kamar 3">
            <h3>Kamar A3</h3>
            <p>Rp 680.000 / bulan</p>
            <button class="facility-btn" onclick="window.location.href='/infokamar3'">Info Fasilitas</button>
            <button onclick="pesanKamar('VIP', 'Rp 2.000.000')">Pesan</button>
        </div>
        <!-- Kamar 4 -->
        <div class="room-box">
            <img src="asset/kamarbiasa.jpeg" alt="Kamar 2">
            <h3>Kamar A4</h3>
            <p>Rp 750.000 / bulan</p>
            <button class="facility-btn" onclick="window.location.href='/infokamar2'">Info Fasilitas</button>
            <button onclick="pesanKamar('Deluxe', 'Rp 1.500.000')">Pesan</button>
        </div>
        <!-- Kamar 5 -->
        <div class="room-box">
            <img src="asset/kamarbiasa.jpeg" alt="Kamar 2">
            <h3>Kamar A5</h3>
            <p>Rp 800.000 / bulan</p>
            <button class="facility-btn" onclick="window.location.href='/infokamar2'">Info Fasilitas</button>
            <button onclick="pesanKamar('Deluxe', 'Rp 1.500.000')">Pesan</button>
        </div>
        <!-- Kamar 6-->
        <div class="room-box">
            <img src="asset/kamarbiasa.jpeg" alt="Kamar 2">
            <h3>Kamar A6</h3>
            <p>Rp 850.000 / bulan</p>
            <button class="facility-btn" onclick="window.location.href='/infokamar2'">Info Fasilitas</button>
            <button onclick="pesanKamar('Deluxe', 'Rp 1.500.000')">Pesan</button>
        </div>
        <!-- Kamar 7 -->
        <div class="room-box">
            <img src="asset/kamarbiasa.jpeg" alt="Kamar 2">
            <h3>Kamar A7</h3>
            <p>Rp 880.000 / bulan</p>
            <button class="facility-btn" onclick="window.location.href='/infokamar2'">Info Fasilitas</button>
            <button onclick="pesanKamar('Deluxe', 'Rp 1.500.000')">Pesan</button>
        </div>
        <!-- Kamar 8 -->
        <div class="room-box">
            <img src="asset/kamarbiasa.jpeg" alt="Kamar 2">
            <h3>Kamar A8</h3>
            <p>Rp 900.000 / bulan</p>
            <button class="facility-btn" onclick="window.location.href='/infokamar2'">Info Fasilitas</button>
            <button onclick="pesanKamar('Deluxe', 'Rp 1.500.000')">Pesan</button>
        </div>
        <!-- Kamar 9 -->
        <div class="room-box">
            <img src="asset/kamarbiasa.jpeg" alt="Kamar 2">
            <h3>Kamar A9</h3>
            <p>Rp 950.000 / bulan</p>
            <button class="facility-btn" onclick="window.location.href='/infokamar2'">Info Fasilitas</button>
            <button onclick="pesanKamar('Deluxe', 'Rp 1.500.000')">Pesan</button>
        </div>
        <!-- Kamar 10 -->
        <div class="room-box">
            <img src="asset/kamarbiasa.jpeg" alt="Kamar 2">
            <h3>Kamar A10</h3>
            <p>Rp 1.000.000 / bulan</p>
            <button class="facility-btn" onclick="window.location.href='/infokamar2'">Info Fasilitas</button>
            <button onclick="pesanKamar('Deluxe', 'Rp 1.500.000')">Pesan</button>
        </div> --}}
    </div>

@endsection
@push('script')
<script>
    function pesanKamar(tipeKamar, harga) {
        window.location.href = `pemesanan?tipeKamar=${encodeURIComponent(tipeKamar)}&harga=${encodeURIComponent(harga)}`;
    }
</script>
@endpush