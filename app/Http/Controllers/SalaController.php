<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sala_conferencia;

class SalaController extends Controller
{
    public function listaSala()
    {
        $resultado = Sala_conferencia::listarSalas();
        return response()->json($resultado);
    }

    public function detalleSala($id)
    {
        $data = new Sala_conferencia();
        $data->codigo = $id;

        $resultado =  Sala_conferencia::mostrarSala($data);
        return response()->json($resultado);
    }

    public function fotosSala($id)
    {
        $data = new Sala_conferencia();
        $data->codigo = $id;
        
        $resultado = Sala_conferencia::obtenerImagenSala($data);
        return ($resultado);
    }

    public function crearSala()
    {
        $data = request()->all();

        $resultado = Sala_conferencia::crear($data);
        return response()->json($resultado);
    }

    public function editarSala($id)
    {
        $data = request()->all();

        $sala = new Sala_conferencia();
        $sala->codigo = $id;

        $resultado = Sala_conferencia::actualizar($data, $sala);
        return response()->json($resultado);
    }

    public function eliminarSala($id)
    {
        $sala = new Habitacion();
        $sala->codigo = $id;
  
        $resultado =  Sala_conferencia::borrar($sala);
        return response()->json($resultado);
    }
}
