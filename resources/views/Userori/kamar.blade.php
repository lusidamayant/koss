@extends('user.layouts.app')
@section('css')
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    /* Background blur */
    body::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('asset/kos.jpeg') no-repeat center center/cover;
        filter: blur(10px);
        opacity: 0.7;
        z-index: -1;
    }

    h1 {
        text-align: center;
        color: brown;
        margin-top: 20px;
        font-size: 2em;
        animation: fadeInDown 1.2s ease forwards;
    }

    /* Kontainer kamar */
    .room-container {
        display: flex;
        justify-content: center;
        gap: 20px;
        flex-wrap: wrap;
        margin-top: 30px;
        width: 100%;
        max-width: 1200px;
    }

    /* Kartu kamar */
    .room-box {
        background-color: white;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        width: 280px;
        text-align: center;
        position: relative;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUp 1s ease forwards;
    }

    /* Efek hover pada kartu */
    .room-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
    }

    .room-box img {
        width: 100%;
        height: auto;
        border-radius: 10px;
    }

    .room-box h3 {
        color: #333;
        margin: 10px 0;
        font-size: 1.3em;
    }

    .room-box p {
        color: #555;
        margin: 5px 0;
    }

    /* Animasi tombol */
    .room-box button {
        padding: 10px;
        width: 100%;
        background-color: brown;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
        margin-top: 10px;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .room-box button:hover {
        background-color: darkred;
        transform: scale(1.05);
    }

    .facility-btn {
        background-color: gray;
    }

    .facility-btn:hover {
        background-color: darkgray;
    }

    /* Animasi */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeInDown {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection

@section('content')
<h1>Pemesanan Kamar Kos</h1>
    <div class="room-container">
        <div class="room-box" style="animation-delay: 0.2s;">
            <img src="asset/kamarstd.jpeg" alt="Kamar 1">
            <h3>Kamar 1 - Standard</h3>
            <p>Harga: Rp 1.000.000 / bulan</p>
            <button class="facility-btn" onclick="window.location.href='/kamar/detail'">Info Fasilitas</button>
            <button onclick="pesanKamar('Standard', 'Rp 1.000.000')">Pesan</button>
        </div>
        <div class="room-box" style="animation-delay: 0.4s;">
            <img src="asset/kamarbiasa.jpeg" alt="Kamar 2">
            <h3>Kamar 2 - Deluxe</h3>
            <p>Harga: Rp 1.500.000 / bulan</p>
            <button class="facility-btn" onclick="window.location.href='infokamar2'">Info Fasilitas</button>
            <button onclick="pesanKamar('Deluxe', 'Rp 1.500.000')">Pesan</button>
        </div>
        <div class="room-box" style="animation-delay: 0.6s;">
            <img src="asset/kamar.jpeg" alt="Kamar 3">
            <h3>Kamar 3 - VIP</h3>
            <p>Harga: Rp 2.000.000 / bulan</p>
            <button class="facility-btn" onclick="window.location.href='infokamar3'">Info Fasilitas</button>
            <button onclick="pesanKamar('VIP', 'Rp 2.000.000')">Pesan</button>
        </div>
    </div>
@endsection

@push('script')
<script>
    function pesanKamar(tipeKamar, harga) {
        window.location.href = `pemesanan?tipeKamar=${encodeURIComponent(tipeKamar)}&harga=${encodeURIComponent(harga)}`;
    }
</script>
@endpush