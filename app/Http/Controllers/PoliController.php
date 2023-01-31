<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poli;

class PoliController extends Controller
{
    public function select(){
        $data = Poli::all();
        return $data;
    }
}
