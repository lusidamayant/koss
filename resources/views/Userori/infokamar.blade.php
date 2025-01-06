<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kamar Kos</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url('{{ asset("asset/kamar.jpg") }}') no-repeat center center fixed;
            background-size: cover;
            overflow: hidden;
        }

        /* Menambahkan efek blur pada background */
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: inherit;
            filter: blur(8px); /* Tingkat keburaman */
            z-index: -1;
        }

        .card {
            width: 400px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            position: relative;
            margin: 20px;
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 1s forwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .card img:hover {
            transform: scale(1.05);
        }

        /* Tombol Kembali di dalam gambar pojok kiri atas */
        .back-button {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: darkred;
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-size: 20px;
            font-weight: bold;
            transition: background-color 0.3s ease;
            z-index: 1;
        }

        .back-button:hover {
            background-color: #8b0000;
        }

        .room-info {
            padding: 20px;
            animation: slideIn 0.8s ease forwards;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .room-info h2 {
            font-size: 22px;
            color: #333;
            margin-bottom: 10px;
        }

        .price {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin: 10px 0;
        }

        .facilities {
            font-size: 16px;
            color: #666;
            margin-top: 10px;
        }

        .facilities ul {
            list-style: none;
            padding-left: 10px;
        }

        .facilities li {
            margin-bottom: 8px;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 12px;
            text-align: center;
            background-color: darkred;
            color: white;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            margin-top: 20px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn:hover {
            background-color: #8b0000;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

<div class="card">
    <!-- Tombol Kembali di atas gambar pojok kiri atas -->
    <a href="{{url('/kamar')}}" class="back-button">←</a>
    
    <img src="{{ asset('asset/kamar.jpg') }}" alt="Kamar Kos">
    <div class="room-info">
        <h2>KM-001!</h2>
        <div class="price">Rp 1.000.000 / bulan</div>
        <p class="room-desc">Keterangan: Maksimal 2 Orang</p>
        <div class="facilities">
            <p>Fasilitas:</p>
            <ul>
                <li>1. Kamar mandi dalam</li>
                <li>2. Wi-Fi 350 Mbps</li>
                <li>3. Parkir luas</li>
                <li>4. Lemari pakaian</li>
                <li>5. Paket kasur</li>
            </ul>
        </div>
        <a href="{{ url('/pemesanan') }}" class="btn">Lanjut Pesan</a>
    </div>
</div>

</body>
</html>
