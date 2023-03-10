<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Core\BaseController as BaseController;

class KemitraanController extends BaseController
{
    public function index () 
    {    
        return view('BackEnd.tentangKami.kemitraan.index');   
    }

    public function select(Request $request){
        if(isset($request->id)){
            $operation = DB::table('kemitraan')->where('id',$request->id)->first();
            $operation = json_decode(json_encode($operation), true);
        } else{
            $operation = DB::table('kemitraan')->get();
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
            $data['file']= 'kemitraan'.time().'.'.request()->file->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('images/kemitraan', $request->file('file'), $data['file']);
        }

        if(isset($data['id'])){
            $operation = $this->update('kemitraan',$data['id'],$data);
        } else{
            $operation = $this->insert('kemitraan',$data);   
        }

        return $operation;

    }

    public function delete(Request $request){
        $operation = $this->destroy('kemitraan',$request->id);
              
        if(isset($request->file)){
            $path = 'images/kemitraan/';
            Storage::disk('public')->delete($path.$request->file);
        } 

        return $operation;
    }
}
