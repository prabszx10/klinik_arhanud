<nav class="navbar sticky-top navbar-expand-lg navbar-light">
    {{-- <a class="navbar-brand" href="#">Navbar</a> --}}
    <a class="navbar-brand" href="#" id="app_logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
        aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    {{-- <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-0 mt-2 mt-lg-0">
            <li class="nav-item isactive" id="beranda">
                <a class="nav-link" href="<?=URL::route('home');?>">Beranda <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item" id="tentangKami">
                <a class="nav-link" href="<?=URL::route('tentangKami');?>">Tentang Kami</a>
            </li>

            <li class="nav-item" id="tenagaMedis">
                <a class="nav-link" href="<?=URL::route('tenagaMedis');?>">Tenaga Medis</a>
            </li>

            <li class="nav-item" id="kegiatanBerita">
                <a class="nav-link" href="<?=URL::route('kegiatanDanBerita');?>">Kegiatan dan Berita</a>
            </li>

            <li class="nav-item" id="daftarOnline">
                <a class="nav-link" href="<?=URL::route('daftarOnline');?>">Daftar Online</a>
            </li>
        </ul>
    </div> --}}

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-0 mt-2 mt-lg-0">
            <li class="nav-item isactive" id="nav_section_home">
                <a class="nav-link" href="<?=URL::route('home');?>" onclick="scrollDiv('section_home'); return false;">Beranda</span></a>
            </li>

            <li class="nav-item" id="nav_section_tentang_kami">
                <a class="nav-link" href="#" onclick="scrollDiv('section_tentang_kami'); return false;">Tentang Kami</a>
            </li>

            <li class="nav-item" id="nav_section_tenaga_medis">
                <a class="nav-link" href="#" onclick="scrollDiv('section_tenaga_medis'); return false;">Tenaga Medis</a>
            </li>

            <li class="nav-item" id="nav_section_berita">
                <a class="nav-link" href="#" onclick="scrollDiv('section_berita'); return false;">Kegiatan dan Berita</a>
            </li>

            <li class="nav-item" id="daftarOnline">
                <a class="nav-link" href="<?=URL::route('daftarOnline');?>">Daftar Online</a>
            </li>
        </ul>
    </div>
</nav>