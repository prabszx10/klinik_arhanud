@extends('master')
@section('konten')

<div class="row">
    <div class="col-5">
        @include('BackEnd.TenagaMedis.form')
    </div>
    <div class="col-7">
        <div class="card shadow mb-4" id="data_table">
            <div class="card-header d-sm-flex align-items-center justify-content-between py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Tenaga Medis</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive" id="data_table">
                    <table id="example" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Preview</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody id="tableData"></tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</div>

@include('BackEnd.TenagaMedis.js')
@endsection
