<div class="card shadow mb-4" id="data_form" style="display:block">
    <div class="card-header d-sm-flex align-items-center justify-content-between py-3">
        <h6 class="m-0 font-weight-bold text-primary">Informasi Klinik</h6>
    </div>
    <div class="card-body">
        <form class="user" action="javascript:onSave()" method="post" id="formData" autocomplete="off">
            {{csrf_field()}}

            <input type="hidden" name="id_informasi_klinik" id="id_informasi_klinik" value="informasi_klinik">
            <div class="form-group row">
                <div class="col-sm-12 mb-5">
                    <textarea name="keterangan_informasi_klinik" id="keterangan_informasi_klinik" cols="30" rows="10" class="form-control " required></textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block" name="simpan" value="simpan">
                        <i class="fas fa-save fa-fw"></i> Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
