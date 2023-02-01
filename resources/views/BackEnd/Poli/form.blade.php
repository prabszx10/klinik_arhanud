<div class="card shadow mb-4" id="data_form" style="display:none">
    <div class="card-header d-sm-flex align-items-center justify-content-between py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Poli</h6>
    </div>
    <div class="card-body">
        <form class="user" action="javascript:onSave()" method="post" id="formData" autocomplete="off">
            {{csrf_field()}}

            <input type="hidden" name="id_poli" id="id_poli">
            <div class="form-group row">
                <div class="col-sm-12 mb-3">
                    <label for="">Nama Poli</label>
                    <input type="text" class="form-control " name="nama_poli" id="nama_poli" placeholder="Nama Poli" required>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="">Kode Poli</label>
                    <input type="text" class="form-control " name="kode_poli" id="kode_poli" placeholder="Kode Poli" required>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="">Status Poli</label>
                    <select name="status_poli" id="status_poli" class="form-control" required>
                        <option value="" disabled selected>Pilih Status</option>
                        <option value="1">Active</option>
                        <option value="0">Deactive</option>
                    </select>
                </div>
                <div class="col-sm-12 mb-5">
                    <label for="">Keterangan</label>
                    <textarea name="keterangan_poli" id="keterangan_poli" cols="30" rows="10" name="keterangan_poli" class="form-control " required></textarea>
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
