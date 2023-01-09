<nav class="navbar sticky-top navbar-expand-lg navbar-light">
    {{-- <a class="navbar-brand" href="#">Navbar</a> --}}
    <a class="navbar-brand" href="#"><img src="{{asset('img/arhanud_logo.png')}}" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
        aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-0 mt-2 mt-lg-0">
            <li class="nav-item isactive">
                <a class="nav-link" href="<?=URL::route('home');?>">Beranda <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">     
                    Tentang Kami
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Profil</a>
                    <a class="dropdown-item" href="#">Pencapaian</a>
                    <a class="dropdown-item" href="#">Mitra</a>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?=URL::route('fasilitas');?>">Fasilitas Dan Layanan</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">     
                    Layanan Unggulan
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">     
                    Klinik
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Profil</a>
                    <a class="dropdown-item" href="#">Pencapaian</a>
                    <a class="dropdown-item" href="#">Mitra</a>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">Cari Dokter</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">FAQS</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">Kegiatan dan Berita</a>
            </li>
        </ul>
    </div>
</nav>