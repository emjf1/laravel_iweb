<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Regimen;

class RegimenController extends Controller{
    public function listaRegimen(){
        return response()->json(Regimen::listarRegimen());
    }

    public function detalleRegimen($id){
        return response()->json(Regimen::mostrarRegimen($id));
    }

    public function eliminarRegimen($id){
        return response()->json(Regimen::borrarRegimen($id));
    }

    public function crearRegimen(){
        $data = request()->all();
        return response()->json(Regimen::crearRegimen($data));
    }

    public function editarRegimen($id){
        $data = request()->all();
        return response()->json(Regimen::actualizarRegimen($data, $id));
    }
}
