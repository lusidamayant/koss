<!DOCTYPE html>
<html lang="en">
<head>
    <title>Kos Rempah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Tambahkan link untuk font Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* Custom Styles */
        body {
            font-family: 'Poppins', sans-serif; /* Menggunakan font Poppins */
            font-size: 0.85rem; /* Ukuran font default lebih kecil */
        }

        .container {
            padding-left: 15px;
            padding-right: 15px;
            margin-bottom: 50px;
        }
        .custom-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }
        .custom-img:hover {
            transform: scale(1.05);
        }

        .justify-text {
            text-align: justify;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .footer-bg {
            background-color: #232323;
            color: white;
            padding: 30px 0;
            border-radius: 20px 20px 0 0;
        }

        .custom-box {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 30px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin: 0 auto;
        }
        .custom-box:hover {
            transform: translateY(-10px);
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.2);
        }

        .btn-booking {
            background-color: #646565;
            color: white;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .btn-booking:hover {
            background-color: #215a51;
            transform: scale(1.05);
        }
        /* Jarak antar elemen dalam row */
        .row {
            margin-left: 0;
            margin-right: 0;
        }

        /* Tambahkan jarak atas dan bawah jika diperlukan */
        .mt-5 {
            margin-top: 40px !important;
        }

        .fade-in {
            opacity: 0;
            animation: fadeIn 1s forwards;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        /* Mengatur ukuran font untuk heading */
        h1, h2, h3, h4, h5, h6 {
            font-size: 1rem;
            /* font-weight: bold; */
        }

        /* Mengatur ukuran font untuk paragraf */
        p {
            font-size: 0.9rem; /* Ukuran font paragraf lebih kecil */
        }

        footer {
            background-color: #343a40;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            overflow: hidden;
            font-size: 0.875rem; /* Ukuran font lebih kecil */
        }

        footer h6 {
            font-size: 0.9rem; /* Ukuran heading lebih kecil */
            font-weight: bold;
        }

        footer ul {
            padding-left: 0;
            margin-bottom: 0.5rem;
        }

        footer ul li {
            margin-bottom: 0.3rem;
        }

        footer ul li a:hover {
            text-decoration: underline;
        }

        footer img {
            max-width: 80px; /* Gambar lebih kecil */
        }

        footer p.small, footer ul li a {
            font-size: 0.75rem; /* Font teks kecil */
        }

        footer .text-center p {
            margin-top: 0.5rem;
            font-size: 0.75rem; /* Footer copyright lebih kecil */
        }

        .footer-bg {
            background-color: #232323;
            color: white;
            padding: 30px 0;
            border-radius: 20px 20px 0 0;
            margin-top: 50px; /* Menambah jarak ke atas */
        }

        /* Menggunakan font Poppins untuk seluruh halaman */
        body {
            font-family: 'Poppins', sans-serif;
        }

        /* Mengatur ukuran font di navbar */
        .navbar {
            font-size: 0.85rem; /* Menetapkan ukuran font menjadi 0.85rem */
        }

        .navbar-brand {
            font-size: 1rem; /* Ukuran font untuk brand, bisa disesuaikan */
        }

        .nav-link {
            font-size: 0.85rem; /* Ukuran font untuk item navbar */
            padding: 10px 15px; /* Menambah padding untuk item navbar */
        }

        .navbar-toggler {
            font-size: 1rem; /* Ukuran font untuk tombol toggle */
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

        .hero-section h1, .hero-section h2 {
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

        .room-box button, .room-box a {
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

        .room-box button:hover, .room-box a:hover {
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
    @yield('css')
</head>

<body>
    @include('sweetalert::alert')
    @include('user.layouts.navigasi')
    @yield('content')
    @include('user.layouts.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
@stack('script')
</body>
</html>