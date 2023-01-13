<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Agama;

class AgamaController extends Controller
{
    public function select(){
        $data = Agama::where('deleted','=','0')->get();
        return $data;
    }
}
