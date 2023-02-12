@extends('FrontEnd.master')

@section('style')
@include('FrontEnd.TenagaMedis.css')
@endsection

@section('content')
@include('FrontEnd.Layouts.navbar')

<div class="section_tenaga_medis">
    <div class="title_content">
        <h1 class="mb-3">Tenaga Medis</h1>
        {{-- <h5>Tenaga Medis yang Dimiliki Klinik Arhanud memiliki sertifikasi dan memiliki komptensi yang baik dibagiannya masing-masing dan selalu berkeinginan untuk memberikan pelayanan terbaik dan pengalaman yang terbaik kepada setiap pasien yang datang ke Klinik Arhanud Kota Batu.</h5> --}}
    </div>
    <div class="dokter">
        <h2>Dokter yang Tersedia</h2>
        <div class="row">

            <div class="col-md-4 mb-3">
                <div class="card">
                    <img class="img-fluid" alt="100%x280"
                        src="https://images.unsplash.com/photo-1532781914607-2031eca2f00d?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=7c625ea379640da3ef2e24f20df7ce8d">
                    <div class="card-body">
                        <h4 class="card-title">Special title treatment</h4>
                        <p class="card-text">With supporting text below as a natural lead-in to
                            additional content.</p>

                    </div>

                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img class="img-fluid" alt="100%x280"
                        src="https://images.unsplash.com/photo-1517760444937-f6397edcbbcd?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=42b2d9ae6feb9c4ff98b9133addfb698">
                    <div class="card-body">
                        <h4 class="card-title">Special title treatment</h4>
                        <p class="card-text">With supporting text below as a natural lead-in to
                            additional content.</p>

                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img class="img-fluid" alt="100%x280"
                        src="https://images.unsplash.com/photo-1532712938310-34cb3982ef74?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=3d2e8a2039c06dd26db977fe6ac6186a">
                    <div class="card-body">
                        <h4 class="card-title">Special title treatment</h4>
                        <p class="card-text">With supporting text below as a natural lead-in to
                            additional content.</p>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="perawat">
        <h2>Perawat yang Tersedia</h2>
        <div class="row">

            <div class="col-md-4 mb-3">
                <div class="card">
                    <img class="img-fluid" alt="100%x280"
                        src="https://images.unsplash.com/photo-1532781914607-2031eca2f00d?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=7c625ea379640da3ef2e24f20df7ce8d">
                    <div class="card-body">
                        <h4 class="card-title">Special title treatment</h4>
                        <p class="card-text">With supporting text below as a natural lead-in to
                            additional content.</p>

                    </div>

                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img class="img-fluid" alt="100%x280"
                        src="https://images.unsplash.com/photo-1517760444937-f6397edcbbcd?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=42b2d9ae6feb9c4ff98b9133addfb698">
                    <div class="card-body">
                        <h4 class="card-title">Special title treatment</h4>
                        <p class="card-text">With supporting text below as a natural lead-in to
                            additional content.</p>

                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img class="img-fluid" alt="100%x280"
                        src="https://images.unsplash.com/photo-1532712938310-34cb3982ef74?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=3d2e8a2039c06dd26db977fe6ac6186a">
                    <div class="card-body">
                        <h4 class="card-title">Special title treatment</h4>
                        <p class="card-text">With supporting text below as a natural lead-in to
                            additional content.</p>

                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
@include('FrontEnd.Layouts.footer')
@endsection

@section('javascript')
@include('FrontEnd.TenagaMedis.js')
@endsection

