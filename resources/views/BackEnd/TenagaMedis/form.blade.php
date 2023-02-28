<div class="card shadow mb-4" id="data_table">
    <div class="card-header d-sm-flex align-items-center justify-content-between py-3">
        <h6 class="m-0 font-weight-bold text-primary formTitle">Tambah Tenaga Medis</h6>
    </div>
    <div class="card-body">
        <form class="user" action="javascript:onSave()" method="post" id="formData" autocomplete="off">
            {{csrf_field()}}
            <input type="hidden" name="id" id="id">
            <div class="form-group row">
                <div class="col-sm-12 mb-3">
                    <label for="">Nama</label>
                    <input type="text" class="form-control " name="nama" id="nama" placeholder="Nama" required>
                </div>
                <div class="col-sm-12 mb-3">
                    <label for="">Keterangan</label>
                    <input type="text" class="form-control " name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" required>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="">Gambar <span id="btn-preview"></span></label>
                    <input type="file" name="file" id="file">

                </div>
            </div>
            <div class="form-group row mt-2">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block" name="simpan" value="simpan">
                        <i class="fas fa-save fa-fw"></i> Simpan
                    </button>
                </div>
                <div class="col-12 mt-2 btnBatal" style="display:none">
                    <button type="button" class="btn btn-danger btn-block" name="simpan" value="simpan" onclick="onReset()">
                        <i class="fas fa-arrow-left fa-fw"></i> Batalkan
                    </button>
                </div>
            </div>
        </form>
        
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

            </div>
        </div>
    </div>
</div>