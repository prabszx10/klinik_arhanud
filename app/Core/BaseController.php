<?php

namespace App\Core;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    // public function select($table,$data){

    // }

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
}