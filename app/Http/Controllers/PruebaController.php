<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prueba;

class PruebaController extends Controller
{
    public function list()
    {
        $lista = Prueba::all();
        
        return view('pruebaview', ['lista'=> $lista]);
    }

}
