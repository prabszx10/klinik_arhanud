@extends('master')
@section('konten')

<div class="card shadow mb-4" id="data_table">
    <div class="card-header d-sm-flex align-items-center justify-content-between py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Antrian Pasien</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-4 p-3">
                <div class="card center">
                    <div class="card-body row bg-info text-light rounded">
                        <div class="col-8">
                            <h2 class="card-title">Poli Gigi</h2>
                            <a href="javascript:onAntrian('1','skip')" class="btn btn-danger">Lewati <span
                                    class="fa fa-times"></span></a>
                            <a href="javascript:onAntrian('1','next')" class="btn btn-success">Lanjut <span
                                    class="fa fa-chevron-right"></span></a>
                        </div>
                        <div class="col-4">
                            <input type="hidden" id="input_poli_1">
                            <h1 class="card-subtitle poli_gigi" style="font-size: 60px">0</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 p-3">
                <div class="card center">
                    <div class="card-body row bg-primary text-light rounded">
                        <div class="col-8">
                            <h2 class="card-title">Poli Umum</h2>
                            <a href="javascript:onAntrian('2','skip')" class="btn btn-danger">Lewati <span
                                    class="fa fa-times"></span></a>
                            <a href="javascript:onAntrian('2','next')" class="btn btn-success">Lanjut <span
                                    class="fa fa-chevron-right"></span></a>
                        </div>
                        <div class="col-4">
                            <input type="hidden" id="input_poli_2">
                            <h1 class="card-subtitle poli_umum" style="font-size: 60px">0</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 p-3">
                <div class="card center">
                    <div class="card-body row bg-secondary text-light rounded">
                        <div class="col-8">
                            <h2 class="card-title">Poli Lorem</h2>
                            <a href="#" class="btn btn-danger">Lewati <span class="fa fa-times"></span></a>
                            <a href="#" class="btn btn-success">Lanjut <span class="fa fa-chevron-right"></span></a>
                        </div>
                        <div class="col-4">
                            <h1 class="card-subtitle" style="font-size: 60px">0</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tab_table" onclick="getData('1')">Poli Gigi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab_table" onclick="getData('2')">Poli Umum</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab_table" onclick="">Poli Lorem</a>
            </li>
        </ul>
        <div class="tab-content mt-4">
            <div class="tab-pane active" id="tab_table">
                <div class="table-responsive" id="data_table">
                    <table id="example" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No Antrian</th>
                                <th>NO BPJS</th>
                                <th>Nama Pasien</th>
                                <th>Status Antrian</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody id="tableData"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="modal_detail" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <tr>
                        <td>Nama</td>
                        <td id="detail_nama">Nama</td>
                    </tr>
                    <tr>
                        <td>No BPJS</td>
                        <td id="detail_no_bpjs">No BPJS</td>
                    </tr>
                    <tr>
                        <td>NIK</td>
                        <td id="detail_nik">NIK</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td id="detail_jk">Jenis Kelamin</td>
                    </tr>
                    <tr>
                        <td>No HP</td>
                        <td id="detail_hp">No HP</td>
                    </tr>
                    <tr>
                        <td>Penanggung Jawab</td>
                        <td id="detail_penanggung_jawab">Penanggung Jawab</td>
                    </tr>
                    <tr>
                        <td>No HP Penanggung Jawab</td>
                        <td id="detail_no_telp_penanggung_jawab">No HP Penanggung Jawab</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

@include('BackEnd.Antrian.form')
@include('BackEnd.Antrian.js')
@endsection
