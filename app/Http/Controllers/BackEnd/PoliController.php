<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Poli;
// use Illuminate\Routing\Controller as BaseController;
use App\Core\BaseController as BaseController;

class PoliController extends BaseController
{

    public function index () 
    {    
        return view('BackEnd.Poli.index');   
    }

    public function select(Request $request){
        if(isset($request->id)){
            $operation = Poli::where('id',$request->id)->first();
        } else{
            $operation = Poli::where('deleted',0)->get();
        }
        return $operation;
    }
    
    public function selectPoli(Request $request){
        if(isset($request->id)){
            $operation = Poli::where('id',$request->id)->first();
        } else{
            $operation = Poli::where('deleted',0)->where('status',1)->get();
        }
        return $operation;
    }

    public function insert_update(Request $request){
        $data['nama'] = $request->nama_poli;
        $data['keterangan'] = $request->keterangan_poli;
        $data['status'] = $request->status_poli;
        $data['kode'] = $request->kode_poli;
        $data['deleted'] = 0;

        if(isset($request->id_poli)){
            $operation = $this->update('poli',$request->id_poli,$data);
        } else{
            $operation = $this->insert('poli',$data);
        }

        return $operation;
    }

    public function delete(Request $request){
        $data['deleted'] = 1;
        $data['status'] = 0;
        $data['message'] = 'dihapus';
        $operation = $this->update('poli',$request->id,$data);

        return $operation;
    }

    public function antrian_saat_ini(){
        $get_poli = DB::table('poli')->where('status','1')->get();
        $data = json_decode(json_encode($get_poli), true);

        $operation =[];
        if(isset($data)){
            foreach($data as $val){
                $get_antrian = DB::table('antrian')->where('status','0')->where('poli_id', $val['id'])->orderBy('created_at', 'asc')->first();
                $data_antrian = json_decode(json_encode($get_antrian), true);

                if(isset($data_antrian)){
                    $push = array(
                        'id'=> $val['id'],
                        'antrian'=> $data_antrian['no_antrian'].$val['kode']
                    );
                    array_push($operation,$push);
                }
            }
        }

        return $operation;

    }
}
