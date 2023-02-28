@extends('master')
@section('konten')

<div class="card shadow mb-4" id="data_table">
    <div class="card-header d-sm-flex align-items-center justify-content-between py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Antrian Pasien</h6>
    </div>
    <div class="card-body">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tab_antrian" onclick="onShowTab('')">Antrian Hari Ini</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab_antrian" onclick="onShowTab('history')">Riwayat Antrian</a>
            </li>
        </ul>
        <div class="tab-content mt-4">
            <div class="tab-pane active" id="tab_table">
                <div class="row" id="antrian_list"></div>
        
                <ul class="nav nav-tabs" id='poli_tab'></ul>
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

@include('BackEnd.Antrian.js')
@endsection
