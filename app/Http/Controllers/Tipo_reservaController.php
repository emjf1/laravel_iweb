<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipo_reserva;

class Tipo_reservaController extends Controller
{
    public function listaTiporeserva(){
        return response()->json(Tipo_reserva::listarTipo_reserva());
    }

    public function detalleTiporeserva($id){
        return response()->json(Tipo_reserva::mostrarTipo_reserva($id));
    }

    public function eliminarTiporeserva($id){
        return response()->json(Tipo_reserva::borrarTipo_reserva($id));
    }

    public function crearTiporeserva(){
        $data = request()->all();
        return response()->json(Tipo_reserva::crearTipo_reserva($data));
    }

    public function editarTiporeserva($id){
        $data = request()->all();
        return response()->json(Tipo_reserva::actualizarTipo_reserva($data, $id));
    }
}
