<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Kamar Kos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        /* Style dasar */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            overflow-y: auto; /* Memastikan halaman bisa di-scroll secara vertikal */
        }

        .hero-section {
            background-image: url('asset/bgkos.jpg');
            background-size: cover;
            background-position: center;
            height: 350px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            position: relative;
            padding-bottom: 30px; /* Menambahkan padding di bawah hero untuk memberi jarak */
            border-radius: 10px; /* Menambahkan border-radius untuk membulatkan ujung */
            overflow: hidden; /* Mencegah bagian yang terkeluar dari pembulatan */
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
        }

        .hero-section h1 {
            font-size: 3.5rem;
            font-weight: bold;
            z-index: 1;
            position: relative;
            text-align: center;
        }

        /* Kontainer kamar */
        .room-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between; /* Memberi jarak di antara kartu */
        padding: 20px;
        gap: 15px; /* Jarak antar-kartu */
        }

        /* Kartu kamar */
        .room-box{
        background-color: white;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        width: calc(20% - 15px); /* Membagi 100% menjadi 5 kartu dengan jarak */
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        /* Efek hover pada kartu */
        .room-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .room-box img {
            width: 100%;
            height: auto;
            border-radius: 6px;
        }

        .room-box h3 {
            color: #333;
            margin: 8px 0;
            font-size: 1.1em; /* Ukuran lebih kecil */
        }

        .room-box p {
            color: #555;
            margin: 5px 0;
            font-size: 0.9em; /* Ukuran lebih kecil */
        }

        .room-box button {
            padding: 8px;
            width: 100%;
            background-color: #646565;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 8px;
            font-size: 0.9em; /* Ukuran tombol lebih kecil */
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .room-box button:hover {
            background-color: #215a51;
            transform: scale(1.05);
        }

        .facility-btn {
            background-color: #646565;
        }

        .facility-btn:hover {
            background-color: #215a51;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 15px;
            background-color: #333;
            color: white;
            margin-top: 20px;
        }

        @media (max-width: 1200px) {
        .room-box {
            width: calc(33.33% - 15px); /* 3 kartu per baris */
        }
    }

    @media (max-width: 768px) {
        .room-box {
            width: calc(50% - 15px); /* 2 kartu per baris */
        }
    }

    @media (max-width: 576px) {
        .room-box {
            width: calc(100% - 15px); /* 1 kartu per baris */
        }
    }
    </style>
</head>
<body>
    @include('user.navigasi')
    <!-- Hero Section -->
    <section class="hero-section">
        <h1>KAMAR KOS</h1>
    </section>
    <div class="room-container">
        <!-- Kamar 1 -->
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
        </div>
    </div>

    <script>
        function pesanKamar(tipeKamar, harga) {
            window.location.href = `pemesanan?tipeKamar=${encodeURIComponent(tipeKamar)}&harga=${encodeURIComponent(harga)}`;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    @include('user.footer')

</body>
</html>
