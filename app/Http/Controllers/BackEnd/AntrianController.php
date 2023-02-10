<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Core\BaseController as BaseController;

class AntrianController extends BaseController
{

    public function index () 
    {    
        return view('BackEnd.Antrian.index');   
    }

    public function select(Request $request){
        if(isset($request->id)){
            $operation = DB::table('v_antrian')->where('poli_id',$request->id)->get();
        } else{
            $operation = DB::table('v_antrian')->get();
        }
        return $operation;
    }

    public function onDetail(Request $request){
        $findData = DB::table('pasien')->where('id',$request->pasien_id)->first();
        $operation = json_decode(json_encode($findData), true);
        return $operation;
    }

    public function insert_update(Request $request){
        $data = $this->varPost($request->all());
        $data['deleted'] = 0;
        $data['created_time'] = date("Y-m-d h:i:s");
        $data['updated_time'] = date("Y-m-d h:i:s");

        if(isset($data['id'])){
            $operation = $this->update('antrian',$data['id'],$data);
        } else{
            $operation = $this->insert('antrian',$data);
        }

        return $operation;
    }

    public function delete(Request $request){
        $data['deleted'] = 1;
        $data['message'] = 'dihapus';
        $operation = $this->update('antrian',$request->id,$data);

        return $operation;
    }

    public function onAntrian(Request $request){
        $findData = DB::table('antrian')->where('poli_id',$request->id)->where('status',0)->orderBy('no_antrian', 'asc')->first();
        $jsonData = json_decode(json_encode($findData), true);
        
        if($request->type == 'next'){
            $data['status'] = 2;
        } else{
            $data['status'] = 1;
        }

        $operation = $this->update('antrian',$jsonData['id'],$data);
        return $operation;
    }
}
