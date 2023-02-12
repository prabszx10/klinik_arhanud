@extends('master')
@section('konten')

<div class="row">
    <div class="col-6">
        <div class="card shadow mb-4" id="data_table">
            <div class="card-header d-sm-flex align-items-center justify-content-between py-3">
                <h6 class="m-0 font-weight-bold text-primary">Visi Klinik</h6>
                <a href="javascript:onAdd('visi')" class="d-none d-sm-inline-block btn btn-primary btn-sm shadow-sm">
                    <i class="fas fa-plus fa-sm"></i> Tambah Data</a>
            </div>
            <div class="card-body">
                <form class="user" action="javascript:onSave('visi')" method="post" id="formDatavisi" autocomplete="off">
                    {{csrf_field()}}
                    <input type="hidden" name="id" id="id" value="visi">
                    <div id="list_visi"></div>
                    <div class="form-group row mt-2">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block" name="simpan" value="simpan">
                                <i class="fas fa-save fa-fw"></i> Simpan
                            </button>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card shadow mb-4" id="data_table">
            <div class="card-header d-sm-flex align-items-center justify-content-between py-3">
                <h6 class="m-0 font-weight-bold text-primary">Misi Klinik</h6>
                <a href="javascript:onAdd('misi')" class="d-none d-sm-inline-block btn btn-primary btn-sm shadow-sm">
                    <i class="fas fa-plus fa-sm"></i> Tambah Data</a>
            </div>
            <div class="card-body">
                <form class="user" action="javascript:onSave('misi')" method="post" id="formDatamisi" autocomplete="off">
                    {{csrf_field()}}
                    <input type="hidden" name="id" id="id" value="misi">
                    <div id="list_misi"></div>
                    <div class="form-group row mt-2">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block" name="simpan" value="simpan">
                                <i class="fas fa-save fa-fw"></i> Simpan
                            </button>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>

@include('BackEnd.TentangKami.VisiMisi.js')
@endsection
