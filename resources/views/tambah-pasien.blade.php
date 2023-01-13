@extends('master')
@foreach($metadatas as $metadata)
    @section('judul_halaman')
    {{ $metadata->Judul }}
    @endsection
    @section('deskripsi_halaman')
    {{ $metadata->Deskripsi }}
    @endsection
@endforeach
@section('konten')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Formulir Pasien Baru</h6>
    </div>
    <div class="card-body">
        <div class="card-body">
            <form class="user" action="{{ route('pasien.simpan') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control " name="Nama_Lengkap" placeholder="Nama Lengkap">
                    </div>
                    <div class="col-sm-2">
                        <label align="center" class="form-text">Tanggal lahir :</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="date" class="form-control " name="Tanggal_Lahir" placeholder="Tanggal lahir">
                    </div>
                </div>
                <div class="form-group">
                    <div class="">
                        <input type="text" class="form-control " name="NIK" placeholder="NIK">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control " name="Alamat_KTP" placeholder="Alamat KTP">

                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control " name="Alamat" placeholder="Alamat Domisili">
                    </div>
                </div>
                <div class="form-group">
                    <div class="">
                        <select class="form-control" name="Agama" id="Agama"></select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="">
                        <input type="text" class="form-control " name="Pekerjaan" placeholder="Pekerjaan">

                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control " name="no_handphone" placeholder="Nomer Handphone">
                </div>
                <div class="form-group">
                    <div class="">
                        <select class="form-control" name="Status_Pernikahan">
                            <option value="" selected disabled>Status Pernikahan</option>
                            <option value="0">Belum Menikah</option>
                            <option value="1">Sudah Menikah</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <select class="form-control " name="Jenis_Kelamin" placeholder="Jenis Kelamin">
                        <option value="" selected disabled>Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>

                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control " name="Golongan_Darah">
                        <option value="" selected disabled>Golongan Darah</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control " name="no_bpjs" placeholder="Nomer BPJS (Tidak Wajib)">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control " name="Penanggung_Jawab" placeholder="Penanggung Jawab">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control " name="No_Penanggung_Jawab"
                        placeholder="Nomer Handphone Penanggung Jawab">
                </div>
                <div class="form-group row">

                    <div class="col-sm-3">
                        <a href="{{ route('pasien') }}" class="btn btn-danger btn-block btn">
                            <i class="fas fa-arrow-left fa-fw"></i> Kembali
                        </a>
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary btn-block" name="simpan" value="simpan">
                            <i class="fas fa-save fa-fw"></i> Simpan
                        </button>
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-warning btn-block" name="simpan" value="simpan_baru">
                            <i class="fas fa-plus fa-fw"></i> Simpan Dan Buat Baru
                        </button>
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-success btn-block" name="simpan" value="simpan_rm">
                            <i class="fas fa-file fa-fw"></i> Simpan Dan Buka RM
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
  getAgama()

  function getAgama(){
    $.ajax({
      url: "{{ route('agama.select') }}",
      success: function(response){
        $('#Agama').empty().append(`<option value="" disabled selected>Agama</option>`)
        response.forEach(v => {
          $('#Agama').append(`<option value="${v.id}">${v.nama}</option>`)
        });
      }
    })
  }
</script>
@endsection
