
@extends('user.layouts.app')
@section('css')
<style>
    body {
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
        background: linear-gradient(135deg, #f3f4f6, #e8ecef);
        margin: 0;
        padding: 0;
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

    .hero-section p {
        font-size: 1.5em;
        font-weight: bold;
        z-index: 1;
        position: relative;
        text-align: center; /* Menjaga teks tetap di tengah */
        margin-top: 10px;
    }

    .content {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin-top: 30px;
    }

    .image-carousel {
        flex-basis: 40%;
        position: relative;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .image-carousel img {
        width: 100%;
        height: auto;
        transition: transform 0.5s ease;
    }

    .image-carousel img:hover {
        transform: scale(1.05);
    }

    .text-section {
        flex-basis: 55%;
        padding: 20px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .text-section h2 {
        color: #333;
        margin-bottom: 20px;
        font-size: 18px;
    }

    .text-section p {
        color: #555;
        line-height: 1.8;
    }

    .rules {
        margin-top: 30px;
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-top: 30px; /* Spasi atas */
        margin-bottom: 30px; /* Spasi bawah */
    }

    .rules h2 {
        margin-bottom: 20px; /* Spasi bawah pada judul */
        color: #333;
        font-size: 18px;
    }

    .rules ol {
        color: #555;
        font-size: 16px;
        line-height: 1.8;
    }

    footer {
        text-align: center;
        padding: 20px;
        color: black;
        margin-top: 40px;
        font-size: 12px;
    }
</style>
@endsection
@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <h1>ABOUT US</h1>
    </section>

    <div class="px-5">
        <div class="content">
            <!-- Carousel untuk gambar bergulir -->
            <div class="image-carousel">
                <div id="kosCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="asset/atipe.jpg" alt="Gambar Kos 1">
                        </div>
                        <div class="carousel-item">
                            <img src="asset/btipe.jpeg.jpg" alt="Gambar Kos 2">
                        </div>
                        <div class="carousel-item">
                            <img src="asset/ctipe.jpg" alt="Gambar Kos 3">
                        </div>
                    </div>
                    <!-- Navigasi carousel -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#kosCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#kosCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <div class="text-section">
                <h2>Tentang Kos Rempah</h2>
                <p>Kos Rempah menyediakan hunian nyaman dan strategis bagi para penyewa. Dengan fasilitas lengkap serta lingkungan yang aman dan bersih, Kos Rempah menjadi pilihan ideal bagi mahasiswa, pekerja, dan keluarga kecil.</p>
                <p>Lokasi kami yang dekat dengan pusat kota dan transportasi umum menjadikan Kos Rempah sangat mudah diakses. Kami berkomitmen untuk memberikan suasana tempat tinggal yang ramah dan nyaman, sehingga Anda dapat merasa seperti di rumah sendiri.</p>
            </div>
        </div>

        <div class="rules">
            <h2>Peraturan dan Tata Tertib</h2>
            <ol>
                <li>Dilarang menginap lebih dari satu tamu tanpa izin pengelola kos.</li>
                <li>Dilarang membawa hewan peliharaan tanpa izin khusus.</li>
                <li>Penggunaan listrik harus bijak, konsumsi berlebih akan dikenakan biaya tambahan.</li>
                <li>Jaga kebersihan lingkungan kos dan fasilitas bersama.</li>
                <li>Kegiatan yang menimbulkan kebisingan harus dihindari.</li>
            </ol>
        </div>
    </div>
    
@endsection