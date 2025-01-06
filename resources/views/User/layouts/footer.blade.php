<footer class="bg-dark text-white py-3">
    <div class="container">
        <div class="row">
            <!-- Deskripsi -->
            <div class="col-md-4 text-center mb-2">
                <img src="asset/logokos.jpg" alt="Kos Rempah" class="img-fluid mb-2" style="max-width: 80px;">
                <p class="small">Aplikasi ini menawarkan berbagai pilihan kos dengan deskripsi yang lengkap.</p>
            </div>
            
            <!-- Quick Links -->
            <div class="col-md-3 mb-2">
                <h6>Quick Links</h6>
                <ul class="list-unstyled small">
                    <li><a href="{{ url('/') }}" class="text-white text-decoration-none">Home</a></li>
                    <li><a href="{{ url('/about-us') }}" class="text-white text-decoration-none">About Us</a></li>
                    <li><a href="{{ url('/kamar') }}" class="text-white text-decoration-none">Kamar</a></li>
                    <li><a href="{{ url('/booking') }}" class="text-white text-decoration-none">Booking</a></li>
                    <li><a href="{{ url('/contact') }}" class="text-white text-decoration-none">Contact</a></li>
                </ul>
            </div>
            
            <!-- Site Links -->
            <div class="col-md-3 mb-2">
                <h6>Site Links</h6>
                <ul class="list-unstyled small">
                    <li><a href="{{ url('/syarat-dan-ketentuan') }}" class="text-white text-decoration-none">Syarat dan Ketentuan</a></li>
                    <li><a href="{{ url('/aturan-pemakaian') }}" class="text-white text-decoration-none">Aturan Pemakaian</a></li>
                    <li><a href="{{ url('/hubungi-kami') }}" class="text-white text-decoration-none">Hubungi Kami</a></li>
                </ul>
            </div>
            
            <!-- Tetap Bersama Kami -->
            <div class="col-md-2 mb-2">
                <h6>Tetap Bersama Kami</h6>
                <ul class="list-unstyled small">
                    <li><a href="#" class="text-white text-decoration-none"><i class="fas fa-envelope"></i> KosRempah</a></li>
                    <li><a href="#" class="text-white text-decoration-none"><i class="fab fa-facebook"></i> KosRempah</a></li>
                    <li><a href="#" class="text-white text-decoration-none"><i class="fab fa-instagram"></i> KosRempah</a></li>
                </ul>
            </div>
        </div>
        <div class="text-center mt-3">
            <p class="small mb-0">Copyright © 2024 <a href="{{ url('/') }}" class="text-white text-decoration-none">Kos Rempah</a>. All Rights Reserved</p>
        </div>
    </div>
</footer>