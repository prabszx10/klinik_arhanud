<?php

namespace App\Core;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public function varPost($data){
        foreach($data as $key=>$val){
            if($key != '_token'){
                $explode = explode('_',$key);
                array_pop($explode);
                $k = implode('_',$explode); 
                $operation[$k] = $val;
            }
        }

        return $operation;
    }

    public function read($table,$data){
        
        $operation = DB::table($table)->whereColumn($data)->first();
        return $operation;
    }

    public function insert($table,$data){
       $insert = DB::table($table)->insert($data);
       if($insert){
            $operation = array(
                'success' => true,
                'message' => 'Data Berhasil disimpan',
                'data' => $data
            );
        } else{
            $operation = array(
                'success' => false,
                'message' => 'Data Gagal disimpan',
            );
        }

        return $operation;
    }

    public function update($table,$id,$data){
        if(isset($data['message'])){
            $message = $data['message'];
            unset($data['message']);
        }

        $update = DB::table($table)->where('id',$id)->update($data);
        if($update){
             $operation = array(
                 'success' => true,
                 'message' => 'Data Berhasil '.(isset($message)?$message:'diubah'),
                 'data' => $data
             );
         } else{
             $operation = array(
                 'success' => false,
                 'message' => 'Data Gagal '.(isset($message)?$message:'diubah'),
             );
         }
 
         return $operation;
    }

    public function destroy($table,$id){
        $delete = DB::table($table)->where('id',$id)->delete();

        if($delete){
             $operation = array(
                 'success' => true,
                 'message' => 'Data Berhasil dihapus',
             );
         } else{
             $operation = array(
                 'success' => false,
                 'message' => 'Data Gagal dihapus',
             );
         }
 
         return $operation;
    }
}