<div class="card shadow mb-4" id="data_form" style="display:none">
    <div class="card-header d-sm-flex align-items-center justify-content-between py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Agama</h6>
    </div>
    <div class="card-body">
        <form class="user" action="javascript:onSave()" method="post" id="formData" autocomplete="off">
            {{csrf_field()}}

            <input type="hidden" name="id_agama" id="id_agama">
            <div class="form-group row">
                <div class="col-sm-6 mb-3">
                    <label for="">Nama Agama</label>
                    <input type="text" class="form-control " name="nama_agama" id="nama_agama" placeholder="Nama Agama" required>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="">Status Agama</label>
                    <select name="status_agama" id="status_agama" class="form-control" required>
                        <option value="" disabled selected>Pilih Status</option>
                        <option value="1">Active</option>
                        <option value="0">Deactive</option>
                    </select>
                </div>
                <div class="col-sm-12 mb-5">
                    <label for="">Keterangan</label>
                    <textarea name="keterangan_agama" id="keterangan_agama" cols="30" rows="10" name="keterangan_agama" class="form-control " required></textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-6">
                    <a href="javascript:onAdd('back')" class="btn btn-danger btn-block btn">
                        <i class="fas fa-arrow-left fa-fw"></i> Kembali
                    </a>
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-primary btn-block" name="simpan" value="simpan">
                        <i class="fas fa-save fa-fw"></i> Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
