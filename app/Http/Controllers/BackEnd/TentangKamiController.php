<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Core\BaseController as BaseController;

class TentangKamiController extends BaseController
{

    public function index ($id) 
    {    
        return view('BackEnd.tentangKami.'.$id.'.index');   
    }

    public function select(Request $request){
        $findData = DB::table('tentang_kami')->where('type',$request->id)->first();
        $decode = json_decode(json_encode($findData), true);

        $operation = json_decode($decode['content'],true);
        return $operation;
    }

    public function selectAll(){
        $data = DB::table('tentang_kami')->get();
        $decode = json_decode(json_encode($data), true);
        foreach($decode as $k=>$v){
            $operation[$v['type']] = $v['content'];
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

        $findData = DB::table('tentang_kami')->where('type',$data['id'])->first();
        $decode = json_decode(json_encode($findData), true);

        if(isset($data['id'])){
            $content['content'] = $data;
            $content['updated_at'] = date("Y-m-d h:i:s");
            $operation = $this->update('tentang_kami',$decode['id'],$content);
        } 

        return $operation;

    }
}
