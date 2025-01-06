@extends('user.layouts.app')
@section('css')
<style>
    /* Style untuk membuat lekukan halus pada gambar dan footer */
    .custom-img {
        width: 100%; 
        height: 200px; 
        object-fit: cover; 
        border-radius: 10px;
        transition: transform 0.3s ease; /* Animasi zoom pada gambar */
    }
    .custom-img:hover {
        transform: scale(1.05); /* Memperbesar gambar saat hover */
    }

    .justify-text {
        text-align: justify; 
        line-height: 1.5; 
        margin-bottom: 20px; 
    }

    .footer-bg {
        background-color: #232323;
        color: white;
        padding: 20px 0;
        border-radius: 20px 20px 0 0;
        margin: 0 auto;
        max-width: 2000px;
        position: relative; /* Menambahkan relative position */
        bottom: 0; /* Agar footer selalu berada di bawah */
        width: 100%;
        animation: fadeInFooter 2s ease-out;
    }

    /* Animasi fade-in footer */
    @keyframes fadeInFooter {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    .custom-box {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        padding: 15px;
        margin-bottom: 20px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .custom-box:hover {
        transform: translateY(-10px);
        box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.2);
    }

    .nav-item a {
        color: rgb(154, 154, 154);
        transition: all 0.3s ease;
        position: relative;
    }
    .nav-item a::after {
        content: "";
        position: absolute;
        width: 0;
        height: 2px;
        background-color: rgb(53, 53, 53);
        left: 0;
        bottom: -3px;
        transition: width 0.3s;
    }
    .nav-item a:hover::after {
        width: 100%;
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

    .fade-in {
        opacity: 0;
        animation: fadeIn 1s forwards;
    }
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
</style>
@endsection
@section('content')
<section id="header-1" style="position: relative;">
    <div class="container col-xxl-8 px-4 py-5 text-center">
        <div class="row justify-content-center">
            <div class="col-12 text-center fade-in" style="animation-delay: 0.2s;">
                <img src="{{ asset('asset/logokosrempah.jpg') }}" alt="Gambar Kost" style="width: 155%; height: 400px; padding: 0; margin-left: -70%; margin-right: -70%; border-radius: 10px;">
            </div>
        </div>
    </div>

    <div class="row justify-content-center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <div class="col-12 col-md-4 text-center">
            <img src="asset/logokos.jpg" alt="Logo Kos Rempah" class="rounded-circle" width="150" height="150">
        </div>
        <div class="input-group" style="margin-top: 20px;">
            <span class="input-group-text">
                <i class="fas fa-search" style="color: black;"></i>
            </span>
            <input type="text" class="form-control" placeholder="Kost Eksklusif untuk Anda!" aria-label="Cari Kost">
        </div>
    </div>
</section>

<div class="container">
    <div class="row text-center">
        <div class="col-12 col-md-6 col-lg-3 custom-box fade-in" style="animation-delay: 0.4s;">
            <p class="justify-text">
                Apakah kamu sedang mencari kos untuk tempat tinggal sementara? Wahhh jawaban anda sudah terjawab di kos kami, berbagai fasilitas lengkap yang kami sediakan untuk anda so..
            </p>
            <a href="{{ url('/login') }}" class="btn btn-lg px-4 me-md-10 btn-booking">
                <p style="margin: 0; line-height: 1;">BOOKING</p>
                <p style="margin: 0; line-height: 1;">NOW</p>
            </a>
            
        </div>
        
        <div class="col-12 col-md-6 col-lg-3 custom-box fade-in" style="animation-delay: 0.6s;">
            <img class="custom-img" src="asset/kamar.jpg" alt="Kamar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Double click disini untuk mengganti gambar ini">
            <h4>Kamar</h4>
        </div>
        
        <div class="col-12 col-md-6 col-lg-3 custom-box fade-in" style="animation-delay: 0.8s;">
            <img class="custom-img" src="asset/teras.jpg" alt="Teras" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Double click disini untuk mengganti gambar ini">
            <h4>Teras</h4>
        </div>
        
        <div class="col-12 col-md-6 col-lg-3 custom-box fade-in" style="animation-delay: 1s;">
            <img class="custom-img" src="asset/dapur.jpg" alt="Dapur" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Double click disini untuk mengganti gambar ini">
            <h4>Dapur</h4>
        </div>
    </div>
</div>
@endsection