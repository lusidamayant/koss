<style>
    .custom-img {
            width: 100%; 
            height: 200px; 
            object-fit: cover; 
            border-radius: 10px;
            transition: transform 0.3s ease; /* Animasi zoom pada gambar */
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
</style>
        <footer class="footer-bg text-center fade-in" style="animation-delay: 1.2s;">
        <div class="container py-4">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ asset('asset/logokosrempah.jpg') }}" alt="KosRempah" style="width: 100px;">
                    <p>Aplikasi ini menawarkan berbagai pilihan kos dengan deskripsi yang lengkap. KosRempah juga memiliki fitur pencarian yang memudahkan kamu mencari kos sesuai kebutuhan.</p>
                </div>
                <div class="col-md-3">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light">Home</a></li>
                        <li><a href="#" class="text-light">About Us</a></li>
                        <li><a href="#" class="text-light">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Site Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light">Syarat dan Ketentuan</a></li>
                        <li><a href="#" class="text-light">Aturan Pemakaian</a></li>
                        <li><a href="#" class="text-light">Hubungi Kami</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Tetap Bersama Kami</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light"><i class="fas fa-envelope"></i> KosRempah</a></li>
                        <li><a href="#" class="text-light"><i class="fab fa-facebook"></i> KosRempah</a></li>
                        <li><a href="#" class="text-light"><i class="fab fa-instagram"></i> KosRempah</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>