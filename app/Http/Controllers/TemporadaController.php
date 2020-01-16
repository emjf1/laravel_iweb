<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Temporada;

class TemporadaController extends Controller
{
    public function listaTemporada()
    {
        $resultado = Temporada::listarTemporada();
        return response()->json($resultado);
    }

    public function detalleTemporada($id)
    {
        $data = new Temporada();
        $data->codigo = $id;

        $resultado =  Temporada::mostrarTemporada($data);
        return response()->json($resultado);
    }

    public function eliminarTemporada($id)
    {
        $temporada = new Temporada();
        $temporada->codigo = $id;

        $resultado = Temporada::borrarTemporada($temporada);
        return response()->json($resultado);
    }

    public function crearTemporada(){
        $data = request()->all();

        $resultado = Temporada::crearTemporada($data);
        return response()->json($resultado);
    }

    public function editarTemporada($id)
    {
        $data = request()->all();

        $temporada = new Temporada();
        $temporada->codigo = $id;

        $resultado = Temporada::actualizarTemporada($data, $temporada);
        return response()->json($resultado);
    }
}
