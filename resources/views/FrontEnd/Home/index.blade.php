@extends('FrontEnd.master')

@section('style')
@include('FrontEnd.Home.css')
@endsection

@section('content')
@include('FrontEnd.Layouts.navbar')

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active slider_home">
            <img class="d-block w-100" src="{{ asset('img/home_rumah_sakit.jpg') }}"
                alt="First slide">
        </div>
        <div class="carousel-item slider_home">
            <img class="d-block w-100" src="{{ asset('img/fasilitas.jpeg') }}"
                alt="Second slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="section layanan">
    <div class="row">
        <div class="title_content">
            <h1 class="mb-3">Poli Yang Tersedia</h1>
        </div>
        <div class="col-12">
            <div class="row d-flex justify-content-center layanan_content">
            </div>
        </div>
    </div>

</div>

<div class="section">
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
                        <div class="carousel-inner fasilitas_content"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section_spacer">
    <h3>Visi Kami</h3>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa voluptas quibusdam, blanditiis nemo dolorem
        dignissimos.</p>
</div>

<div class="section">
    <div class="row">
        <div class="col-8">
            <div class="row">
                <div class="col-6">
                    <h2 class="mb-3">Kegiatan Dan Berita</h2>
                </div>
                <div class="col-6 text-right">
                    <a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators2 berita_slider" role="button"
                        data-slide="prev">
                        <i class="fa fa-arrow-left"></i>
                    </a>
                    <a class="btn btn-primary mb-3 " href="#carouselExampleIndicators2 berita_slider" role="button"
                        data-slide="next">
                        <i class="fa fa-arrow-right"></i>
                    </a>
                </div>
                <div class="col-12">
                    <div id="carouselExampleIndicators2 berita_slider" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner berita_content"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <img src="{{ asset('img/avatars/default.jpg') }}" alt="" srcset=""
                class="image_fasilitas">
        </div>
    </div>


</div>

@include('FrontEnd.Layouts.footer')
@endsection

@section('javascript')
@include('FrontEnd.Home.js')
@endsection
