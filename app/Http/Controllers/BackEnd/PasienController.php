<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Core\BaseController as BaseController;

class PasienController extends BaseController
{

    public function index () 
    {    
        return view('BackEnd.Pasien.index');   
    }

    public function select(Request $request){
        if(isset($request->id)){
            $operation = DB::table('pasien')->where('id',$request->id)->orderBy('created_time', 'asc')->first();
            $operation = json_decode(json_encode($operation), true);
        } else{
            $operation = DB::table('v_pasien')->where('deleted',0)->get();
        }
        return $operation;
    }

    public function insert_update(Request $request){
        $data = $this->varPost($request->all());
        $data['deleted'] = 0;
        $data['created_time'] = date("Y-m-d h:i:s");
        $data['updated_time'] = date("Y-m-d h:i:s");

        if(isset($data['id'])){
            $operation = $this->update('pasien',$data['id'],$data);
        } else{
            $operation = $this->insert('pasien',$data);
        }

        return $operation;
    }

    public function delete(Request $request){
        $data['deleted'] = 1;
        $data['message'] = 'dihapus';
        $operation = $this->update('pasien',$request->id,$data);

        return $operation;
    }
}
