<div class="card shadow mb-4" id="data_form" style="display:none">
    <div class="card-header d-sm-flex align-items-center justify-content-between py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah pasien</h6>
    </div>
    <div class="card-body">
        <form class="user" action="javascript:onSave()" method="post" id="formData" autocomplete="off">
            {{csrf_field()}}

            <input type="hidden" name="id_pasien"  id="pasien">
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control " name="nama_pasien" id="nama_pasien" placeholder="Nama Lengkap">
                </div>
                <div class="col-sm-2">
                    <label align="center" class="form-text">Tanggal lahir :</label>
                </div>
                <div class="col-sm-4">
                    <input type="date" class="form-control " name="tgl_lhr_pasien" id="tgl_lhr_pasien" placeholder="Tanggal lahir">
                </div>
            </div>
            <div class="form-group">
                <div class="">
                    <input type="text" class="form-control " name="nik_pasien" id="nik_pasien" placeholder="NIK">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control " name="alamat_ktp_pasien" id="alamat_ktp_pasien" placeholder="Alamat KTP">

                </div>
                <div class="col-sm-6">
                    <input type="text" class="form-control " name="alamat_pasien" id="alamat_pasien" placeholder="Alamat Domisili">
                </div>
            </div>
            <div class="form-group">
                <div class="">
                    <select class="form-control" name="agama_id_pasien" id="agama_id_pasien"></select>
                </div>
            </div>
            <div class="form-group">
                <div class="">
                    <input type="text" class="form-control " name="pekerjaan_pasien" id="pekerjaan_pasien" placeholder="Pekerjaan">

                </div>
            </div>
            <div class="form-group">
                <input type="text" class="form-control " name="hp_pasien" id="hp_pasien" placeholder="Nomer Handphone">
            </div>
            <div class="form-group">
                <div class="">
                    <select class="form-control" name="status_pernikahan_pasien" id="status_pernikahan_pasien">
                        <option value="" selected disabled>Status Pernikahan</option>
                        <option value="0">Belum Menikah</option>
                        <option value="1">Sudah Menikah</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <select class="form-control " name="jk_pasien"  id="jk_pasien" placeholder="Jenis Kelamin">
                    <option value="" selected disabled>Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>

                </select>
            </div>
            <div class="form-group">
                <select class="form-control " name="golongan_darah_pasien" id="golongan_darah_pasien">
                    <option value="" selected disabled>Golongan Darah</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="AB">AB</option>
                    <option value="O">O</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control " name="no_bpjs_pasien" id="no_bpjs_pasien" placeholder="Nomer BPJS (Tidak Wajib)">
            </div>
            <div class="form-group">
                <input type="text" class="form-control " name="penanggung_jawab_pasien" id="penanggung_jawab_pasien" placeholder="Penanggung Jawab">
            </div>
            <div class="form-group">
                <input type="text" class="form-control " name="no_telp_penanggung_jawab_pasien" id="no_telp_penanggung_jawab_pasien"
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
