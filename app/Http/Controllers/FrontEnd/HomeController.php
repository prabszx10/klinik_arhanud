<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    public function index(){
        return view('FrontEnd/Home/index');
    }
}
