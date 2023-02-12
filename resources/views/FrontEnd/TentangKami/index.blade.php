@extends('FrontEnd.master')

@section('style')
@include('FrontEnd.TentangKami.css')
@endsection

@section('content')
@include('FrontEnd.Layouts.navbar')

<div class="section_tentang_kami">
    <div class="title_content center">
        <h1 class="mb-3">Tentang Kami</h1>
    </div>
    <div class="informasi_singkat">
        <h2>Hai, Kawan Sudah Kenal Dengan  Klinik Puspendik Kota Batu? Berikut Penjelasan Singkatnya</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium reprehenderit sequi explicabo consequatur rem consequuntur fugit perferendis nesciunt, est amet eligendi, a nihil quidem ad non odio accusamus sint excepturi, recusandae blanditiis earum? Culpa aliquam <br>eius in corrupti eveniet nihil quis iste ipsum distinctio. Minima deleniti, ratione blanditiis doloremque, alias temporibus vitae ducimus ipsum provident optio aut laborum accusamus modi tenetur facilis corrupti. Et atque quibusdam consectetur saepe, velit quia soluta vitae iure eaque, animi sapiente voluptas sint blanditiis! Fugit!</p>
    </div>
    <div class="visi_misi">
        <div class="visi">
            <h2>Visi</h2>
        </div>
        <div class="misi">
            <h2>Misi</h2>
        </div>
    </div>
    <div class="fasilitas">
        <h2>Fasilitas yang Dimiliki Oleh Klinik Arhanud</h2>
        <div class="listFasilitas">
            <div class="list_item">
                <img src="" alt="">
                <h5></h5>
            </div>
        </div>
    </div>
    <div class="layanan">
        <div class="listLayanan">
            <div class="list_item">
                <img src="" alt="">
                <h5></h5>
            </div>
        </div>
        <h2>Layanan yang Dimiliki Oleh Klinik Arhanud</h2>
    </div>
    <div class="lokasi">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.990674647291!2d112.57993051529753!3d-7.896042094311605!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7881884b87a67f%3A0x3919ffaa275f25f7!2sKLINIK%20PUSDIK%20ARHANUD!5e0!3m2!1sen!2sid!4v1676051620594!5m2!1sen!2sid" width="100%" height="300" style="border:0;border-radius:10px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div>
            <h2>Lokasi Klinik Arhanud Kota Batu</h2>
            <p>Klinik Arhanud Kota Batu terletak di Pendem, Kec. Junrejo, Kota Batu, Jawa Timur dengan Kode Pos 65324</p>
        </div>
    </div>
    <div class="mitra">
        <h2>Beberapa Kemitraan Yang Memiliki Kerja Sama <br>Bersama Klinik Arhanud Kota Batu</h2>
    </div>
</div>

@include('FrontEnd.Layouts.footer')
@endsection

@section('javascript')
@include('FrontEnd.TentangKami.js')
@endsection
