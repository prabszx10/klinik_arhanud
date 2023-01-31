@extends('FrontEnd.master')

@section('style')
@include('FrontEnd.DaftarOnline.css')
@endsection

@section('content')
@include('FrontEnd.Layouts.navbar')

<div class="card_box">
    <h3>Antrian Saat Ini</h3>

    <div class="row antrian center">
            <div class="col-4">
                <div class="antrian_box">
                    <h2>Poli Gigi</h2>
                    <h4 class="no_antrian poli_gigi" id="no_saat_ini">0</h4>
                </div>
            </div>
            <div class="col-4">
                <div class="antrian_box">
                    <h2>Poli Umum</h2>
                    <h4 class="no_antrian poli_umum" id="no_saat_ini">0</h4>
                </div>
            </div>
            <div class="col-4">
                <div class="antrian_box">
                    <h2>Poli lorem</h2>
                    <h4 class="no_antrian" id="no_saat_ini">0</h4>
                </div>
            </div>
    </div>
    <div class="front_page" style="display:block">
        <h3>Pendaftaran Pasien</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore possimus sunt quisquam! Obcaecati, nobis?
            Incidunt animi impedit maiores molestias voluptates unde voluptatum iusto accusamus! At, maiores illo autem
            fugiat nemo officia vel sit similique ipsum quaerat illum molestiae aliquam? Similique!</p>

        <div class="button_choose">
            <button class="btn-primary" onclick="onshow('form_pasien')">Sudah Punya Akun</button>
            <button class="btn-success" onclick="onshow('form_registrasi')">Belum Punya Akun</button>
        </div>
    </div>

    <div class="form_registrasi" style="display: none">
        <h3>Registrasi Pasien</h3>
        <div class="card-body">
            <form class="user" id="form_registrasi" action="javascript:save()" method="post" autocomplete="off">
                {{ csrf_field() }}
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control " name="Nama_Lengkap" placeholder="Nama Lengkap">
                    </div>
                    <div class="col-sm-2">
                        <label align="center" class="form-text">Tanggal lahir :</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="date" class="form-control " name="Tanggal_Lahir" placeholder="Tanggal lahir">
                    </div>
                </div>
                <div class="form-group">
                    <div class="">
                        <input type="text" class="form-control " name="NIK" placeholder="NIK">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control " name="Alamat_KTP" placeholder="Alamat KTP">

                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control " name="Alamat" placeholder="Alamat Domisili">
                    </div>
                </div>
                <div class="form-group">
                    <div class="">
                        <select class="form-control" name="Agama" id="Agama"></select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="">
                        <input type="text" class="form-control " name="Pekerjaan" placeholder="Pekerjaan">

                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control " name="no_handphone" placeholder="Nomer Handphone">
                </div>
                <div class="form-group">
                    <div class="">
                        <select class="form-control" name="Status_Pernikahan">
                            <option value="" selected disabled>Status Pernikahan</option>
                            <option value="0">Belum Menikah</option>
                            <option value="1">Sudah Menikah</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <select class="form-control " name="Jenis_Kelamin" placeholder="Jenis Kelamin">
                        <option value="" selected disabled>Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>

                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control " name="Golongan_Darah">
                        <option value="" selected disabled>Golongan Darah</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control " name="no_bpjs" placeholder="Nomer BPJS (Tidak Wajib)">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control " name="Penanggung_Jawab" placeholder="Penanggung Jawab">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control " name="No_Penanggung_Jawab"
                        placeholder="Nomer Handphone Penanggung Jawab">
                </div>
                <div class="form-group row">

                    <div class="col-sm-6">
                        <a href="" onclick="onBack('form_registrasi')" class="btn btn-danger btn-block btn">
                            <i class="fas fa-arrow-left fa-fw"></i> Kembali
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-primary btn-block" name="simpan" value="simpan">
                            <i class="fas fa-save fa-fw"></i> Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="form_pasien" style="display: none">
        <h3>Pendaftaran Nomer Antrian Pasien</h3>
        <input type="text" class="form-control check_nik" id="check_NIK" placeholder="Masukan NIK...">
        <div class="center">
            <button class="btn btn-success" onclick="checkData()">Daftar</button>
        </div>
    </div>

    <div class="form_antrian" style="display: none">
        <h3>Hai, Selamat Datang <span class="pasien_nama"></span></h3>
        <div class="informasi_pasien">
            <div class="data_pribadi">
                <table>
                    <tr>
                        <td>Nama</td>
                        <td>: <span class="pasien_nama">Nama Lengkap</span></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>: <span class="pasien_nik">NIK</span></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>: <span class="pasien_alamat_ktp">Alamat Lengkap</span></td>
                    </tr>
                    <tr>
                        <td>No Telpon</td>
                        <td>: <span class="pasien_hp">No Telpon</span></td>
                    </tr>
                    <tr>
                        <td>No BPJS</td>
                        <td>: <span class="pasien_no_bpjs">BPJS</span></td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>: <span class="pasien_tgl_lhr">Tanggal Lahir</span></td>
                    </tr>
                </table>
            </div>
            <div class="no_antrian_pasien">
                <h2>No Antrian Anda</h2>
                <h4 class="no_antrian" id="no_anda">0</h4>
                <div class="daftar_antrian">
                    <div class="row">
                        <div class="col-8">
                            <input type="hidden" id="id_pasien">
                            <select class="form-control" name="poli_id" id="poli_id"></select>
                        </div>
                        <div class="col-4">
                            <button class="btn btn-success" onclick="daftarAntrian()" id="btn_daftar_antrian" style="width: 100%">Daftar
                                Antrian</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('FrontEnd.Layouts.footer')
@endsection

@section('javascript')
@include('FrontEnd.DaftarOnline.js')
@endsection
