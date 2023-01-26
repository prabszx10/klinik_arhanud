<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Routing\Controller as BaseController;

class TenagaMedisController extends BaseController
{
    public function index(){
        return view('FrontEnd/TenagaMedis/index');
    }
}
