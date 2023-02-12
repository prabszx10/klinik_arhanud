@extends('master')
@section('konten')

<div class="card shadow mb-4" id="data_table">
    <div class="card-header d-sm-flex align-items-center justify-content-between py-3">
        <h6 class="m-0 font-weight-bold text-primary">Master Pasien</h6>
        <a href="javascript:onAdd()" class="d-none d-sm-inline-block btn btn-primary btn-sm shadow-sm">
            <i class="fas fa-plus fa-sm"></i> Tambah Data</a>
    </div>
    <div class="card-body">
        <div class="table-responsive" id="data_table">
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                      <th>No RM</th>
                      <th>Nama Lengkap</th>
                      <th>Usia</th>
                      <th>Jenis Kelamin</th>
                      <th>Alamat</th>
                      <th>No. Hp</th>
                      <th>Tindakan</th>
                    </tr>
                  </thead>
                <tbody id="tableData"></tbody>
            </table>
        </div>
    </div>
</div>

@include('BackEnd.Pasien.form')
@include('BackEnd.Pasien.js')
@endsection
