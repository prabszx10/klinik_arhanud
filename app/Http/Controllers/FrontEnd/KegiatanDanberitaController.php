<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Routing\Controller as BaseController;

class KegiatanDanBeritaController extends BaseController
{
    public function index(){
        return view('FrontEnd/KegiatanDanBerita/index');
    }
}
