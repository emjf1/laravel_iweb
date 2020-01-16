<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sala_conferencia;

class SalaController extends Controller{
    public function listaSala(){
        return response()->json(Sala_conferencia::listarSala());
    }

    public function detalleSala($id){
        return response()->json(Sala_conferencia::mostrarSala($id));
    }

    public function eliminarSala($id){
        return response()->json(Sala_conferencia::borrarSala($id));
    }

    public function crearSala(){
        $data = request()->all();
        return response()->json(Sala_conferencia::crearSala($data));
    }

    public function editarSala($id){
        $data = request()->all();
        return response()->json(Sala_conferencia::actualizarSala($data, $id));
    }
}
