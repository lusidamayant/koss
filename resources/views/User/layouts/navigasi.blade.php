<section id="navbar-1">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="GW_Editable container-fluid" id="Id-div-0">
            <a class="navbar-brand" href="#">Kos Rempah</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-1" aria-controls="navbarSupportedContent-1" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent-1">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/kamar') }}">Kamar</a>
                    </li>
                    @if(auth('customer')->check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/pemesanan') }}">Pesanan Saya</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-danger" href="{{ url('/logout') }}">Logout</a>
                        </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/login') }}">Login</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</section>
