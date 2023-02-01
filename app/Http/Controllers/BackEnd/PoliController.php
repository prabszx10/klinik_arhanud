<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Poli;
use Illuminate\Routing\Controller as BaseController;

class PoliController extends BaseController
{

    public function index () 
    {    
        return view('BackEnd.Poli.index');   
    }

    public function select(Request $request){
        if(isset($request->id)){
            $data = Poli::where('id',$request->id)->first();
        } else{
            $data = Poli::where('deleted',0)->get();
        }
        return $data;
    }

    public function insert_update(Request $request){
        if(isset($request->id_poli)){
            $info = 'Diupdate';
            $data = DB::table('poli')->where('id',$request->id_poli)->update([
                'nama' => $request->nama_poli,
                'keterangan' => $request->keterangan_poli,
                'status' => $request->status_poli,
                'kode' => $request->kode_poli,
            ]);
        } else{
            $info = 'Disimpan';
            $data = DB::table('poli')->insert([
                'nama' => $request->nama_poli,
                'keterangan' => $request->keterangan_poli,
                'status' => $request->status_poli,
                'kode' => $request->kode_poli,
                'deleted'=>0
            ]);
        }
        
        if($data){
            $operation = array(
                'success' => true,
                'message' => 'Data Berhasil '.$info,
                'data' => $request->all()
            );
        } else{
            $operation = array(
                'success' => "error",
                'message' => 'Data Gagal '.$info,
            );
        }

        return $operation;

    }

    public function delete(Request $request){
        $data = DB::table('poli')->where('id',$request->id)->update([
            'deleted' => 1,
            'status' => 0,
        ]);

        if($data){
            $operation = array(
                'success' => true,
                'message' => 'Data Berhasil Dihapus',
                'data' => $request->all()
            );
        } else{
            $operation = array(
                'success' => "error",
                'message' => 'Data Gagal Dihapus',
            );
        }

        return $operation;
    }
}
