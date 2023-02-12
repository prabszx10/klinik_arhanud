<?php

namespace App\Http\Controllers\BackEnd\Home;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Core\BaseController as BaseController;

class GambarCarouselController extends BaseController
{

    public function index () 
    {    
        return view('BackEnd.home.GambarCarousel.index');   
    }

    public function select(Request $request){
        if(isset($request->id)){
            $operation = DB::table('gambar_carousel')->where('id',$request->id)->first();
            $operation = json_decode(json_encode($operation), true);
        } else{
            $operation = DB::table('gambar_carousel')->get();
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
            $data['file']= 'carousel_'.time().'.'.request()->file->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('images/carousel/', $request->file('file'), $data['file']);
        }

        if(isset($data['id'])){
            $operation = $this->update('gambar_carousel',$data['id'],$data);
        } else{
            $operation = $this->insert('gambar_carousel',$data);   
        }

        return $operation;

    }

    public function delete(Request $request){
        $operation = $this->destroy('gambar_carousel',$request->id);
              
        if(isset($request->file)){
            $path = 'images/carousel/';
            Storage::disk('public')->delete($path.$request->file);
        } 

        return $operation;
    }
}
