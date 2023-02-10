<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Agama;
use App\Core\BaseController as BaseController;

class AgamaController extends BaseController
{

    public function index () 
    {    
        return view('BackEnd.Agama.index');   
    }

    public function select(Request $request){
        if(isset($request->id)){
            $operation = Agama::where('id',$request->id)->first();
        } else{
            $operation = Agama::where('deleted',0)->get();
        }
        return $operation;
    }

    public function insert_update(Request $request){
        foreach($request->all() as $key=>$val){
            if($key != '_token'){
                $k = explode('_',$key)[0];
                $data[$k] = $val;
            }
        }
        $data['deleted'] = 0;

        if(isset($data['id'])){
            $operation = $this->update('agama',$data['id'],$data);
        } else{
            $operation = $this->insert('agama',$data);
        }

        return $operation;
    }

    public function delete(Request $request){
        $data['deleted'] = 1;
        $data['status'] = 0;
        $data['message'] = 'dihapus';
        $operation = $this->update('agama',$request->id,$data);

        return $operation;
    }
}
