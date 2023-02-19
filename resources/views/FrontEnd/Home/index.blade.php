<div class="section_home" id="section_home">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" id="list_carousel"></div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="section_daftar_online">
        <div class="flex_daftar_online">
            <div class="keterangan_daftar_online">
                <h1>Daftar Antrian Online Sekarang</h1>
                <div class="line"></div>
                <p>Klinik kami berusaha semaksimal mungkin untuk memberikan pelayanan terbaik bagi masyarakat, salah satunya pendaftaran online untuk pasien secara online. Anda dapat melakukan pendaftaran dengan mengklik tombol di bawah.</p>
                <button onclick="">Daftar Sekarang</button>
            </div>
            <img src="{{ asset('img/doctor_pasien_vector.jpg') }}" alt="" class="gambar_daftar_online">
        </div>
    </div>
    
    {{-- <div class="section layanan">
        <div class="row">
            <div class="title_content">
                <h1 class="mb-3">Poli Yang Tersedia</h1>
            </div>
            <div class="col-12">
                <div class="row d-flex justify-content-center layanan_content" id="list_poli">
                </div>
            </div>
        </div>
    
    </div> --}}
    
    {{-- <div class="section">
        <div class="row">
            <div class="col-2">
                <img src="{{ asset('img/fasilitas.jpeg') }}" alt="" srcset=""
                    class="image_fasilitas">
            </div>
            <div class="col-10">
                <div class="row">
                    <div class="col-6">
                        <h2 class="mb-3">Fasilitas Kami </h2>
                    </div>
                    <div class="col-6 text-right">
                        <a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators2 fasilitas_slider"
                            role="button" data-slide="prev">
                            <i class="fa fa-arrow-left"></i>
                        </a>
                        <a class="btn btn-primary mb-3 " href="#carouselExampleIndicators2 fasilitas_slider" role="button"
                            data-slide="next">
                            <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                    <div class="col-12">
                        <div id="carouselExampleIndicators2 fasilitas_slider" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner fasilitas_content" id="list_fasilitas"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>
