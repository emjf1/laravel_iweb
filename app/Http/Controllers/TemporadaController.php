<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Temporada;

class TemporadaController extends Controller{
    public function listaTemporada(){
    return response()->json(Temporada::listarTemporada());
}

    public function detalleTemporada($id){
        return response()->json(Temporada::mostrarTemporada($id));
    }

    public function eliminarTemporada($id){
        return response()->json(Temporada::borrarTemporada($id));
    }

    public function crearTemporada(){
        $data = request()->all();
        return response()->json(Temporada::crearTemporada($data));
    }

    public function editarTemporada($id){
        $data = request()->all();
        return response()->json(Temporada::actualizarTemporada($data, $id));
    }
}
