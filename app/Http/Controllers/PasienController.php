<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;

class PasienController extends Controller
{
    //Halaman Utama Pasien
    public function index()
    {
        $metadatas = ambil_satudata('metadata',1);
        $pasiens = ambil_semuadata('pasien');
        return view('pasien',['pasiens'=> $pasiens],['metadatas'=>$metadatas]);
    }

    //Halaman tambah pasien baru
    public function tambah_pasien()
    {
        $metadatas = ambil_satudata('metadata',2);
        return view('tambah-pasien',['metadatas'=>$metadatas]);
    }
    
    //Hallaman Edit Pasien
        public function edit_pasien($id)
    {
        $metadatas = ambil_satudata('metadata',3);
        $datas= ambil_satudata('pasien',$id);
        if ($datas->count() <= 0) {
            return abort(404, 'Halaman Tidak Ditemukan.');
        }
        return view('edit-pasien',['metadatas'=>$metadatas],['datas'=>$datas]);
    }
    
    
    //Proses menyimpan pasien baru
    public function simpan_pasien(Request $request)
    { 
        $this->validate($request, [
            'Nama_Lengkap' => 'required|min:5|max:35',
            'Tanggal_Lahir' => 'required|before:today',
            // 'NIK' => 'required',
            'Alamat_KTP' => 'required',
            'Alamat' => 'required',
            'Agama' => 'required',
            'Pekerjaan' => 'required',
            'no_handphone' => 'required|numeric',
            'Status_Pernikahan' => 'required',
            'Jenis_Kelamin' => 'required',
            'Golongan_Darah' => 'required',
            'no_bpjs' => 'nullable|numeric|digits_between:1,15',
            'Penanggung_Jawab' => 'required',
            'No_Penanggung_Jawab' => 'required|numeric',
        ]);

        DB::table('pasien')->insert([
            'nama' => $request->Nama_Lengkap,
            'tgl_lhr' => $request->Tanggal_Lahir,
            'nik' => $request->NIK,
            'alamat_ktp' => $request->Alamat_KTP,
            'alamat' => $request->Alamat,
            'agama_id' => $request->Agama,
            'pekerjaan' => $request->Pekerjaan,
            'hp' => $request->no_handphone,
            'status_pernikahan' => $request->Status_Pernikahan,
            'jk' => $request->Jenis_Kelamin,
            'golongan_darah' => $request->Golongan_Darah,
            'no_bpjs' => $request->no_bpjs,
            'penanggung_jawab' => $request ->Penanggung_Jawab,
            'no_telp_penanggung_jawab' => $request ->No_Penanggung_Jawab,
            'created_time' => Carbon::now(),
            'updated_time' => Carbon::now(),
        ]);
           $ids= DB::table('pasien')->latest('created_time')->first();         
            switch($request->simpan) {
                case 'simpan': 
                    $buka=route('pasien.edit', $ids->id);
                    $pesan='Data pasien berhasil disimpan!';
                break;
                case 'simpan_rm': 
                    $buka=route('rm.list',$ids->id);
                    $pesan='Data pasien berhasil disimpan!';
                break;              
                case 'simpan_baru': 
                    $buka=route('pasien.tambah');
                    $pesan='Data pasien berhasil disimpan!';
                break;
            }
        return redirect($buka)->with('pesan',$pesan);
    }
    
        //Proses Update Pasien
        public function update_pasien(Request $request)
    {
            $this->validate($request, [
                'Nama_Lengkap' => 'required|min:5|max:35',
                'Tanggal_Lahir' => 'required|before:today',
                'Alamat' => 'required',
                'Pekerjaan' => 'required',
                'no_handphone' => 'required|numeric',
                'Jenis_Kelamin' => 'required',
                'no_bpjs' => 'nullable|numeric|digits_between:1,15'
            ]);
            
            DB::table('pasien')->where('id',$request->id)->update([
                'nama' => $request->Nama_Lengkap,
                'tgl_lhr' => $request->Tanggal_Lahir,
                'alamat' => $request->Alamat,
                'pekerjaan' => $request->Pekerjaan,
                'pendidikan' => $request->Pendidikan_terakhir,
                'hp' => $request->no_handphone,
                'jk' => $request->Jenis_Kelamin,
                'no_bpjs' => $request->no_bpjs,
                'alergi' => $request ->alergi,
                'updated_time' => Carbon::now(),
            ]);
     
            switch($request->simpan) {
                 case 'simpan': 
                    $buka=route('pasien.edit', $request->id);
                    $pesan='Data pasien berhasil disimpan!';
                break;
                case 'simpan_rm': 
                    $buka=route('rm.list',$request->id);
                    $pesan='Data pasien berhasil disimpan!';
                break;              
                case 'simpan_baru': 
                    $buka=route('pasien.tambah');
                    $pesan='Data pasien berhasil disimpan!';
                break;
            }
        return redirect($buka)->with('pesan',$pesan);
    }
    
        public function hapus_pasien($id)
    {
        DB::table('pasien')->where('id',$id)->update([
            'deleted' => 1,
        ]);
        $pesan="Data pasien berhasil dihapus!";
        return redirect(route("pasien"))->with('pesan',$pesan);
    }
    
}