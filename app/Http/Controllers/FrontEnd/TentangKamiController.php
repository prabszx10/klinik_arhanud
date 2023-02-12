<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Routing\Controller as BaseController;

class TentangKamiController extends BaseController
{
    public function index(){
        return view('FrontEnd/TentangKami/index');
    }
}
