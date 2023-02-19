<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Core\BaseController as BaseController;

class TenagaMedisController extends BaseController
{
    public function index () 
    {    
        return view('BackEnd.TenagaMedis.index');   
    }

    public function select(Request $request){
        if(isset($request->id)){
            $operation = DB::table('tenaga_medis')->where('id',$request->id)->first();
            $operation = json_decode(json_encode($operation), true);
        } else{
            $operation = DB::table('tenaga_medis')->get();
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

        $this->validate($request, [
            'file' => ['sometimes','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
        ]);


        if ($request->file !== NULL) {
            $path = $request->file('file')->store('images');
            $data['file']= 'tenaga_medis'.time().'.'.request()->file->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('images/tenaga_medis', $request->file('file'), $data['file']);
        }

        if(isset($data['id'])){
            $operation = $this->update('tenaga_medis',$data['id'],$data);
        } else{
            $operation = $this->insert('tenaga_medis',$data);   
        }

        return $operation;

    }

    public function delete(Request $request){
        $operation = $this->destroy('tenaga_medis',$request->id);
              
        if(isset($request->file)){
            $path = 'images/tenaga_medis/';
            Storage::disk('public')->delete($path.$request->file);
        } 

        return $operation;
    }
}
