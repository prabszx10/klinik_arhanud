<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Routing\Controller as BaseController;

class FasilitasDanLayananController extends BaseController
{
    public function index(){
        return view('FrontEnd/FasilitasDanLayanan/index');
    }
}
