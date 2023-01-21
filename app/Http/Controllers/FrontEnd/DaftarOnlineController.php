<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class DaftarOnlineController extends BaseController
{
    use ValidatesRequests;

    public function index(){
        return view('FrontEnd/DaftarOnline/index');
    }

    public function registrasi(Request $request)
    { 
        try {
            $validate = $this->validate($request, [
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
            ]);

            $insert = DB::table('pasien')->insert([
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

            if($insert){
                $operation = array(
                    'success' => true,
                    'message' => 'Data Berhasil Disimpan',
                    'data' => $request->all()
                );
            } else{
                $operation = array(
                    'success' => "error",
                    'message' => 'Data Gagal Disimpan',
                    'data' => $request->all()
                );
            }

        } catch (\Exception $e) {
            $operation = array(
                'success' => false,
                'message' => 'Isi Semua Data Anda dan Perhatikan Format Data Anda'
            );
        }

        return $operation;
    }

    public function check_pasien(Request $request){
        $find = DB::table('pasien')->where('nik',$request->id)->get();
        if(count($find) > 0){
            $pasien_id = json_decode(json_encode($find), true)[0]['id'];
            $find_no_antrian = DB::table('antrian')->where('pasien_id',$pasien_id)->where('created_at','LIKE',date('Y-m-d'). '%')->orderBy('no_antrian', 'desc')->first();
            $antrian = json_decode(json_encode($find_no_antrian), true);

            $operation = array(
                'success' => true,
                'message' => 'Data Ditemukan',
                'data' => $find[0],
                'antrian' => $antrian['no_antrian']
            );
        } else{
            $operation = array(
                'success' => false,
                'message' => 'Anda Belum Terdaftar',
            );
        }
        return $operation;
    }

    public function daftar_antrian(Request $request){
        $find = DB::table('pasien')->where('id',$request->id)->get();
        if(count($find) > 0){
            $total_daftar = DB::table('antrian')->where('pasien_id',$request->id)->where('created_at','LIKE',date('Y-m-d'). '%')->count();
            if($total_daftar < 3){
                $check_antrian = DB::table('antrian')->select('created_at','no_antrian')->where('created_at','LIKE',date('Y-m-d'). '%')->orderBy('no_antrian', 'desc')->first();
                $data = json_decode(json_encode($check_antrian), true);

                if(empty($check_antrian)){
                    $no_antrian = 1;
                } else{
                    $no_antrian = $data['no_antrian']+1;
                }
                
                $insert = DB::table('antrian')->insert([
                    'pasien_id' => $request->id,
                    'created_at' => Carbon::now(),
                    'status' => 0,
                    'no_antrian' => $no_antrian,
                ]);

                if($insert){
                    $operation = array(
                        'success' => true,
                        'message' => 'No Antrian Berhasil Dibuat',
                        'data' => $insert,
                        'antrian' => $no_antrian
                    );
                } else{
                    $operation = array(
                        'success' => false,
                        'message' => 'No Antrian Gagal Dibuat',
                    );
                }

            } else{
                $operation = array(
                    'success' => false,
                    'message' => 'Anda Sudah Mendaftar Antrian 3x Hari ini',
                );
            }
        } else{
            $operation = array(
                'success' => false,
                'message' => 'Anda Belum Terdaftar',
            );
        }
        return $operation;
    }
}
