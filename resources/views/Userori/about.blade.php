<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Kos Rempah</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            font: 'Montserrat', sans-serif;
            background: linear-gradient(135deg, #f3f4f6, #e8ecef);
            margin: 0;
            padding: 0;
        }
        .header {
            text-align: center;
            margin-bottom: 40px;
        }
        .content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
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
        }
        .text-section p {
            color: #555;
            line-height: 1.8;
            /* font-size: 16px; */
        }
        .rules {
            margin-top: 30px;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .rules h2 {
            margin-bottom: 15px;
            color: #333;
        }
        .rules ol {
            color: #555;
        }
        .rules ol li {
            margin-bottom: 10px;
            /* font-size: 16px; */
        }
        footer {
            text-align: center;
            padding: 20px;
            color: black;
            margin-top: 40px;
        }
    </style>
</head>
@include('user.navigasi')

<body>
    <div class="container">
        <div class="header">
            <h1>About Us</h1>
            <p>Menyediakan kenyamanan dan kemudahan bagi penghuni kos Rempah</p>
        </div>

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
    @include('user.footer')
    <footer>
        © 2024 Kos Rempah. All Rights Reserved.
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</body>

</html>
