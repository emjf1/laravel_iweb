<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Tipo_reserva extends Controller
{
    public function listaTipo_reserva()
    {
        $resultado = Tipo_reserva::listarTipo_reserva();
        return response()->json($resultado);
    }

    public function detalleTipo_reserva($id)
    {
        $data = new Tipo_reserva();
        $data->codigo = $id;

        $resultado =  Tipo_reserva::mostrarTipo_reserva($data);
        return response()->json($resultado);
    }

    public function eliminarTipo_reserva($id)
    {
        $tipo_reserva = new Tipo_reserva();
        $tipo_reserva->codigo = $id;

        $resultado = Tipo_reserva::borrarTipo_reserva($tipo_reserva);
        return response()->json($resultado);
    }

    public function crearTipo_reserva(){
        $data = request()->all();

        $resultado = Tipo_reserva::crearTipo_reserva($data);
        return response()->json($resultado);
    }

    public function editarTipo_reserva($id)
    {
        $data = request()->all();

        $tipo_reserva = new Tipo_reserva();
        $tipo_reserva->codigo = $id;

        $resultado = Tipo_reserva::actualizarTipo_reserva($data, $tipo_reserva);
        return response()->json($resultado);
    }
}
